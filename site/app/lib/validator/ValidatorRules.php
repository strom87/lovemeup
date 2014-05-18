<?php namespace validator;

class ValidatorRules {

	public static $name = 'required|min:1|max:30|unique:users,name';

	public static $email = 'required|email|unique:users,email';

	public static $email_exist = 'required|email|exists:users,email';

	public static $password = 'required|min:6|max:50|confirmed';

	public static $birthYear = ['required', 'regex:/(19|20)[0-9]{2}/'];

	public static $length = 'required|integer|min:50|max:220|integer_between:50,220';

	public static $accepted_rules = 'accepted';

	public static $min_age = 'required|integer_between:18,100';

	public static $max_age = 'required|integer_between:18,100';

	public static $gender_id = 'required|integer|exists:genders,id';

	public static $relationship_status_id = 'required|integer|exists:reletionship_statuses,id';

	public static $relationship_search_id = 'required|integer|exists:relationship_searches,id';

	public static $state_id = 'required|integer|exists:states,id';

	public static $city_id = 'required|integer|exists:cities,id';

	public static $image_description = 'max:255';

	public static function makeUser()
	{
		$make_user_rules = [
			'state'=>self::$state_id,
			'city'=>self::$city_id,
			'gender'=>self::$gender_id,
			'name'=>self::$name,
			'email'=>self::$email,
			'password'=>self::$password,
			'birth_year'=>self::$birthYear,
			'length'=>self::$length,
			'accepted_rules'=>self::$accepted_rules
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
			'partner_gender'=>self::$gender_id,
			'relationship_status'=>self::$relationship_status_id,
			'relationship_search'=>self::$relationship_search_id
		];

		return $relationship_rules;
	}

	public static function updateImage()
	{
		return ['description'=>self::$image_description];
	}

}