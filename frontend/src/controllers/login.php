<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller 
{
	var $dbLoginData;

	function __construct()
	{
		parent::__construct();
		if($this->isLoggedIn()) { redirect('join'); }
	}

	//*********************************************************************

	function index()
	{
		$this-> form_validation->set_rules(array(
            array(
                'field' => 'playerName',
                'label' => 'Player Name',
                'rules' => 'trim|required|min_length[3]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|callback_authPlayerLogin'
            )
        ));

        if($this-> form_validation-> run() !== FALSE)
        {
            $this->session->set_userdata(array(
                'logged_in' => TRUE,
                'playerID' => $this->dbLoginData['playerID'],
                'playerName' => $this->dbLoginData['playerName'],
                'isPremium' => $this->dbLoginData['isPremium']
            ));

            redirect('join');
        }

		$this->smarty->view("login/login");
	}

	//*********************************************************************

	function authPlayerLogin($str)
    {
        $password = $this->input->post('password');
        $playerName = $this->input->post('playerName');
        $playerName = $this->sanitize->set($playerName)->remove_multispaces()->trim()->get();

        $this->dbLoginData = $this->player_model->getLoginData($playerName);

        if(count($this->dbLoginData) == 0 OR $this->dbLoginData['password'] != $password) {
            $this->form_validation->set_message(__FUNCTION__, 'Username or Password is incorrect');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    //*********************************************************************
}