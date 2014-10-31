<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends MY_Controller 
{
	var $playerSess = FALSE;

	//*********************************************************************

	function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect('login'); }

		$this->setSystemParam();
        $this->setCounterParam();
	}

	//*********************************************************************

	public function index()
	{
		$player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));

		if(count($player) == 0) 
		{
			if($this->session->userdata('isPremium'))
			{
				$this->_add_new_wait_session($inPQueue=FALSE, $isPremium=TRUE);
			}
			else if($this->counterParam['WAIT'] < $this->systemParam['MAX_QUEUE_SIZE']) 
			{
				$this->_add_new_wait_session($inPQueue=TRUE);
			}
			else 
			{
				$this->_add_new_wait_session($inPQueue=FALSE);
			}
			
			redirect('wait');
		} 
		else
		{
			$this->session->set_userdata('SID',$player['SID']);

			if ($player['status'] == 'WAIT') 
			{
				redirect('wait');
			} 
			else if ($player['status'] == 'PLAY') 
			{
				redirect('playws');
			}
			else if ($player['status'] == 'PLAY_TIME_OUT') {
				redirect('timeout'); 
			}
		}
	}

	//*********************************************************************

	public function _add_new_wait_session($inPQueue, $isPremium=FALSE)
	{
		$playerID =  $this->session->userdata('playerID');
		$datetime = date('Y-m-d H:i:s');

		//+++++++++++++++++++++++++++

		$session_data = array(
			'status' => 'WAIT',
			'playerID' => $playerID,
			'tokenTimestamp' =>  $datetime, 
			'startTimestamp' => $datetime, 
			'updateTimestamp' => $datetime, 
			'isPremium' => $isPremium,
			'inPQueue' => $inPQueue
		);
		
		$session_log_data = array_merge($this->getUserLocationInfo(), array(
			'playerID' => $playerID
		));
		
		$session_status_log_data = array(
			'status' => 'WAIT',
			'datetime' => $datetime
		);

		//+++++++++++++++++++++++++++
		
		$SID = $this->session_model->insert($session_data);
		$this->session_log_model->insert(array_merge($session_log_data, array('SID'=>$SID)));
		$this->session_status_log_model->insert(array_merge($session_status_log_data, array('SID'=>$SID)));

		//+++++++++++++++++++++++++++

		$this->session->set_userdata('SID',$SID);
		$this->counter_param_model->increase('WAIT');
		$this->counter_param_model->increase('JOINED');
	}

	//*********************************************************************
}