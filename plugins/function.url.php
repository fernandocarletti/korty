<?php defined('SYSPATH') or die('No direct access allowed.');

function smarty_function_url($params, $template) {
	return url::site($params['to']);
}

?>