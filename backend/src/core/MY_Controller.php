<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	var $systemParam = array();
	var $counterParam = array();
	
	function __construct()
	{
		parent::__construct();

		$this->loadDatabase();
	}

	//*********************************************************************

	function loadDatabase()
	{
		$this->db = $this->load->database('default' , TRUE);
		$this->load->model(array( 'my_model'
			, 'system_param_model', 'counter_param_model' 
			, 'session_model' , 'session_log_model' , 'session_status_log_model'
			, 'player_model'
		));
	}

	//*********************************************************************

	function setSystemParam()
	{
		$this->systemParam = $this->system_param_model->dropdown('key','val');
	}
	function setCounterParam()
	{
		$this->counterParam = $this->counter_param_model->dropdown('key','val');
	}

	//*********************************************************************
}