<?php namespace helpers;

class Basic {

	public static function getYearsRange()
	{
		$year = date('Y') - 18;
		return range($year, 1900, -1);
	}

	public static function getLengthRange()
	{
		return range(200, 50, -1);
	}
}