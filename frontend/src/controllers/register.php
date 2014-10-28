<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();

		if($this->isLoggedIn()) { redirect('wait'); }
		
		include('securimage/securimage.php');
        $this->smarty->assign('securimage_show_file_path' , site_url('securimage/securimage_show.php' , FALSE));
    }

	public function index()
	{
		$this->smarty->view("register/register");
	}
}