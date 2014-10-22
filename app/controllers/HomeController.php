<?php

use Faiz\Cms\Posts\PostsInterface;
use Faiz\Cms\Pages\PagesInterface;

class HomeController extends BaseController {

	protected $posts;

	protected $pages;

	protected $title;

	public function __construct(PostsInterface $posts, PagesInterface $pages)
	{
		$this->posts = $posts;
		$this->pages = $pages;

		parent::__construct();
	}

	public function getIndex()
	{
		$posts = $this->posts->getAllPaginated(15);

		$title = 'Blogs';
			
		return View::make('site.blog.index', compact('posts', 'title'));
	}

	public function getArchive($date)
	{
		$posts = $this->posts->getByArchivesDate($date);

		$title = 'Blog Archives';

		$archive_date = $date;

		return View::make('site.blog.archives', compact('posts', 'title', 'archive_date'));
	}

	public function getPost($slug)
	{
		$post = $this->posts->getBySlug($slug);

		if (!empty($post)) {
			$title = $post->post_title;

			return View::make('site.blog.view_post', compact('post', 'title'));
		} else {
			$page = $this->pages->getBykey($slug);

			$title = $page->title;

			return View::make('site.layouts.pages', compact('page', 'title'));
		}
	}

	public function getRss()
	{
		$posts = $this->posts->getAll();

		$data = array(
			'posts'   => $posts,
			'updated' => isset($posts[0]) ? $posts[0]->atom_date : date('Y-m-d H:i:s'),
		);

		return Response::view('site.atom', $data, 200, array(
			'Content-Type' => 'application/rss+xml; charset=UTF-8',
		));
	}
}