<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_model extends MY_Model
{
	protected $skip_validation = TRUE;
	protected $table = "session";
    protected $primary_key = "SID";

    function update_updateTimestamp($key,$val)
	{
		$this->db->set('updateTimestamp' , date("Y-m-d H:i:s"))
			->where($key,$val)
			->update($this->table);
	}

	function update_status($status, $playerID)
	{
		$now = date('Y-m-d H:i:s');
		$this->db ->set('status', $status) 
			->set('startTimestamp' , $now)  ->set('updateTimestamp' , $now)
			->where('playerID',$playerID)
			->update($this->table);
	}

	function get_player_status($playerID)
	{
		return $this->db->select('status')
			->where('playerID',$playerID)
			->get($this->table)->row_array();
	}

	function get_all_waiting()
	{
		$now = date('Y-m-d H:i:s');
		$waitingTime = "UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(startTimestamp) AS waitingTime";
		$updateTime = "UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(updateTimestamp) AS updateTime";

		$result = $this->db
			->select("session.*, player.* , $waitingTime, $updateTime")
			->from('session')
			->join('player', 'session.playerID=player.playerID', 'left')
			->where('session.status','WAIT')
			->get()->result_array();

		return $result;
	}

	#######################################################################
	## PROCESS HELPERS
	#######################################################################

	function get_players_waiting($limit)
	{
		$premium = $inPQueue = array();
		$now = date('Y-m-d H:i:s');
		$waitingTime = "UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(startTimestamp) AS waitingTime";

		if($limit > 0) 
		{
			$premium = $this->db->limit($limit)
				->select("SID,playerID,inPQueue,isPremium,$waitingTime")
				->where('status','WAIT')
				->where('isPremium',TRUE)
				->order_by('SID')
				->get($this->table) ->result_array();
		}

		$limit -= count($premium);

		if($limit > 0) 
		{
			$inPQueue = $this->db->limit($limit)
				->select("SID,playerID,inPQueue,isPremium,$waitingTime")
				->where('status','WAIT')
				->where('inPQueue',TRUE)
				->order_by('SID')
				->get($this->table) ->result_array();
		}

		return array_merge($premium, $inPQueue);
	}

	#######################################################################
	#######################################################################

	

	function get_players_play_time_out($playTime , $noPlayersWaiting)
	{
		$now = date('Y-m-d H:i:s');

		return $this->db
			->limit($noPlayersWaiting)
			->select("SID,playerID, UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(startTimestamp) AS playTime" , FALSE)
			->where('status','PLAY')
			->having('playTime > ' , $playTime)
			->get($this->table) ->result_array();
	}
	function get_players_played_out($playedOutTime)
	{
		$now = date('Y-m-d H:i:s');

		return $this->db
			->select("SID,playerID, UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(startTimestamp) AS playedOutTime" , FALSE)
			->where('status','PLAY_TIME_OUT')
			->having('playedOutTime > ' , $playedOutTime)
			->get($this->table) ->result_array();
	}



	function get_players_play_idle_out($idleTime)
	{
		$now = date('Y-m-d H:i:s');

		return $this->db
			->select("SID,playerID, UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(updateTimestamp) AS idleTime" , FALSE)
			->where('status','PLAY')
			->having('idleTime > ' , $idleTime)
			->get($this->table) ->result_array();
	}



	function get_players_queue_idle_out($idleTime)
	{
		$now = date('Y-m-d H:i:s');
		
		return $this->db
			->select("SID,playerID,inPQueue,isPremium, UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(updateTimestamp) AS idleTime" , FALSE)
			->where('status','WAIT')
			->having('idleTime > ' , $idleTime)
			->get($this->table) ->result_array();
	}

}