<?php namespace validator;

class ValidatorRules {

	public static $name = 'required|min:1|max:30|unique:users,name';

	public static $email = 'required|email|unique:users,email';

	public static $email_exist = 'required|email|exists:users,email';

	public static $password = 'required|min:6|max:50|confirmed';

	public static $birthYear = ['required', 'regex:/(19|20)[0-9]{2}/'];

	public static $length = 'required|integer|min:50|max:220|integer_between:50,220';

	public static $accepted_rules = 'accepted';

	public static $minage = 'required|integer_between:18,100';

	public static $maxage = 'required|integer_between:18,100';

	public static $gender_id = 'required|integer|exists:genders,id';

	public static $relationship_status_id = 'required|integer|exists:reletionship_statuses,id';

	public static $relationship_search_id = 'required|integer|exists:relationship_searches,id';

	public static $state_id = 'required|integer|exists:states,id';

	public static $city_id = 'required|integer|exists:cities,id';

	public static $eye_color_id = 'required|integer|exists:eye_colors,id';

	public static $hair_color_id = 'required|integer|exists:hair_colors,id';

	public static $physique_id = 'required|integer|exists:physique,id';

	public static $children_id = 'required|integer|exists:childrens,id';

	public static $pet_id = 'required|integer|exists:pets,id';

	public static $alcohol_id = 'required|integer|exists:alcohols,id';

	public static $tobacco_id = 'required|integer|exists:tobacco,id';

	public static $education_id = 'required|integer|exists:educations,id';

	public static $work_status_id = 'required|integer|exists:work_statuses,id';

	public static $work_id = 'required|integer|exists:works,id';

	public static $image_description = 'max:255';

	public static function makeUser()
	{
		return [
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
	}

	public static function updateUser()
	{
		return [
			'state'=>self::$state_id,
			'city'=>self::$city_id,
			'gender'=>self::$gender_id,
			'birth_year'=>self::$birthYear,
			'length'=>self::$length
		];
	}

	public static function makeRelationship()
	{
		return [
			'partner_gender'=>self::$gender_id,
			'relationship_status'=>self::$relationship_status_id,
			'relationship_search'=>self::$relationship_search_id
		];
	}

	public static function updateRelationship()
	{
		return [
			'partner_gender'=>self::$gender_id,
			'relationship_status'=>self::$relationship_status_id,
			'relationship_search'=>self::$relationship_search_id,
			'minage'=>self::$minage,
			'maxage'=>self::$maxage
		];
	}

	public static function updateAppearance()
	{
		return [
			'eye_color'=>self::$eye_color_id,
			'hair_color'=>self::$hair_color_id,
			'physique'=>self::$physique_id
		];
	}

	public static function updateDetail()
	{
		return [
			'children'=>self::$children_id,
			'pet'=>self::$pet_id,
			'alcohol'=>self::$alcohol_id,
			'tobacco'=>self::$tobacco_id
		];
	}

	public static function updateEmployment()
	{
		return [
			'education'=>self::$education_id,
			'work_status'=>self::$work_status_id,
			'work'=>self::$work_id
		];
	}

	public static function updateImage()
	{
		return ['description'=>self::$image_description];
	}

	public static function newPassword()
	{
		return ['email'=>self::$email_exist];
	}

}