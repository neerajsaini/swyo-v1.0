<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller 
{
	var $tplData = array();

	function __construct()
	{
		parent::__construct();
        $this->setSystemParam();
        $this->setCounterParam();
	}

	//*********************************************************************
	//*********************************************************************

	function index()
	{
		$this->tplData['counterParam'] = $this->counterParam;
		$this->tplData['systemParam'] = $this->systemParam;

		$serverData = $this->server_model->get_all();
		$this->tplData['serverData'] = $serverData;

		$serverSlotData = $this->server_slot_model->get_slots_data();
		$this->tplData['serverSlotData'] = $serverSlotData;
		
		//  echo "<pre>".print_r($serverData, true)."</pre>";

		$playerData = array();
		$sessionData = $this->session_model->get_all();
		foreach($sessionData as $row) {
			$playerData[$row['playerID']] = $this->player_model->get($row['playerID']);
		}
		$this->tplData['sessionData'] = $sessionData;
		$this->tplData['playerData'] = $playerData;


		$this->smarty->view('home/home', $this->tplData);
	}

	//*********************************************************************
	//*********************************************************************
}