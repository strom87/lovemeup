<?php namespace validator;

class ValidatorRules {

	private static $name = 'required|min:1|max:30|unique:users,name';

	private static $email = 'required|email|unique:users,email';

	private static $email_exist = 'required|email|exists:users,email';

	private static $password = 'required|min:6|max:50|confirmed';

	private static $birthYear = ['required', 'regex:/(19|20)[0-9]{2}/'];

	private static $length = 'required|integer|min:50|max:220';

	private static $accepted_rules = 'accepted';

	private static $min_age = 'required|integer_between:18,100';

	private static $max_age = 'required|integer_between:18,100';

	private static $gender_id = 'required|integer|exists:genders,id';

	private static $relationship_status_id = 'required|integer|exists:reletionship_statuses,id';

	private static $relationship_search_id = 'required|integer|exists:relationship_searches,id';

	private static $state_id = 'required|integer|exists:states,id';

	private static $city_id = 'required|integer|exists:cities,id';

	public static function makeUser()
	{
		$make_user_rules = [
			'state'=>self::$state_id,
			'city'=>self::$city_id,
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

	public static function newPassword()
	{
		return ['email'=>self::$email_exist];
	}

	public static function makeRelationship()
	{
		$relationship_rules = [
			'partnerGender'=>self::$gender_id,
			'relationshipStatus'=>self::$relationship_status_id,
			'relationshipSearch'=>self::$relationship_search_id
		];

		return $relationship_rules;
	}

}