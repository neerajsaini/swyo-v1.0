<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_status_log_model extends MY_Model
{
	protected $skip_validation = TRUE;
	protected $table = "sessionStatusLog";
    protected $primary_key = FALSE;
    // protected $fields = array();


	#######################################################################

    function get_todays_log()
    {
    	$result = $this->db->from($this->table)
    		->select('status , datetime , COUNT(*) AS total')
    		->group_by('status')
    		->where('DATE(datetime) = DATE(NOW())')
    		->get()->result_array();

    	$fResult = array();
    	foreach($result as $row) {
    		$fResult[$row['status']] = $row['total'];
    	}

    	return $fResult;
    }

	#######################################################################
}