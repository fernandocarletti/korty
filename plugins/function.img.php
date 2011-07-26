<?php defined('SYSPATH') or die('No direct access allowed.');

function smarty_function_img($params, $template) {
	$image_tag = "<img";
		
	foreach($params as $key => $value) {
		if(strtolower($key) == "src") {
			$src = URL::base()."public/images/".$params["src"];
			$image_tag .= " src=\"{$src}\" ";
		} else {
			$image_tag .= " {$key}=\"{$value}\" ";
		}
	}
	
	$image_tag .= "/>";
	
	return $image_tag;
}

?>