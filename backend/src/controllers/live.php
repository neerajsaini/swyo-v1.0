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
		$todaysSessionLog = $this->session_log_model->get_todays_log();

		$hourWiseData = $dayData = array() ;
		foreach($todaysSessionLog as $row) 
		{
			$browser = $row['browser'];
			$country = $row['countryName'];

			if (empty($browser)) $browser = 'unknown' ;
			if (empty($country)) $country = 'unknown' ;
			$hour = date('H', strtotime($row['datetime']));
			//-----------------------------------------------------
			if (!isset($hourWiseData[$hour]['count'])) {
				$hourWiseData[$hour]['count'] = 1 ; 
			} else {
				$hourWiseData[$hour]['count'] += 1 ; 
			}

			if (!isset($hourWiseData[$hour]['browser'][$browser])) {
				$hourWiseData[$hour]['browser'][$browser] = 1 ; 
			} else {
				$hourWiseData[$hour]['browser'][$browser] += 1 ; 
			}

			if (!isset($hourWiseData[$hour]['country'][$country])) {
				$hourWiseData[$hour]['country'][$country] = 1 ; 
			} else {
				$hourWiseData[$hour]['country'][$country] += 1 ; 
			}
			//-----------------------------------------------------
			if (!isset($dayData['count'])) {
				$dayData['count'] = 1 ; 
			} else {
				$dayData['count'] += 1 ; 
			}

			if (!isset($dayData['browser'][$browser])) {
				$dayData['browser'][$browser] = 1 ; 
			} else {
				$dayData['browser'][$browser] += 1 ; 
			}

			if (!isset($dayData['country'][$country])) {
				$dayData['country'][$country] = 1 ; 
			} else {
				$dayData['country'][$country] += 1 ; 
			}
			//-----------------------------------------------------
		}

		//SMARTY
		//----------------------------------------------
		$this->tplData = array(
			'activeSlotsData' =>  $activeSlotsData,
			'noPlayersPlaying' =>  $noPlayersPlaying,
			'playersWaiting' =>  $playersWaiting,
			'todaysLog' =>  $todaysLog,
			'todaysSessionLog' =>  $todaysSessionLog,
			'hourWiseData' =>  $hourWiseData,
			'dayData' =>  $dayData,
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