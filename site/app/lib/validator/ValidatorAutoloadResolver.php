<?php namespace validator;

use Validator;
use validator\custom\ValidatorExtentions;

Validator::resolver(function($translator, $data, $rules, $messages)
{
	return new ValidatorExtentions($translator, $data, $rules, $messages);
});