<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends MY_Controller 
{
	var $execute = FALSE;

	#######################################################################
	## CONSTRUCT
	#######################################################################

	function __construct()
	{
		parent::__construct();
        $this->setSystemParam();
        $this->setCounterParam();
	}

	#######################################################################
	## INDEX
	#######################################################################

	function index()
	{
		
	}

	#######################################################################
	## PROCESS MANUALLY / AUTOMATICALLY
	#######################################################################

	function manual($execute=FALSE, $print=TRUE)
	{
		$this->smarty->view('layout/master');

		$this->execute = $execute ;

		$this->play_time_out();
		$this->played_out();
		$this->play_idle_out();
		$this->queue_idle_out();
		$this->allot_free_slots();

		if($print) 
		{
			foreach($this->players as $status => $data) 
			{
				echo "<h3 style='background:#333; color:#ddd; padding:10px; margin:0;'> $status </h3>";
				echo "<pre>". print_r($data, true) ."</pre>";
			}
		}
	}

	function auto($execute=TRUE)
	{
		$this->execute = $execute ;

		$this->play_time_out();
		$this->played_out();
		$this->play_idle_out();
		$this->queue_idle_out();
		$this->allot_free_slots();

		if($this->input->is_ajax_request()) 
		{
			$response['players'] = $this->players;
			echo json_encode($response);
		}
		else
		{
			$this->smarty->view('process/auto');
		}
	}

	#######################################################################
	## CHECK IN-PQUEUE
	#######################################################################

	private function check_inPQueue($limit, $action)
	{
		if($limit>0) 
		{
			$players = $this->db->from('session')->limit($limit)->where('inPQueue = 0 AND isPremium = 0')->get()->result_array();
			foreach($players as $row) {
				$this->db->where('playerID', $row['playerID'])->update('session', array('inPQueue'=>1));
			}
			$this->players['registered_inPQueue'][$action] = $players;
		}
	}

	#######################################################################
	#######################################################################
	## PROCESS PLAYERS BY STATUS
	#######################################################################
	#######################################################################

	private function play_time_out()
	{
		$this->setCounterParam(); 

		if(TRUE) 
		// if($this->counterParam['WAIT'] > 0) 
		{
			$this->players['play_time_out'] = $this->session_model->get_players_play_time_out($this->systemParam['PLAY_TIME_OUT']);
		
			if($this->execute)
			{
				foreach($this->players['play_time_out'] as $player)
				{
					$this->session_model->update_status('PLAY_TIME_OUT',$player['playerID']);
				}
			}
		}
	}

	private function played_out()
	{
		$this->players['played_out'] = $this->session_model->get_players_played_out(20);
		
		if($this->execute)
		{
			foreach($this->players['played_out'] as $player)
			{
				$this->session_model->delete($player['SID']);
				$this->server_slot_model->remove_player($player['playerID']);
				$this->session_status_log_model->insert(array('SID'=>$player['SID'], 'status'=>'PLAY_TIME_OUT', 'datetime' => date('Y-m-d H:i:s')));
				$this->counter_param_model->increase('PLAY_TIME_OUT'); 
			}
		}
	}

	#######################################################################

	private function play_idle_out()
	{
		$this->players['play_idle_out'] =  $this->session_model->get_players_play_idle_out($this->systemParam['PLAY_IDLE_OUT']); 
		
		if($this->execute)
		{
			foreach($this->players['play_idle_out'] as $player)
			{
				$this->session_model->delete($player['SID']);
				$this->server_slot_model->remove_player($player['playerID']);
				$this->session_status_log_model->insert(array('SID'=>$player['SID'], 'status'=>'PLAY_IDLE_OUT', 'datetime' => date('Y-m-d H:i:s')));
				$this->counter_param_model->increase('PLAY_IDLE_OUT'); 
			}
		}
	}

	#######################################################################

	private function queue_idle_out()
	{
		$count_inPQueue = 0;
		$this->players['queue_idle_out'] =  $this->session_model->get_players_queue_idle_out($this->systemParam['QUEUE_IDLE_OUT']); 

		if($this->execute)
		{
			foreach($this->players['queue_idle_out'] as $player)
			{
				if($player['inPQueue'])  $count_inPQueue += 1;
				$this->session_model->delete($player['SID']);
				$this->session_status_log_model->insert(array('SID'=>$player['SID'], 'status'=>'QUEUE_IDLE_OUT', 'datetime' => date('Y-m-d H:i:s')));
				$this->counter_param_model->decrease('WAIT'); 
				$this->counter_param_model->increase('QUEUE_IDLE_OUT'); 
			}

			$this->check_inPQueue($count_inPQueue , __FUNCTION__);
		}
	}

	#######################################################################
	## ALLOT FREE SLOTS
	#######################################################################

	private function allot_free_slots()
	{
		$this->setCounterParam(); 

		if($this->counterParam['WAIT'] > 0)
		{ 
			$freeSlots = $this->server_slot_model->get_free_active_slots();  
			$noFreeSlots = count($freeSlots);
			if($noFreeSlots > 0)
			{
				$limit = ($this->counterParam['WAIT'] <= $noFreeSlots) ? $this->counterParam['WAIT'] : $noFreeSlots;
				$this->players['waiting'] = $this->session_model->get_players_waiting($limit);

				if($this->execute)
				{
					$count_inPQueue = 0;
					for($i=0; $i<$limit; $i++)
					{
						$player = &$this->players['waiting'][$i];
						$fslot = $freeSlots[$i];
						//--------------------------------------------
						if($player['inPQueue'])  $count_inPQueue += 1;
						//--------------------------------------------
						$player['serverID'] = $fslot['serverID'];
						$player['slotNo'] = $fslot['slotNo'];
						//--------------------------------------------
						$this-> server_slot_model-> add_player($fslot['serverID'], $fslot['slotNo'], $player['playerID']);
						$this-> session_model-> update_status('PLAY', $player['playerID']);
						$this-> counter_param_model-> decrease('WAIT'); 
						$this-> counter_param_model-> increase('PLAYED'); 
						$this-> session_status_log_model-> insert(array('SID'=>$player['SID'], 'status'=>'PLAY', 'datetime' => date('Y-m-d H:i:s')));
					}
					$this->check_inPQueue($count_inPQueue , __FUNCTION__);
				}
			}
		}
	}

	#######################################################################
	
}




