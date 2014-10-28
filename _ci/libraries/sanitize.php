<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sanitize 
{
	private $str;

	function set($str)
	{
		$this->str = $str;
		return $this;
	}
	function get()
	{
		return $this->str;
	}

	function trim()
	{
		$this->str = trim($this->str);
		return $this;
	}
	function remove_multispaces()
	{
		$this->str = preg_replace('/\s+/', ' ',$this->str);
		$this->str = trim($this->str);
		return $this;
	}
	function replace_spaces($replace='-')
	{
		$this->str = str_replace(' ', $replace, $this->str);
		return $this;
	}


	function tolower()
	{
		$this->str = strtolower($this->str);
		return $this;
	}
	
}