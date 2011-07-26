<?php defined('SYSPATH') or die('No direct access allowed.');

function smarty_function_stylesheet($params, $template) {
	$stylesheet_tag = '<link rel="stylesheet" type="text/css"';

	if($params['less'])
	{
		$stylesheet_tag = '<link rel="stylesheet/less" type="text/css"';
		unset($params['less']);
	}
		
	foreach($params as $key => $value) {
		if(strtolower($key) == 'src') {
			$src = URL::base().'public/stylesheets/'.$params['src'];
			$stylesheet_tag .= " href=\"{$src}\" ";
		} else {
			$stylesheet_tag .= " {$key}=\"{$value}\" ";
		}
	}
	
	$stylesheet_tag .= '/>';
	
	return $stylesheet_tag;
}

?>