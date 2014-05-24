<?php namespace helpers;

use Auth;
use DB;
use database\User;
use helpers\Basic;

class Search {

	public static function byName($name)
	{
		$users = User::where('id', '!=', Auth::user()->id)
					 ->where('name', 'like', "%{$name}%")
					 ->active()
					 ->get();

		return $users;
	}

	public static function advanced($options)
	{
		$user = Auth::user();
		$age = Basic::calcAge($user->birth_year);

		$query = self::joinTablesQuery();
		$query = self::hasProfilePictureQuery($options, $query);
		$query = self::relationshipSearchQuery($options, $query, $age);
		$query = self::detailSearchQuery($options, $query);
		$query = self::appearanceSearchQuery($options, $query);
		$query = self::employmentSearchQuery($options, $query);
		$query = self::userSearchQuery($options, $query, $user->id);	
		
		$query->select('users.id', 'users.name', 'users.birth_year', 'users.state_id', 'users.city_id');

		return $query->get();
	}

	private static function joinTablesQuery()
	{
		$query = DB::table('users');
		$query->join('user_relations', 'users.id', '=', 'user_relations.user_id');
		$query->join('user_details', 'users.id', '=', 'user_details.user_id');
		$query->join('user_employments', 'users.id', '=', 'user_employments.user_id');
		$query->join('user_appearances', 'users.id', '=', 'user_appearances.user_id');

		return $query;
	}

	private static function userSearchQuery($options, $query, $pid)
	{
		if (isset($options['city']))
		{
			$query->whereIn('users.city_id', $options['city']);
		}

		$query->where('users.gender_id', '=', $options['gender'])
			  ->where('users.birth_year', '<=', Basic::calcYear($options['minage']))
		 	  ->where('users.birth_year', '>=', Basic::calcYear($options['maxage']))
			  ->where('users.state_id', $options['state'])
			  ->where('users.id', '!=', $pid)
			  ->where('users.is_activated', '=', true)
			  ->where('users.is_paused', '=', false);

		return $query;
	}

	private static function employmentSearchQuery($options, $query)
	{
		if (isset($options['education']))
		{
			$query->whereIn('user_employments.education_id', $options['education']);
		}

		if (isset($options['work']))
		{
			$query->whereIn('user_employments.work_id', $options['work']);
		}

		if (isset($options['work_status']))
		{
			$query->whereIn('user_employments.works_status_id', $options['work_status']);
		}

		return $query;
	}

	private static function appearanceSearchQuery($options, $query)
	{
		if (isset($options['eye_color']))
		{
			$query->whereIn('user_appearances.eye_color_id', $options['eye_color']);
		}

		if (isset($options['hair_color']))
		{
			$query->whereIn('user_appearances.hair_color_id', $options['hair_color']);
		}

		if (isset($options['physique']))
		{
			$query->whereIn('user_appearances.physique_id', $options['physique']);
		}

		return $query;
	}

	private static function detailSearchQuery($options, $query)
	{
		if (isset($options['children']))
		{
			$query->whereIn('user_details.children_id', $options['children']);
		}

		if (isset($options['pet']))
		{
			$query->whereIn('user_details.pet_id', $options['pet']);
		}

		if (isset($options['alcohol']))
		{
			$query->whereIn('user_details.alcohol_id', $options['alcohol']);
		}

		if (isset($options['tobacco']))
		{
			$query->whereIn('user_details.tobacco_id', $options['tobacco']);
		}

		return $query;
	}

	private static function hasProfilePictureQuery($options, $query)
	{
		if (isset($options['has_profile_image']))
		{
			$query->join('images', 'users.id', '=', 'images.user_id');
			$query->where('is_profile', '=', true);
		}

		return $query;
	}

	private static function relationshipSearchQuery($options, $query, $age)
	{
		if (isset($options['search_my_age']))
		{
			$query->where('user_relations.minage', '<=', $age);
			$query->where('user_relations.maxage', '>=', $age);
		}

		if (isset($options['search']))
		{
			$query->whereIn('user_relations.relationship_search_id', $options['search']);
		}

		if (isset($options['status']))
		{
			$query->whereIn('user_relations.relationship_status_id', $options['status']);
		}

		return $query;
	}

}