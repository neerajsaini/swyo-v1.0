<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Live extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$activeSlotsData = $this->server_slot_model->get_active_slots_data();
		$noPlayersPlaying = $this->server_slot_model->count_players();
		$playersWaiting = $this->session_model->get_all_waiting();
		$todaysLog = $this->session_status_log_model->get_todays_log();

		

		//SMARTY
		//----------------------------------------------
		$this->tplData = array(
			'activeSlotsData' =>  $activeSlotsData,
			'noPlayersPlaying' =>  $noPlayersPlaying,
			'playersWaiting' =>  $playersWaiting,
			'todaysLog' =>  $todaysLog,
		);
		//----------------------------------------------
		$this->smarty->view('live/live', $this->tplData);
	}


	function timeout($str)
	{
		$part = explode('_', $str);
		$playerID = $part[1];
		$this->session_model->update_status('PLAY_TIME_OUT',$playerID);
		echo json_encode('done');
	}

}