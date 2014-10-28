<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counter_param_model extends MY_Model
{
	protected $skip_validation = TRUE;
	protected $table = "counterParam";
    protected $primary_key = "key";
    protected $fields = array("key","val");


	#######################################################################

	function increase($key,$by=1)
    {
    	$this->db->set('val', "val + $by" , FALSE);
    	$this->db->where('key' , $key);
    	$this->db->update($this->table);
    }

    function decrease($key,$by=1)
    {
    	$this->db->set('val', "val - $by" , FALSE);
    	$this->db->where('key' , $key);
    	$this->db->update($this->table);
    }

	#######################################################################
}