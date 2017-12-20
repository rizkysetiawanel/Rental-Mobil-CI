<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
 * This helper for convert normal number to RP
 *
 *
 */

if ( ! function_exists('rpCurrency'))
{
	function rpCurrency($var = '')
	{
		return number_format($var, 0, '.', '.');
	}
}