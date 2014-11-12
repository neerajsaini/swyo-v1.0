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


	function editServerData()
	{
		$this-> form_validation->set_rules(array(
            array(
                'field' => 'playerName',
                'label' => 'Player Name',
                'rules' => 'trim|required|min_length[3]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|callback_authPlayerLogin'
            )
        ));
	}


	function toggleServerSlotStatus($str)
	{
		$part = explode("_", $str);
		$status = $part[0];
		$serverID = (int)$part[1];
		$slotNo = (int)$part[2];

		$isActive = $status == 'activate' ? 1 : 0 ;

		$this->server_slot_model->update_server_slot_status($isActive, $serverID, $slotNo);
		$playerID = $this->server_slot_model->get_playerID_on_server_slot($serverID, $slotNo);
		if($playerID) {
			$this->server_slot_model->remove_player($playerID);
			$this->session_model->update_status('PLAY_TIME_OUT',$playerID);
		}
		


		echo json_encode('done');
	}

}