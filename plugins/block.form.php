<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Gernerate form tag.
 * 
 * @param array $params
 * @param string $content
 * @param string $template
 * @param string $repeat
 */
function smarty_block_form($params, $content, $template, &$repeat)
{
	// Auto id for forms. (I've no idea why it's incrementing 2 times per execution.
	static $ids;
	
	// Get the request instance. Here we can get the controller and the action in use.
	$request = Request::instance();
	
	// The form attributes will be here.
	$attributes = '';
	
	// If user set the action param...
	if(isset($params['action']))
	{
		// If it's and array, it should have two associative indexes: controller and action
		if(is_array($params['action']))
		{
			// If controller is not set, we use the current.
			if(isset($params['action']['controller'])) 
			{
				$controller = $params['action']['controller'];				
			}
			else
			{
				$controller = $request->controller;
			}
			
			// If action is not set, we use the current.
			if(isset($params['action']['action']))
			{
				$action = $params['action']['action'];
			}
			else
			{
				$action = $request->action;
			}
			
			// Set the target url.
			$target = url::site($controller.'/'.$action); 
		}
		
		// If the action param starts with http, it should be an url
		elseif(preg_match('/^http/D', $params['action']))
		{
			$target = $params['action'];
		}
		
		// Else, it shoud be <controller>/<action>/... format
		else
		{
			$target = url::site($params['action']);
		}
		
		// Set the action attribute.
		$attributes .= 'action="'.$target.'" ';
	}
	
	// Setting the auto id
	if( ! isset($params['id']))
	{
		$attributes .= 'id="form_'.($ids++).'" ';
	}
	
	// Join attributes from array
	foreach($params as $key => $value)
	{
		// Well... action is not needed, it has been set above
		if(strtolower($key) == 'action')
		{
			continue;
		}
		
		$attributes .= $key.'="'.$value.'" ';
	}
	
	// Put all together to make the tag
	$form = "<form {$attributes}>"
	      . $content
	      . "</form>";
	
	return $form;
}

?>