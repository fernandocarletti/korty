<?php 

function smarty_function_url($params, $template) {
	return url::site($params["to"]);
}

?>