<?php 

function smarty_function_textfield($params, $template) {
	
	if( ! isset($params['to'])) 
	{
		throw new Kohana_Exception('You must specify the entity attribute.');
	}
	
	$text = '<input type="text" value="'.$params['to'].'" />';
	
	return $text;
}

?>