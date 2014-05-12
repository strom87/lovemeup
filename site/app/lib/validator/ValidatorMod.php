<?php namespace validator;

use Validator as V;

abstract class ValidatorMod {

	protected $failed;
	protected $messages;

	public function __construct()
	{
		$this->messages = [];
		$this->failed = false;
	}

	public function failed()
	{
		return $this->failed;
	}

	public function messages()
	{
		return $this->messages;
	}

	protected function validate(array $attributes, array $rules, $mergeMessages = false)
	{
		$v = V::make($attributes, $rules);
		
		if (!$v->fails()) return;
		
		$this->failed = true;
		$this->addMessages($v->messages()->toArray(), $mergeMessages);
	}

	private function addMessages(array $errors, $mergeMessages)
	{
		if ($mergeMessages)
		{
			$this->messages = array_merge($this->messages, $errors);
		}
		else
		{
			$this->messages = $errors;
		}
	}
	
}