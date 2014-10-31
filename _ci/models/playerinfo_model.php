<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playerinfo_model extends MY_Model
{
	protected $skip_validation = TRUE;
	protected $table = "playerInfo";
    protected $primary_key = "playerID";
    protected $fields = array("playerID","createDate","IP","realIP","browser","browserVer","countryName","countryCode","regionName","regionCode","city","lat","lng");

	#######################################################################
	#######################################################################
}