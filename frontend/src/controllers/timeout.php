<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeout extends MY_Controller 
{ 
	function __construct()
	{ 
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect('login'); }
	}

	function index()
	{
		// CHECK STATUS
		//----------------------------------------------------
		$this->player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));
		if( ($redirect = $this->checkRedirect()) !== FALSE ) {
			redirect($redirect);
		} 

		// FORM
		//----------------------------------------------------
		$this->form_validation->set_message('required', "%s has not been answered");
		$this->form_validation->set_rules(array(
            array(
                'field' => 'desktop_app',
                'label' => 'Question 1',
                'rules' => 'required'
            ),
            array(
                'field' => 'mobile_app',
                'label' => 'Question 2',
                'rules' => 'required'
            ),
            array(
                'field' => 'hdmi',
                'label' => 'Question 3',
                'rules' => 'required',
                'message' => 'please answer'
            )
        ));

        if($this-> form_validation-> run() !== FALSE)
        {
        	$data = array(
        		'playerID' => $this->session->userdata('playerID'),
        		'desktop_app' => $this->input->post('desktop_app'),
        		'mobile_app' => $this->input->post('mobile_app'),
        		'hdmi' => $this->input->post('hdmi'),
        		'datetime' => date("Y-m-d H:i:s")
        	);
        	$this->db->insert('qaFeedback' , $data);
            //redirect('logout');
        }

		// SMARTY
		//----------------------------------------------------
		$this->smarty->view('timeout/timeout');
	}

	########################################################################

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
}