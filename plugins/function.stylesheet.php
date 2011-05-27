<?php 

function smarty_function_stylesheet($params, $template) {
	$stylesheet_tag = "<link rel=\"stylesheet\"";
		
	foreach($params as $key => $value) {
		if(strtolower($key) == "src") {
			$src = URL::base()."public/stylesheets/".$params["src"];
			$stylesheet_tag .= " href=\"{$src}\" ";
		} else {
			$stylesheet_tag .= " {$key}=\"{$value}\" ";
		}
	}
	
	$stylesheet_tag .= "/>";
	
	return $stylesheet_tag;
}

?>