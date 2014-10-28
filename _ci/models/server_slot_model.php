<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Server_slot_model extends MY_Model
{
	protected $skip_validation = TRUE;
	protected $table = "serverSlot";
    protected $primary_key = "SID";
    // protected $fields = array();

    function remove_player($playerID)
    {
    	$this->db->set('playerID' , NULL)->where('playerID', $playerID)->update($this->table);
    }


    function add_player($serverID, $slotNo, $playerID)
    {
    	$this->db->set('playerID', $playerID)->where(array('serverID'=>$serverID, 'slotNo'=>$slotNo))->update($this->table);
    }


    function get_player($playerID)
    {
    	return $this->db->where('playerID', $playerID)->get($this->table)->row_array();
    }

    function get_alloted_server($playerID)
    {
        return $this->db
            ->from('serverSlot AS sslot')
            ->join('server', 'sslot.serverID = server.serverID', 'left')
            ->where('sslot.playerID', $playerID)
            ->get()->row_array();
    }


    function get_free_slots()
    {
    	return $this->db->where('playerID' , NULL)->where('isActive' , 1)->get($this->table)->result_array();
    }
}