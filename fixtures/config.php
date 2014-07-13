<?php

class Config {

	protected $settings;

	public function __construct($settings = array())
	{
		$this->settings = $settings;
	}

	public static function load($path)
	{
		$config = new static();

		if (file_exists($path))
			return new static(include $path);

		return new static;
	}

	public function get($key, $default = null)
	{
		if (isset($this->settings[$key]))
			return $this->settings[$key];

		return $default;
	}

	public function set($key, $value)
	{
		$this->settings[$key] = $value;
	}
}