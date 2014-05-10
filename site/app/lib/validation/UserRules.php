<?php namespace validation;

class UserRules {

	private static $name = 'required|min:1|max:30|unique:users,name';

	private static $email = 'required|email|unique:users,email';

	private static $password = 'required|min:6|max:50';

	private static $birthYear = ['required', 'regex:(19|20)[0-9]{2}'];

	private static $length = 'required|num|min:50|max:220';

	private static $accepted_rules = 'required';

	private static $make_user_rules = [
		'name'=>$name,
		'email'=>$email,
		'password'=>$password,
		'birthYear'=>$birthYear,
		'length'=>$length,
		'acceptedRules'=>$accepted_rules
	];

	public static makeUser()
	{
		return self::$make_user_rules;
	}
}