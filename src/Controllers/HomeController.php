<?php namespace Faiz\Cms\Controllers;

use View;
use Faiz\Cms\Post\PostInterface;
use Faiz\Cms\Page\PageInterface;

class HomeController extends BaseController {

	/**
	 * Post Model 
	 * @var Model
	 */
	protected $posts;

	/**
	 * Page Model 
	 * @var Model
	 */
	protected $pages;

	/**
	 * Page Title 
	 * @var String
	 */
	protected $title;

	/**
	 * Initialize new instance 
	 * @param PostInterface $post 
	 * @param PageInterface $page 
	 */
	public function __construct(PostInterface $post, PageInterface $page)
	{
		$this->post = $post;
		$this->page = $page;

		parent::__construct();
	}

	/**
	 * Get all posts 
	 * @return View 
	 */
	public function getIndex()
	{
		// $posts = $this->post->getAllPaginated(15);
		$posts = $this->post->getAllPostsPaginate(15);

		$title = 'Blogs';
			
		return View::make('site.blog.index', compact('posts', 'title'));
	}

	/**
	 * Get all posts in the specified date 
	 * @param  Date $date 
	 * @return View       
	 */
	public function getArchive($date)
	{
		$posts = $this->post->getByArchivesDate($date);

		$title = 'Blog Archives';

		$archive_date = $date;

		return View::make('site.blog.archives', compact('posts', 'title', 'archive_date'));
	}

	/**
	 * Get post based on slug 
	 * @param  String $slug 
	 * @return View       
	 */
	public function getPost($slug)
	{
		$post = $this->post->getBySlug($slug);

		if (!empty($post)) {
			$title = $post->post_title;

			return View::make('site.blog.view_post', compact('post', 'title'));
		} else {
			$page = $this->page->getBykey($slug);

			$title = $page->title;

			return View::make('site.layouts.pages', compact('page', 'title'));
		}
	}

	/**
	 * Get the RSS feed for all posts 
	 * @return Response XML files for the RSS feed
	 */
	public function getRss()
	{
		$posts = $this->post->getAll();

		$data = array(
			'posts'   => $posts,
			'updated' => isset($posts[0]) ? $posts[0]->atom_date : date('Y-m-d H:i:s'),
		);

		return Response::view('site.atom', $data, 200, array(
			'Content-Type' => 'application/rss+xml; charset=UTF-8',
		));
	}
}