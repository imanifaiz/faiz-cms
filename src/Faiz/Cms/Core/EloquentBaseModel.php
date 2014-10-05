<?php namespace Faiz\Cms\Core;
use Faiz\Cms\Core\Exceptions\NoValidationRulesFoundException;
use Validator, Eloquent, ReflectionClass, Input;

class EloquentBaseModel extends Eloquent
{
	protected $validationRules = [];

	public $timestamps = false;

	protected $validator;

	/**
	 * Validate data
	 * @param  array   $data 
	 * @return boolean       
	 */
	public function isValid($data = array())
	{
		if (!isset($this->validationRules) or empty($this->validationRules)) {
			throw new NoValidationRulesFoundException('no validation rules found in class ' .
				get_called_class());
		}

		if (!$data) {
			$data = $this->getAttributes();
		}
		
		$this->validator = Validator::make($data, $this->getPreparedRules());

		return $this->validator->passes();		
	}

	/**
	 * Get errors from the validation
	 * @return \Illuminate\Support\MessageBag
	 */
	public function getErrors()
	{
		return $this->validator->errors();
	}

	/**
	 * Prepare the validation rules
	 * @return array
	 */
	public function getPreparedRules()
	{
		if (!$this->validationRules) {
			return [];
		}

		$preparedRules = $this->replaceIdsIfExists($this->validationRules);

		return $preparedRules;
	}

	public function replaceIdsIfExists($rules)
	{
		$preparedRules = [];

		foreach ($rules as $key => $rule) {
			if (false !== strpos($rule, "<id>")) {
				if ($this->exists) {
					$rule = str_replace("<id>", $this->getAttribute($this->primaryKey), $rule);
				} else {
					$rule = str_replace("<id>", "", $rule);
				}
			}

			$preparedRules[$key] = $rule;
		}

		return $preparedRules;
	}

	/**
	 * Hydrate the model with more stuff and
	 * @return this 
	 */
	public function hydrateRelations()
	{
		if ($this->isTaggable()) {
			$this->saveTags();
		}

		if ($this->isUploadable()) {
			$this->deleteImagery(Input::get('deleteImage'));
		}

		return $this;
	}

	/**
	 * Delete method overwrite
	 * @return void 
	 */
	public function delete()
	{
		if ($this->isTaggable()) {
			$this->saveTags('');
		}

		if ($this->isUploadable()) {
			$this->deleteAllImagery();
		}

		return parent::delete();
	}

	/**
	 * Figure out if tag can be used on the model
	 * @return boolean
	 */
	public function isTaggable()
	{
		return in_array('Faiz\Cms\Abstracts\Traits\TaggableRelationship', 
			(new ReflectionClass($this))->getTraitNames());
	}

	/**
	 * Figure out if can upload media here
	 * @return boolean
	 */
	public function isUploadable()
	{
		return in_array('Faiz\Cms\Abstracts\Traits\UploadableRelationship', 
			(new ReflectionClass($this))->getTraitNames());
	}

	/**
	 * Get the table name
	 * @return string
	 */
	public function getTableNmae()
	{
		return $this->table;
	}
}
