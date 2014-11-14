<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_log_model extends MY_Model
{
	protected $table = "sessionLog";
    protected $primary_key = "SID";
	protected $skip_validation = TRUE;
    
	#######################################################################
	function get_todays_log()
	{
		$result = $this->db
			->from('sessionLog AS sessLog')
			->join('player', 'sessLog.playerID = player.playerID')
    		->where('DATE(sessLog.datetime) = DATE(NOW())')
    		->order_by('sessLog.SID desc')
    		->get()->result_array();

    	return $result;
	}
	#######################################################################
}