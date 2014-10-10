<?php namespace Faiz\Cms\Controllers\Admin;

use Cms\Models\Comment;

class AdminCommentsController extends BaseController {
	/**
	 * Comment Model
	 *
	 * @var Object
	 */
	protected $comment;

	/**
	 * Create new instance.
	 *
	 * @param Comment $comment
	 */
	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

	/**
	 * Get all comments
	 *
	 * @return Illuminate\View\View
	 */
	public function getIndex()
	{
		$title = 'Comments Management';

		$comments = $this->comment->all();

		return View::make('admin.comments.index', compact('comments', 'title'));
	}

	/**
	 * Show form for comment editing
	 *
	 * @param  int $comment
	 * @return Illuminate\View\View
	 */
	public function getEdit($comment)
	{
		$title = 'Edit Comment';

		return View::make('admin.comments.edit', compact('comment', 'title'));
	}

	/**
	 * Update comments
	 *
	 * @param  int $comment
	 * @return Illuminate\VIew\View
	 */
	public function postEdit($comment)
	{
		// Grab all input
		$data = Input::all();

		// Decalre rules for validation
		$rules = array(
			'content' => 'required|min:3'
		);

		// Create new Validator instance
		$validator = Validator::make($data, $rules);

		// If validation passes
		if ($validator->passes()) {
			// Grab the content from input
			$comment->content = Input::get('content');

			// If successfully save
			if ($comment->save()) {
				return Redirect::to('admin/comments/' . $comment->id . '/edit')
									->with('success', 'Comment successfully saved.');
			}

			// If cannot save
			return Redirect::to('admin/comments/' . $comment->id . '/edit')
								->with('error', 'Ops, error while saving the changes.');
		}

		// If failed validation
		return Redirect::to('admin/comments/' . $comment->id . '/edit')
								->withInput()
								->withErrors($validator);
	}

	/**
	 * Delete comment.
	 * @param  int $comment
	 * @return Illuminate\View\View
	 */
	public function getDelete($comment)
	{
		$title = 'Delete Comment';

		return View::make('admin.comments.delete', compact('comment', 'title'));
	}

	/**
	 * Delete comment
	 * @param  Objed $comment
	 * @return Illuminate\View\View
	 */
	public function postDelete($comment)
	{
		$data = Input::all();

		$rules = array(
			'id' => 'required|integer'
		);

		$validator = Validator::make($data, $rules);

		// If validation passes
		if ($validator->passes()) {
			// Grab the id before delete
			$id = $comment->id;

			// Delete comment
			$comment->delete();

			// Try grab the deleted comment for conformation
			$comment = $this->comment->findt($id);

			// If successfully delete
			if (empty($comment)) {
				return Redirect::to('admin/comments/')
									->with('success', 'Comment successfully deleted.');
			}
		}

		// If failed validation
		return Redirect::to('admin/comments/')
								->with('error', 'Ops, error while deleting comment.');

	}

	/**
	 * Show all comments in Datatables format
	 * @return Datatable JSON
	 */
	public function getData()
	{
		$comments = Comment::leftjoin('posts', 'posts.id', '=', 'comments.post_id')
                        ->leftjoin('users', 'users.id', '=','comments.user_id' )
                        ->select(array('comments.id as id', 'posts.id as postid','users.id as userid', 'comments.content', 'posts.title as post_name', 'users.username as poster_name', 'comments.created_at'));

        return Datatables::of($comments)

        ->edit_column('content', '<a href="{{{ URL::to(\'admin/comments/\'. $id .\'/edit\') }}}" class="iframe cboxElement">{{{ Str::limit($content, 40, \'...\') }}}</a>')

        ->edit_column('post_name', '<a href="{{{ URL::to(\'admin/blogs/\'. $postid .\'/edit\') }}}" class="iframe cboxElement">{{{ Str::limit($post_name, 40, \'...\') }}}</a>')

        ->edit_column('poster_name', '<a href="{{{ URL::to(\'admin/users/\'. $userid .\'/edit\') }}}" class="iframe cboxElement">{{{ $poster_name }}}</a>')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/comments/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-default btn-xs">Edit</a>
                <a href="{{{ URL::to(\'admin/comments/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">Delete</a>
            ')

        ->remove_column('id')
        ->remove_column('postid')
        ->remove_column('userid')

        ->make();

	}
}