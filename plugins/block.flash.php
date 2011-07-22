<?php 
/**
 * Handle flash messages inside templates..
 * 
 * @param array $params
 * @param string $content
 * @param string $template
 * @param string $repeat
 */
function smarty_block_flash($params, $content, $template, &$repeat)
{
	$session = Session::instance();
	$str = null;

	if( ! is_null($session->get("_korty_flash_{$params['id']}")))
	{
		$str = str_ireplace('#message#', $session->get("_korty_flash_{$params['id']}"), $content);
		$session->delete("flash_{$params['id']}");
	}

	return $str;
}

?>