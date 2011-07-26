<?php defined('SYSPATH') or die('No direct access allowed.');

function smarty_function_script($params, $template) {
	$script_tag = "<script type=\"text/javascript\"";
		
	foreach($params as $key => $value) {
		if(strtolower($key) == "src") {
			$src = URL::base()."public/javascripts/".$params["src"];
			$script_tag .= " src=\"{$src}\" ";
		} else {
			$script_tag .= " {$key}=\"{$value}\" ";
		}
	}
	
	$script_tag .= "></script>";
	
	return $script_tag;
}

?>