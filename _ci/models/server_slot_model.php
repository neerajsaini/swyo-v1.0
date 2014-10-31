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
    	return $this->db
            ->from('serverSlot AS sslot')
            ->join('server', 'sslot.serverID = server.serverID', 'left')
            ->where('sslot.playerID', $playerID)
            ->get()->row_array();
    }


    function get_slots_data()
    {
        return $this->db
            ->select('sslot.*, playerName, isPremium, serverName')
            ->from('serverSlot AS sslot')
            ->join('server', 'sslot.serverID = server.serverID', 'left')
            ->join('player', 'sslot.playerID = player.playerID', 'left')
            ->get()->result_array();
    }

    function get_free_active_slots()
    {
        return $this->db->where('playerID' , NULL)->where('isActive' , 1)->get($this->table)->result_array();
    }

    function count_active_slots()
    {
        return $this->db->where('isActive' , 1)->count_all_results($this->table);
    }
}