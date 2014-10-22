<?php namespace Faiz\Cms\Posts;

use McCool\LaravelAutoPresenter\BasePresenter;
use Carbon;

class PostsPresenter extends BasePresenter {

	public function __construct(Posts $posts)
	{
		$this->resource = $posts;
	}

	public function created_at()
	{
		return Carbon::createFromFormat('Y-m-d H:i:s', $this->resource->created_at, 'Europe/Berlin')
            ->toFormattedDateString();
	}

	public function archive_date()
	{
		return date('F Y', strtotime(Carbon::createFromFormat('m-Y', $this->resource->archive_date)));
	}
}