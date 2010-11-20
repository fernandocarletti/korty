<?php 

function smarty_block_form_tag($params, $content, $template, &$repeat) {
	$request = Request::instance();
	
	if($request->action == 'new' && !isset($params['action'])) {
		$action = url::site($request->controller.'/create');
	}
	elseif($request->action == 'edit' && !isset($params['action'])) {
		$action = url::site($request->controller.'/update');
	}
	elseif(isset($params['action'])) {
		$action = $params['action'];
	}

	if(isset($action)) {
		$action = 'action="'.$action.'"';
	} else {
		$action = null;
	}
	
	$attributes = '';
	
	foreach($params as $key => $value) {
		if($key != 'action') {
			$attributes .= ' '.$key.'="'.$value.'" ';
		}
	}
	
	$form = "<form {$action} {$attributes}>";
	$form .= $content;
	$form .= "</form>";
	
	return $form;
}

?>