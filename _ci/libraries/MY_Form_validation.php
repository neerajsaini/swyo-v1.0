<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation 
{
	public function __construct()
    {
        parent::__construct();
    }

    #######################################################################


    function error_count()
    {
    	return count($this->_error_array);
    }


    #######################################################################
    ## DEBUG FUNCTIONS
    #######################################################################


    public function show_field_data()
	{
		echo "<pre>".print_r($this->_field_data, TRUE)."</pre>";
	}

    #######################################################################

	public function show_error_array()
	{
		echo "<pre>".print_r($this->_error_array, TRUE)."</pre>";
	}


    #######################################################################

}
