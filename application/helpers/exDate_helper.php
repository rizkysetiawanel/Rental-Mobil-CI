<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
 * This helper for convert normal number to RP
 *
 *
 */

if ( ! function_exists('exDate'))
{
	function exDate($var = '')
	{
		$date = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$explode_var = explode("-", $var);
		return $explode_var[2]." ".$date[$explode_var[1] - 1]." ".$explode_var[0];
	}
}

if ( ! function_exists('dDate'))
{
	function dDate($var = '')
	{
		$explode_var = explode("-", $var);
		return $explode_var[2]."-".$explode_var[1]."-".$explode_var[0];
	}
}