<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset extends MY_Controller 
{
	function index()
	{
		$this->db->set('val',0)->where('val >', 0)->update('counterParam');
		$this->db->set('playerID',NULL)->where('playerID IS NOT NULL')->update('serverSlot');
		$this->db->where('SID >', 0)->delete('session');
		$this->db->where('SID >', 0)->delete('sessionLog');
		$this->db->where('SID >', 0)->delete('sessionStatusLog');

		$this->smarty->view('layout/master');
	}
}