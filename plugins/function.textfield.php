<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Build a input of text type
 * 
 * @param unknown_type $params
 * @param unknown_type $template
 * @throws Exception
 */
function smarty_function_textfield($params, $template)
{
	
	if( ! isset($params['id']))
	{
		throw new Kohana_Exception('Id param needed for textfield.');
	}

	$tag = new Korty_Html('input');
	$tag->add_param('type', 'text');

	unset($params['type']);

	if( ! isset($params['name']))
	{
		$params['name'] = $params['id'];
	}

	if(isset($_POST[$params['id']]) AND $_POST[$params['id']] != '')
	{
		$params['value'] = $_POST[$params['id']];
	}

	$tag->add_params_from_array($params);

	return $tag->build_tag();
}

?>