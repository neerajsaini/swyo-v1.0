<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends MY_Controller 
{
	var $debug = array();

	function __construct()
	{
		parent::__construct();
        $this->setSystemParam();
        $this->setCounterParam();
	}

	function index()
	{
		
	}

	function process_play_time_out()
	{
		$players = $this->session_model->get_players_play_time_out($this->systemParam['PLAY_TIME_OUT']);

		foreach($players as $player)
		{
			
		}
	}


}