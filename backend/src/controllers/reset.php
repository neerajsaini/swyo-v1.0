<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset extends MY_Controller 
{
	function index($action=FALSE)
	{
		$this->smarty->view('layout/master');
	}

	function all()
	{
		$this->queue();
		$this->log();
		$this->smarty->view('layout/master');
		echo "<h1> DONE </h1>";
	}

	function queue()
	{
		$this->db->where('SID >', 0)->delete('session');
		$this->db->set('playerID',NULL)->where('playerID IS NOT NULL')->update('serverSlot');
	}

	function log()
	{
		$this->db->set('val',0)->where('val >', 0)->update('counterParam');
		$this->db->where('SID >', 0)->delete('sessionLog');
		$this->db->where('SID >', 0)->delete('sessionStatusLog');
	}
}