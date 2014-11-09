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
		$basicInfo = $locationInfo = array();

		$basicInfo = array(
        	'IP'     => $this->webclient->getIP(),
	        'realIP' => $this->webclient->getRealIP(),
	        'browser' => $this->browser->getBrowser(),
	        'browserVer' => $this->browser->getVersion()
        );

        print_r( json_encode(array_merge($basicInfo, $locationInfo)) );

        exit();
        return array_merge($basicInfo, $locationInfo);
	}

	function getUserInfo()
	{
		$basicInfo = array(
        	'IP'     => $this->webclient->getIP(),
	        'realIP' => $this->webclient->getRealIP(),
	        'browser' => $this->browser->getBrowser(),
	        'browserVer' => $this->browser->getVersion()
        );
        //---------------------------------------------------
        $locationInfo = array();
       	// if( $basicInfo['IP'] != FALSE OR  $basicInfo['IP'] != NULL )
       	// {
       	// 	$ip = $basicInfo['IP'] ;
       	// 	$geoloc = @json_decode(file_get_contents("http://freegeoip.net/json/{$ip}"));
	       //  if( $geoloc != FALSE OR $geoloc != NULL )  {
	       //  	$locationInfo = array(
	       //  		'countryName' => @$geoloc->country_name,
		      //       'countryCode' => @$geoloc->country_code,
		      //       'regionName' => @$geoloc->region_name,
		      //       'regionCode' => @$geoloc->region_code,
		      //       'city' => @$geoloc->city,
		      //       'lat' => @$geoloc->latitude,
		      //       'lng' => @$geoloc->longitude
	       //  	);
	       //  }
       	// }
        
        
        //---------------------------------------------------
        return array_merge($basicInfo, $locationInfo);
	}

}