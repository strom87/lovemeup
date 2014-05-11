<?php namespace validator\custom;

use Illuminate\Validation\Validator;

class ValidatorExtentions extends Validator {

	# usage: integer_between:min,max
	# check: if the value is between or equal the min or max value
	public function validateIntegerBetween($attribute, $value, $parameters)
	{
		return $value >= $parameters[0] && $value <= $parameters[1];
	}

	protected function replaceIntegerBetween($message, $attribute, $rule, $parameters)
	{
		$message = str_replace(':min', $parameters[0], $message);
		$message = str_replace(':max', $parameters[1], $message);
		return $message;
	}

}