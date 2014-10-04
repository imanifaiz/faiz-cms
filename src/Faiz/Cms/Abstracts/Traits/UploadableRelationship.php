<?php namespace Faiz\Cms\Abstracts\Traits;

use App;

trait UploadableRelationship
{	
	/**
	 * The relationship for uploadable classes
	 * @return Eloquent 
	 */
	public function uploads()
	{
		return $this->morphMany('Faiz\Cms\Uploads\Uploads', 'uploadble')
				    ->orderBy('order', 'asc');
	}

	/**
	 * Remove the imagery asociated with this model
	 * @param  integer $id The id of the images
	 * @return void     
	 */
	public function deleteImagery($id)
	{
		$uploads = App::make('Faiz\Cms\Uploads\UploadsInterface');
		$upload->deleteByIdType($this->id, $this->getTableName());
	}

	/**
	 * Remove the imagery associated with this model
	 * @return void
	 */
	public function deleteAllImagery()
	{
		$uploads = App::make('Faiz\Cms\Uploads\UploadsInterface');
		$uploads->deleteByIdType($this->id, $this->getTableName());
	}
}