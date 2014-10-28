<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_log_model extends MY_Model
{
	protected $table = "sessionLog";
    protected $primary_key = "SID";
	protected $skip_validation = TRUE;
    
	#######################################################################
}