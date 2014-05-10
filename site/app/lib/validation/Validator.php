<?php namespace validation;

use Validator as V;

abstract class Validator {

	protected $errors = null;

	protected function validate(array $attributes, array $ruelsOne, array $rulesTwo = null)
	{
		if(is_null($rulesTwo)) {
			return $this->validateOne($attributes, $ruelsOne);
		} else {
			return $this->validateTwo($attributes, $rulesOne, $rulesTwo);
		}
	}

	private function validateOne(array $attributes, array $rules)
	{
		$v = V::make($attributes, $rules);
		
		if($v->fails()) {
			$this->errors = $v->messages()->toArray();
			return false;
		}

		return true;
	}

	private function validateTwo(array $attributes, array $rulesOne, array $rulesTwo)
	{
		$v1 = V::make($attributes, $rulesOne);
		$v2 = V::make($attributes, $rulesTwo);
		
		if($v1->fails() || $v2->fails()) {
			$this->errors = array_merge($v1->messages()->toArray(), $v2->messages()->toArray());
			return false;
		}

		return true;
	}

}