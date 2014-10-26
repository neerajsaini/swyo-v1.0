<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function getHostUrl()
{
	$url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
	$url .= '://'. $_SERVER['HTTP_HOST'].'/';
	return $url;
}

if( defined('PRITTY_URL_PREFIX') && PRITTY_URL_PREFIX )
{ 
	function site_url($uri = '')
	{
		$url = getHostUrl();
		$url .= PRITTY_URL_PREFIX ? PRITTY_URL_PREFIX.'/' : '';
		$url .= $uri;

		return $url;
	}
}


function vendor_url($uri='')
{
	$host = getHostUrl();
	$path = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', VENDOR_PATH),'/').'/';
	return $host.$path.$uri;
}
function images_url($uri='')
{
	$host = getHostUrl();
	$path = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', IMAGES_PATH),'/').'/';
	return $host.$path.$uri;
}
function videos_url($uri='')
{
	$host = getHostUrl();
	$path = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', VIDEOS_PATH),'/').'/';
	return $host.$path.$uri;
}



function assets_url($uri='')
{
	$host = getHostUrl();
	$path = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', ASSETS_PATH),'/').'/';
	return $host.$path.$uri;
}