<?php namespace helpers;

use Cache as C;

class Cache {

	private static $time = 60;

	public static function has($name)
	{
		return C::has($name);
	}

	public static function put($name, $value)
	{
		C::put($name, $value, self::$time);
	}

	public static function get($name)
	{
		return C::get($name);
	}
}