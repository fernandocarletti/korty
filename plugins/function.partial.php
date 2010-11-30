<?php

function smarty_function_partial($params, $template)
{
	if( ! isset($params['name']))
	{
		throw new Kohana_Exception('Missing name param.');
	}

	$request = Request::instance();
	
	$template_file_name = $request->controller.'/_'.$params['name'].'.tpl';
	
	if( ! $template->templateExists($template_file_name))
	{
		throw new Kohana_Exception('Partial not found.');
	}
	
	$template->display($template_file_name);
}