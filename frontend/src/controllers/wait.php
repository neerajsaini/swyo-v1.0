<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wait extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect('login'); }
	}

	//#####################################################################

	function index()
	{
		$this->player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));
		
		if( ($redirect = $this->checkRedirect()) !== FALSE ) {
			redirect($redirect);
		}

		$this->session_model->update_updateTimestamp('playerID', $this-> session->userdata('playerID'));

		$this->tplData['player'] = $this->player;
		$this->smarty->view('wait/wait', $this->tplData);
	}

	//#####################################################################

	function checkRedirect()
	{
		$redirect = false;

		if(!$this->isLoggedIn()) { 
			$redirect = 'login' ;
		}
		else if(count($this->player) == 0) {
			$redirect = 'join' ;
		} 
		else if ($this->player['status'] == 'PLAY') {
			$redirect = 'playws' ;
		}
		else if ($this->player['status'] == 'PLAY_TIME_OUT') {
			$redirect = 'timeout' ;
		}

		return $redirect;
	}
	
	//#####################################################################
	//#####################################################################

	function ajx_checkStatus()
	{
		$this->session_model->update_updateTimestamp('SID', $this-> session->userdata('SID'));
		$this->player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));
		$qIndex = $this->get_queue_index_data();

		echo json_encode(array(
			"redirect" => $this->checkRedirect(),
			"inPQueue" => (int)$this->player['inPQueue'],
			"isPremium" => (int)$this->player['isPremium'],
			"qpos" => (int)$qIndex['qpos']
		));
	}

	//#####################################################################

	function get_queue_index_data()
	{
		$data = FALSE;

		if($this->player['inPQueue']) 
		{
			$data = $this->db->from('session')->select('COUNT(SID) AS qpos')
				->where('SID <=', (int)$this->player['SID'])
				->where('inPQueue', TRUE)
				->where('status', 'WAIT')
				->get()->row_array();
		}
		else if($this->player['isPremium']) 
		{
			$data = $this->db->from('session')->select('COUNT(SID) AS qpos')
				->where('SID <=', (int)$this->player['SID'])
				->where('isPremium', TRUE)
				->where('status', 'WAIT')
				->get()->row_array();
		}
		return $data;
	}

	//#####################################################################
}