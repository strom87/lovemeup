<?php namespace validator\custom;

use Illuminate\Validation\Validator;

class ValidatorExtentions extends Validator {

	# usage: integers_between:18,100
	# check: if the value is between or equal the min and max value
	public function validateIntegersBetween($attribute, $value, $parameters)
	{
		return $value >= $parameters[0] && $value <= $parameters[1];
	}

	protected function replaceIntegersBetween($message, $attribute, $rule, $parameters)
	{
		$message = str_replace(':min', $parameters[0], $message);
		$message = str_replace(':max', $parameters[1], $message);
		return $message;
	}



}