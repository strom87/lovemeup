<?php namespace validator;

use Validator as V;

abstract class ValidatorMod {

	protected $errors = [];

	public function messages()
	{
		return $this->errors;
	}

	protected function validate($attributes, $ruelsOne, $rulesTwo, $mergeErrors = false)
	{
		if(is_null($rulesTwo)) {
			return $this->validateOne($attributes, $ruelsOne, $mergeErrors);
		} else {
			return $this->validateTwo($attributes, $rulesOne, $rulesTwo, $mergeErrors);
		}
	}

	private function validateOne($attributes, $rules, $mergeErrors)
	{
		$v = V::make($attributes, $rules);
		
		if($v->fails()) {
			$this->addErrors($v->messages()->toArray(), null, $mergeErrors);
			return false;
		}

		return true;
	}

	private function validateTwo($attributes, $rulesOne, $rulesTwo, $mergeErrors)
	{
		$v1 = V::make($attributes, $rulesOne);
		$v2 = V::make($attributes, $rulesTwo);
		
		if($v1->fails() || $v2->fails()) {
			$this->addErrors($v1->messages()->toArray(), $v2->messages()->toArray(), $mergeErrors);
			return false;
		}

		return true;
	}

	private function addErrors($errorOne, $errorTwo, $mergeErrors)
	{
		if(is_null($errorTwo)) {
			if($mergeErrors) {
				$this->errors = array_merge($this->errors, $errorOne);
			} else {
				$this->errors = $errorOne;
			}
		} else {
			if($mergeErrors) {
				$this->errors = array_merge($this->errors, $errorOne, $errorTwo);
			} else {
				$this->errors = array_merge($errorOne, $errorTwo);
			}
		}
	}
	
}