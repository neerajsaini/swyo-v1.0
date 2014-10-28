<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_model extends MY_Model
{
	protected $skip_validation = TRUE;
	protected $table = "session";
    protected $primary_key = "SID";

    function updateTimestamp($key,$val)
	{
		$this->db->set('updateTimestamp' , date("Y-m-d H:i:s"))
			->where($key,$val)
			->update($this->table);
	}

	#######################################################################
	#######################################################################

	function get_players_play_time_out($playTime=300)
	{
		$now = date('Y-m-d H:i:s');

		return $this->db
			->select("SID,status,playerID, UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(startTimestamp) AS playTime" , FALSE)
			->where('status','PLAY')
			->having('playTime > ' , $playTime)
			->get($this->table) ->result_array();
	}

	function get_players_play_idle_out($idleTime=60)
	{
		$now = date('Y-m-d H:i:s');

		return $this->db
			->select("SID,status,playerID, UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(updateTimestamp) AS idleTime" , FALSE)
			->where('status','PLAY')
			->having('idleTime > ' , $idleTime)
			->get($this->table) ->result_array();
	}

	function get_players_queue_idle_out($idleTime=60)
	{
		$now = date('Y-m-d H:i:s');
		
		return $this->db
			->select("SID,status,playerID, UNIX_TIMESTAMP('{$now}') - UNIX_TIMESTAMP(updateTimestamp) AS idleTime, inPQueue" , FALSE)
			->where('status','WAIT')
			->having('idleTime > ' , $idleTime)
			->get($this->table) ->result_array();
	}

}