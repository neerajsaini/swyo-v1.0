<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geolocation extends MY_Controller  
{
	function index($SID=0)
	{
		$SID = (int)$SID;
		$fetch = 0;
		$sessData = $this->get_ip_to_geolocate($SID);

		if($sessData != FALSE) {
			$fetch = 1;
		}

		$this->smarty->assign('sessData', $sessData);
		$this->smarty->assign('fetch', $fetch);
		$this->smarty->view('geolocation/geolocation');
	}


	function get_ip_to_geolocate($SID)
	{
		$result = $this->db->from('sessionLog')
			->limit(1)
			->select('SID,IP')
			->where('countryName IS NULL')
			->where('SID >', $SID)
			->get()->row_array();

		if(count($result)==0) {
			return FALSE;
		}
		else {
			return $result;
		}
	}


	function saveGeoData()
	{
		$SID = $this->input->post("SID");
		$geoData = $this->input->post("geoData");

		$updateData = array(
    		'countryName' => @$geoData['country_name'],
            'countryCode' => @$geoData['country_code'],
            'regionName' => @$geoData['region_name'],
            'regionCode' => @$geoData['region_code'],
            'city' => @$geoData['city'],
            'lat' => @$geoData['latitude'],
            'lng' => @$geoData['longitude']
    	);

    	$this->db->where('SID',$SID)->update("sessionLog",$updateData);
		
		echo json_encode($updateData);
	}

}