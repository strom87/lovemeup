<?php namespace helpers;

use helpers\Cache;
use helpers\Basic;
use database\Gender;
use database\State;
use database\City;
use database\RelationshipStatus;
use database\RelationshipSearch;
use database\Alcohol;
use database\Children;
use database\Education;
use database\EyeColor;
use database\HairColor;
use database\Pet;
use database\Physique;
use database\Tobacco;
use database\Work;
use database\WorkStatus;

class DropDown {

	public static function ages()
	{
		if (!Cache::has('ages_list'))
		{
			$ages = [];

			foreach(Basic::getAgesRange() as $age)
			{
				$ages[$age] = $age;
			}

			Cache::put('ages_list', $ages);
		}

		return Cache::get('ages_list');
	}

	public static function years()
	{
		if (!Cache::has('years_list'))
		{
			$years = [];

			foreach(Basic::getYearsRange() as $year)
			{
				$years[$year] = $year;
			}

			Cache::put('years_list', $years);
		}

		return Cache::get('years_list');
	}

	public static function lengths()
	{
		if (!Cache::has('lengths_list'))
		{
			$lengths = [];

			foreach(Basic::getLengthRange() as $length)
			{
				$lengths[$length] = $length;
			}

			Cache::put('lengths_list', $lengths);
		}

		return Cache::get('lengths_list');
	}

	public static function genders()
	{
		if (!Cache::has('genders_list'))
		{
			$genders = Gender::all()->lists('name', 'id');
			
			Cache::put('genders_list', $genders);
		}

		return Cache::get('genders_list');
	}
	
	public static function relationshipStatuses()
	{
		if (!Cache::has('relationship_statuses_list'))
		{
			$statuses = RelationshipStatus::all()->lists('name', 'id');

			Cache::put('relationship_statuses_list', $statuses);
		}

		return Cache::get('relationship_statuses_list');
	}

	public static function relationshipSearches()
	{
		if (!Cache::has('relationship_searches_list'))
		{
			$searches = RelationshipSearch::all()->lists('name', 'id');

			Cache::put('relationship_searches_list', $searches);
		}

		return Cache::get('relationship_searches_list');
	}

	public static function states()
	{
		if (!Cache::has('states_list'))
		{
			$states = State::orderBy('name')->lists('name', 'id');

			Cache::put('states_list', $states);
		}

		return Cache::get('states_list');
	}

	public static function cities($state_id = null)
	{
		if (!Cache::has('cities_list') || !is_null($state_id))
		{
			if (is_null($state_id))
			{
				$state_id = 1;
			}

			$cities = City::where('state_id', $state_id)->orderBy('name')->lists('name', 'id');

			Cache::put('cities_list', $cities);
		}

		return Cache::get('cities_list');
	}

	public static function alcohols()
	{
		if (!Cache::has('alcohols_list'))
		{
			$alcohols = Alcohol::all()->lists('name', 'id');
			
			Cache::put('alcohols_list', $alcohols);
		}

		return Cache::get('alcohols_list');
	}

	public static function childrens()
	{
		if (!Cache::has('childrens_list'))
		{
			$childrens = Children::all()->lists('name', 'id');
			
			Cache::put('childrens_list', $childrens);
		}

		return Cache::get('childrens_list');
	}

	public static function educations()
	{
		if (!Cache::has('educations_list'))
		{
			$educations = Education::all()->lists('name', 'id');
			
			Cache::put('educations_list', $educations);
		}

		return Cache::get('educations_list');
	}

	public static function eyeColors()
	{
		if (!Cache::has('eye_colors_list'))
		{
			$eyeColors = EyeColor::all()->lists('name', 'id');
			
			Cache::put('eye_colors_list', $eyeColors);
		}

		return Cache::get('eye_colors_list');
	}

	public static function hairColors()
	{
		if (!Cache::has('hair_colors_list'))
		{
			$hairColors = HairColor::all()->lists('name', 'id');
			
			Cache::put('hair_colors_list', $hairColors);
		}

		return Cache::get('hair_colors_list');
	}

	public static function pets()
	{
		if (!Cache::has('pets_list'))
		{
			$pets = Pet::all()->lists('name', 'id');
			
			Cache::put('pets_list', $pets);
		}

		return Cache::get('pets_list');
	}

	public static function physiques()
	{
		if (!Cache::has('physiques_list'))
		{
			$physiques = Physique::all()->lists('name', 'id');
			
			Cache::put('physiques_list', $physiques);
		}

		return Cache::get('physiques_list');
	}

	public static function tobaccos()
	{
		if (!Cache::has('tobaccos_list'))
		{
			$tobaccos = Tobacco::all()->lists('name', 'id');
			
			Cache::put('tobaccos_list', $tobaccos);
		}

		return Cache::get('tobaccos_list');
	}

	public static function works()
	{
		if (!Cache::has('works_list'))
		{
			$works = Work::all()->lists('name', 'id');
			
			Cache::put('works_list', $works);
		}

		return Cache::get('works_list');
	}

	public static function workStatuses()
	{
		if (!Cache::has('work_statuses_list'))
		{
			$workStatuses = WorkStatus::all()->lists('name', 'id');
			
			Cache::put('work_statuses_list', $workStatuses);
		}

		return Cache::get('work_statuses_list');
	}

}