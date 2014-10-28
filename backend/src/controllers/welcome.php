<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller 
{
	public function index()
	{
		echo site_url('hallo');
		$this->load->view('welcome_message');
	}

	public function test()
	{
		$this->smarty->view('test');
	}
}