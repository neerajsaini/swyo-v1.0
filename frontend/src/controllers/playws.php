<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playws extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect('login'); }
	}

	#######################################################################

	function index()
	{	
		$this->player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));
	
		if( ($redirect = $this->checkRedirect()) !== FALSE ) {
			redirect($redirect);
		}

		$playerData = $this->player_model->get('playerID' , $this->session->userdata('playerID'));
		$serverData = $this->server_slot_model->get_player($this->session->userdata('playerID'));
		
		$this->smarty->assign('serverData', $serverData);
		$this->smarty->assign('playerName', $playerData['playerName']);
		$this->smarty->view('playws/'.$serverData['htmlFile']);
	}

	#######################################################################

	function checkRedirect()
	{
		$redirect = false;

		if(!$this->isLoggedIn()) { 
			$redirect = 'login' ;
		}
		else if(count($this->player) == 0) {
			$redirect = 'join' ;
		} 
		else if ($this->player['status'] == 'WAIT') {
			$redirect = 'wait' ;
		}
		else if ($this->player['status'] == 'PLAY_TIME_OUT') {
			$redirect = 'timeout' ;
		}

		return $redirect;
	}

	#######################################################################

	function ajx_checkStatus()
	{
		$this->session_model->update_updateTimestamp('SID', $this-> session->userdata('SID'));
		$this->player = $this->session_model->get_player_status($this->session->userdata('playerID'));
		echo json_encode(array(
			"redirect" => $this->checkRedirect()
		));
	}

	#######################################################################
}