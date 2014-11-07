<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeout extends MY_Controller 
{ 
	function __construct()
	{ 
		parent::__construct();
		// if(!$this->isLoggedIn()) { redirect('login'); }
	}

	function index()
	{
		// CHECK STATUS
		//----------------------------------------------------
		$this->player = $this->session_model->get('playerID' , $this->session->userdata('playerID'));
		if( ($redirect = $this->checkRedirect()) !== FALSE ) {
			redirect($redirect);
		} 


		// feedback_questions
		//----------------------------------------------------
		$feedback_question = array();
		$this->form_validation->set_message('required', "required");
		foreach($this->db->from('feedback_question')->get()->result_array() as $row)
		{
			$feedback_question[$row['questionID']]= array(
				'question' => trim($row['question']),
				'option1' => trim($row['option1']),
				'option2' => trim($row['option2']),
				'option3' => trim($row['option3'])
			);

			$this->form_validation->set_rules($row['questionID'], $row['questionID'] , 'required' );
		}
		$this->smarty->assign('feedback_question', $feedback_question);

		if($this-> form_validation-> run() !== FALSE)
        {
        	$datetime = date("Y-m-d H:i:s");
        	$playerID = $this->session->userdata('playerID');
        	$playerID = 2;

        	foreach( $feedback_question as $questionID => $row) 
        	{
        		$qaBatchData[] = array(
        			'playerID' => $playerID,
        			'questionID' => $questionID,
        			'answer' => $this->input->post($questionID),
        			'datetime' => $datetime
        		);
        	}

        	if($this->input->post('comment')) 
        	{
        		$commentData = array(
        			'playerID' => $playerID,
        			'comment' => $this->input->post('comment'),
        			'datetime' => $datetime
        		);
        	}

        	$this->db->insert_batch('feedback_answer' , $qaBatchData);
        	$this->db->insert('feedback_comment' , $commentData);

        	$this->smarty->assign('feedback_recieved', true);
        }

		// FORM
		//----------------------------------------------------
		/*$this->form_validation->set_message('required', "%s has not been answered");
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
        }*/

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