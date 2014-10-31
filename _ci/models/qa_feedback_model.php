<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qa_feedback_model extends MY_Model
{
	protected $skip_validation = TRUE;
	protected $table = "qaFeedback";
    protected $primary_key = "id";
}