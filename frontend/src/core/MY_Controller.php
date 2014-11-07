<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->loadDatabase();
	}

	//*********************************************************************

	function loadDatabase()
	{
		$this->db = $this->load->database('default' , TRUE);
		$this->load->model(array( 'my_model'
			, 'system_param_model', 'counter_param_model' 
			, 'server_slot_model' , 'session_log_model' , 'session_status_log_model'
			, 'session_model' , 'qa_feedback_model'
			, 'player_model' , 'playerinfo_model'
		));
	}

	//*********************************************************************

	function isLoggedIn()
	{
		return ($this->session->userdata('logged_in') != FALSE AND $this->session->userdata('playerID') != FALSE) ? TRUE : FALSE ;
	}

	//*********************************************************************

	function setSystemParam()
	{
		$this->systemParam = $this->system_param_model->dropdown('key','val');
	}
	function setCounterParam()
	{
		$this->counterParam = $this->counter_param_model->dropdown('key','val');
	}

	//*********************************************************************

	function getUserLocationInfo($third_party=TRUE)
	{
		$basicInfo = array(
        	'IP'     => $this->webclient->getIP(),
	        'realIP' => $this->webclient->getRealIP(),
	        'browser' => $this->browser->getBrowser(),
	        'browserVer' => $this->browser->getVersion()
        );
        
		$locationInfo = array();

        if($third_party == TRUE)
        {
        	$geoloc = $this->webclient->third_party();

        	if($geoloc !==FALSE) 
        	{
	        	if ($basicInfo['IP'] == FALSE) $basicInfo['IP'] = @$geoloc->ip;
	        	if ($basicInfo['realIP'] == FALSE) $basicInfo['realIP'] = @$geoloc->ip;

	        	$locationInfo = array(
	        		'countryName' => @$geoloc->country_name,
		            'countryCode' => @$geoloc->country_code,
		            'regionName' => @$geoloc->region_name,
		            'regionCode' => @$geoloc->region_code,
		            'city' => @$geoloc->city,
		            'lat' => @$geoloc->latitude,
		            'lng' => @$geoloc->longitude
	        	);
	        }
        }

        return array_merge($basicInfo, $locationInfo);
	}

}