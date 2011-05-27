<?php 

function smarty_function_yield($params, $template) {
	$session = Session::instance();
	$template->display($session->get('korty_template_file'));
}

?>