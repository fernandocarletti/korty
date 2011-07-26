<?php defined('SYSPATH') or die('No direct access allowed.');

function smarty_block_link($params, $content, $template, &$repeat)
{
	$url = url::site($params["to"]);
	
	if($content == '')
	{
		$content = $url;
	}
	
	$url = '<a href="'.$url.'" ';
	
	foreach($params as $key => $value)
	{
		if($key == 'to')
		{
			continue;
		}
		
		$url .= $key.'="'.$value.'" ';
	}	
	
	$url .= '>'.$content.'</a>';
	
	return $url;
}
?>