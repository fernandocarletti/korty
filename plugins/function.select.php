<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Build a select.
 * 
 * @param unknown_type $params
 * @param unknown_type $template
 * @throws Exception
 * @todo Add support for optgroup
 */
function smarty_function_select($params, $template)
{
	
	if( ! isset($params['id']))
	{
		throw new Exception('Id param needed for select.');
	}
	elseif( ! isset($params['options']) OR ! is_array($params['options']))
	{
		throw new Exception('Options array param is needed for select.');
	}

	$select = new Korty_Html('select');

	if( ! isset($params['name']))
	{
		$params['name'] = $params['id'];
	}

	$include_blank = true;

	if(isset($params['include_blank']) AND ! $params['include_blank'])
	{
		$include_blank = false;
	}

	if($include_blank)
	{
		$option = new Korty_Html('option');
		$select->append_content($option->build_tag());
	}
	
	foreach($params['options'] as $value => $content)
	{
		$selected = isset($_POST[$params['id']]) ? $_POST[$params['id']] : null;

		$option = new Korty_Html('option');
		$option->add_param('value', $value);

		if($value == $selected)
		{
			$option->add_param('selected', 'selected');
		}

		$option->set_content($content);
		$select->append_content($option->build_tag());
	}

	unset($params['options']);

	$select->add_params_from_array($params);

	return $select->build_tag();
}

?>