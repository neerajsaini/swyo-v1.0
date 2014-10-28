<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Config extends CI_Config 
{
	function __construct()
	{
		parent::__construct();

		if(defined('SHARED_CI_PATH'))
		{
			$this->_config_paths = array(APPPATH, SHARED_CI_PATH);
		}
	}
}