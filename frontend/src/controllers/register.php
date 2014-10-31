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
    	// FORM VALIDATION RULES
		//----------------------------------------------------
    	$this->form_validation->set_rules(array(
            array(
                'field' => 'playerName',
                'label' => 'Player Name',
                'rules' => 'trim|required|min_length[3]|callback_checkPlayerName'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|matches[confirmPassword]'
            ),
            array(
                'field' => 'confirmPassword',
                'label' => 'Confirm Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'captcha_code',
                'label' => 'code',
                'rules' => 'required|callback_check_captcha_code'
            )
        ));

        // ON FORM POST
		//----------------------------------------------------
        if ($this->form_validation->run() != FALSE) 
        {
        	$playerName = $this->input->post('playerName');
        	$playerName = $this->sanitize->set($playerName)->remove_multispaces()->trim()->get();

            $playerData = array(
                'playerName' => $playerName,
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email')
            );
            $playerID = $this->player_model->insert($playerData);


            $playerinfo = array_merge($this->getUserLocationInfo(), array(
            	'playerID' => $playerID ,
                'createDate' => date('Y-m-d H:i:s')
            ));
            $this->playerinfo_model->insert($playerinfo);


            $this->session->set_userdata(array(
                'logged_in' => TRUE,
                'playerID' => $playerID,
                'playerName' => $playerData['playerName']
            ));

            redirect('join');
        }
        
        // SMARTY
		//----------------------------------------------------
        $this->smarty->view('register/register');
    }
    
    #######################################################################


    public function check_captcha_code($str) 
    {
        $secureimage = new Securimage();

        if ($secureimage->check($str) == false) {
            $this->form_validation->set_message(__FUNCTION__, 'code is wrong');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function checkPlayerName($str)
    {
        $str = $this->sanitize->set($str)->remove_multispaces()->trim()->get();
        
        if ($this->player_model->playerNameExist($str)) {
            $this->form_validation->set_message(__FUNCTION__, 'This Player Name is already registered');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}