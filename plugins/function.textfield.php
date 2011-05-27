<?php defined('SYSPATH') or die('No direct access allowed.');

require_once 'formhelper.php';

/**
 * 
 * Build a input of text type
 * 
 * @param unknown_type $params
 * @param unknown_type $template
 * @throws Kohana_Exception
 */
function smarty_function_textfield($params, $template)
{
	
	// The to attribute is required
	if( ! isset($params['to'])) 
	{
		throw new Kohana_Exception('You must specify the entity attribute.');
	}
	
	// Set needed attributes
	$params['type'] = 'text';
	
	// Copy the value to the right place.
	$params['value'] = $params['to'];
	
	// Remove the needless attribute
	unset($params['to']);
	
	// Builde the tag and return the content
	return build_html_tag('input', $params);
}

?>