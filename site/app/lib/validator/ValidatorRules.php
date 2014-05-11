<?php namespace validator;

class ValidatorRules {

	private static $name = 'required|min:1|max:30|unique:users,name';

	private static $email = 'required|email|unique:users,email';

	private static $password = 'required|min:6|max:50';

	private static $birthYear = ['required', 'regex:/(19|20)[0-9]{2}/'];

	private static $length = 'required|numeric|min:50|max:220';

	private static $accepted_rules = 'required|accepted';

	private static $min_age = 'required|integer_between:18,100';

	private static $max_age = 'required|integer_between:18,100';

	private static $gender_id = 'required|exists:genders,id';

	private static $relationship_status_id = 'required|exists:reletionship_statuses,id';

	private static $relationship_search_id = 'required|exists:relationship_searches,id';

	public static function makeUser()
	{
		$make_user_rules = [
			'gender'=>self::$gender_id,
			'name'=>self::$name,
			'email'=>self::$email,
			'password'=>self::$password,
			'birthYear'=>self::$birthYear,
			'length'=>self::$length,
			'acceptedRules'=>self::$accepted_rules
		];

		return $make_user_rules;
	}

	public static function makeRelationship()
	{
		$relationship_rules = [
			'partnerGender'=>self::$gender_id,
			'relationshipStatus'=>self::$relationship_status_id,
			'relationshipSearch'=>self::$relationship_search_id,
			'minage'=>self::$min_age,
			'maxage'=>self::$max_age
		];

		return $relationship_rules;
	}

}