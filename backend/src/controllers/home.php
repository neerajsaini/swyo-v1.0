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
		$playerData = array();
		$sessionData = $this->session_model->get_all();
		foreach($sessionData as $row) {
			$playerData[$row['playerID']] = $this->player_model->get($row['playerID']);
		}



		$this->tplData['counterParam'] = $this->counterParam;
		$this->tplData['systemParam'] = $this->systemParam;
		$this->tplData['sessionData'] = $sessionData;
		$this->tplData['playerData'] = $playerData;
		$this->smarty->view('home/home', $this->tplData);
	}

	//*********************************************************************
	//*********************************************************************

	function reset_all()
	{
		$this->db->set('val',0)->where('val >', 0)->update('counterParam');
		$this->db->set('playerID',NULL)->where('playerID IS NOT NULL')->update('serverSlot');
		$this->db->where('SID >', 0)->delete('session');
		$this->db->where('SID >', 0)->delete('sessionLog');
		$this->db->where('SID >', 0)->delete('sessionStatusLog');

		$this->smarty->view('layout/master');
	}

	//*********************************************************************
	//*********************************************************************
}