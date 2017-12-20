<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
 * This helper for convert normal number to RP
 *
 *
 */

if ( ! function_exists('title_web'))
{
	function title_web()
	{
    	// Get a reference to the controller object
    	$CI = get_instance();

    	// You may need to load the model if it hasn't been pre-loaded
    	$CI->load->model('admin/msetting');

    	// Call a function of the model
    	$result = $CI->msetting->load_data_ws();

		foreach ($result as $res) {
			$title = $res->name_ws;
		}

		return $title;
	}
}

if ( ! function_exists('slogan_web'))
{
	function slogan_web()
	{
    	// Get a reference to the controller object
    	$CI = get_instance();

    	// You may need to load the model if it hasn't been pre-loaded
    	$CI->load->model('admin/msetting');

    	// Call a function of the model
    	$result = $CI->msetting->load_data_ws();

		foreach ($result as $res) {
			$slogan = $res->slogan_ws;
		}

		return $slogan;
	}
}