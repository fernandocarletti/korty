<?php
/**
 * 
 * Include a partial file.
 * 
 * @param array $params
 * @param Smarty	 $template
 */
function smarty_function_partial($params, $template)
{
	// Name attribute is required
	if( ! isset($params['name']))
	{
		throw new Kohana_Exception('Missing name param.');
	}

	$request = Request::instance();
	
	// By convention, the partial is located in controller view folder, and
	// it's file name starts with an underscore (_)
	$template_file_name = $request->controller.'/_'.$params['name'].'.tpl';
	
	// A partial must exists if it's called
	if( ! $template->templateExists($template_file_name))
	{
		throw new Kohana_Exception('Partial not found.');
	}
	
	// Show the whole thing ;D
	$template->display($template_file_name);
}