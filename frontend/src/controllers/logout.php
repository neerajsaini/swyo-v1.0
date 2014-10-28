<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect('login'); }

	}

	//*********************************************************************

	public function index($sync=TRUE)
	{
		if($sync) {
			$this->sync_logout();
		}
		$this->session->sess_destroy();
		redirect('login');
	}

	//*********************************************************************

	private function sync_logout()
	{
		$player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));

		if(count($player) > 0)
		{
			$this->session_model->delete($player['SID']);
			switch ($player['status'])
			{
				case 'WAIT':
					$this->counter_param_model->decrease('WAIT'); 
					$this->session_status_log_model->insert(array('SID'=>$player['SID'], 'status'=>'LOGOUT', 'datetime' => date('Y-m-d H:i:s')));
					break;
				case 'PLAY':
					$this->server_slot_model->remove_player($player['playerID']);
					$this->session_status_log_model->insert(array('SID'=>$player['SID'], 'status'=>'LOGOUT', 'datetime' => date('Y-m-d H:i:s')));
					break;
				case 'PLAY_TIME_OUT':
					$this->server_slot_model->remove_player($player['playerID']);
					$this->session_status_log_model->insert(array('SID'=>$player['SID'], 'status'=>'PLAY_TIME_OUT', 'datetime' => date('Y-m-d H:i:s')));
				break;
			}
		}
	}

	//*********************************************************************
}