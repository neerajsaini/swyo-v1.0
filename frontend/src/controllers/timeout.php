<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeout extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect('login'); }
	}

	function checkRedirect()
	{
		$redirect = false;

		if(count($this->player) != 0) 
		{
			if ($this->player['status'] == 'PLAY') {
				$redirect = 'playws' ;
			}
		} 

		return $redirect;
	}

	function index()
	{
		$this->player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));
		
		if( ($redirect = $this->checkRedirect()) !== FALSE ) {
			redirect($redirect);
		} 

		$this->smarty->view('timeout/timeout');
	}
}