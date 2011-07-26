<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Build a textarea.
 * 
 * @param mixed $params
 * @param mixed $template
 * @throws Exception
 */
function smarty_function_textarea($params, $template)
{
	
	if( ! isset($params['id']))
	{
		throw new Exception('Id param needed for textarea.');
	}

	$tag = new Korty_Html('textarea');

	if( ! isset($params['name']))
	{
		$params['name'] = $params['id'];
	}

	if(isset($_POST[$params['id']]) AND $_POST[$params['id']] != '')
	{
		$tag->set_content($_POST[$params['id']]);
	}

	$tag->add_params_from_array($params);

	return $tag->build_tag();
}

?>