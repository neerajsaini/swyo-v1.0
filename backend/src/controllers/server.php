<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Server extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
        $this->setSystemParam();
	}

	function index()
	{
		$serverData = $this->server_model->get_all();
		$slotsData = $this->server_slot_model->get_slots_data();

		//SMARTY
		//----------------------------------------------
		$this->tplData = array(
			'systemParam' =>  $this->systemParam,
			'serverData' =>  $serverData,
			'slotsData' =>  $slotsData,
		);
		//----------------------------------------------
		$this->smarty->view('server/server', $this->tplData);
	}
}