<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller 
{
	public function index()
	{
		echo site_url('hallo');
		$this->load->view('welcome_message');
	}

	public function test()
	{
		$this->smarty->view('test');
	}


	public function geoloc()
	{
		// $IP     = $this->webclient->getIP();
  //       $realIP = $this->webclient->getRealIP();
  //       $browser = $this->browser->getBrowser();
  //       $browserVer = $this->browser->getVersion();

		$basicInfo = array(
        	'IP'     => $this->webclient->getIP(),
	        'realIP' => $this->webclient->getRealIP(),
	        'browser' => $this->browser->getBrowser(),
	        'browserVer' => $this->browser->getVersion()
        );
        //-----------------------------------
        $ip = false;
        $locationInfo = array();
        $geoloc = @json_decode(file_get_contents("http://freegeoip.net/json/{$ip}"));
        if( $geoloc != null ) {
        	$locationInfo = array(
        		'ip' => @$geoloc->ip,
        		'countryName' => @$geoloc->country_name,
	            'countryCode' => @$geoloc->country_code,
	            'regionName' => @$geoloc->region_name,
	            'regionCode' => @$geoloc->region_code,
	            'city' => @$geoloc->city,
	            'lat' => @$geoloc->latitude,
	            'lng' => @$geoloc->longitude
        	);
        }
        //-----------------------------------
        print_r( array_merge($basicInfo, $locationInfo) );
	}
}