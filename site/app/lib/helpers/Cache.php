<?php namespace helpers;

use Cache as C;

class Cache {

	private static $time = 60;

	public static function has($key)
	{
		return C::has($key);
	}

	public static function put($key, $value)
	{
		C::put($key, $value, self::$time);
	}

	public static function forever($key, $value)
	{
		C::forever($key, $value);
	}

	public static function get($key)
	{
		return C::get($key);
	}
}