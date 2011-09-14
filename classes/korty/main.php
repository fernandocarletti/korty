<?php defined("SYSPATH") or die("No direct access allowed.");

if( ! defined("DS")) {
	define("DS", DIRECTORY_SEPARATOR);
}

if( ! defined("KORTYPATH")) {
	define("KORTYPATH", realpath(dirname(__FILE__).DS."..".DS."..").DS);
}

// Include Smarty library
require_once(KORTYPATH.DS.'vendor'.DS.'smarty'.DS.'Smarty.class.php');

/**
 * Korty Main class.
 * 
 * @author Fernando Carl�tti
 *
 */
class Korty_Main extends Smarty {

	/**
	 * The constructor set the configuration of Smarty. 
	 */
	public function __construct()
	{
		parent::__construct();
		
		//Setting up all Smarty configuration settings on korty config file.
		$config = kohana::config("korty");

		$this->template_dir = $config['template_dir'];
		$this->compile_dir = $config['compile_dir'];
		$this->config_dir = $config['config_dir'];
		$this->plugins_dir = $config['plugins_dir'];
		$this->debugging = $config['debugging'];
		$this->debug_tpl = $config['debug_tpl'];
		$this->debugging_ctrl = $config['debugging_ctrl'];
		$this->auto_literal = $config['auto_literal'];
		$this->autoload_filters = $config['autoload_filters'];
		$this->compile_check = $config['compile_check'];
		$this->force_compile = $config['force_compile'];
		$this->caching = $config['caching'];
		$this->cache_id = $config['cache_id'];
		$this->cache_dir = $config['cache_dir'];
		$this->cache_lifetime = $config['cache_lifetime'];
		$this->cache_handler_func = $config['cache_handler_func'];
		$this->cache_modified_check = $config['cache_modified_check'];
		$this->config_overwrite = $config['config_overwrite'];
		$this->config_booleanize = $config['config_booleanize'];
		$this->config_read_hidden = $config['config_read_hidden'];
		$this->config_fix_newlines = $config['config_fix_newlines'];
		$this->default_template_handler_func = $config['default_template_handler_func'];
		$this->php_handling = $config['php_handling'];
		$this->trusted_dir = $config['trusted_dir'];
		$this->left_delimiter = $config['left_delimiter'];
		$this->right_delimiter = $config['right_delimiter'];
		$this->compiler_class = $config['compiler_class'];
		$this->request_vars_order = $config['request_vars_order'];
		$this->request_use_auto_globals = $config['request_use_auto_globals'];
		$this->compile_id = $config['compile_id'];
		$this->use_sub_dirs = $config['use_sub_dirs'];
		$this->default_modifiers = $config['default_modifiers'];
		$this->default_resource_type = $config['default_resource_type']; 
	}
	
	/**
	 * Assing Smarty template variables from an associative array
	 * 
	 * @param array $array
	 * @param bool $nocache
	 */
	public function assign_by_array(array $array, $nocache = false)
	{
		foreach($array as $key => $value)
		{
			$this->assign($key, $value, $value, $nocache);
		}
	}

	/**
	 * Render a template based on action name or template file name.
	 * 
	 * @param mixed $template
	 * @param string $cache_id
	 * @param string $compile_id
	 * @param string $parent
	 */
	public function render($template, $cache_id = null, $compile_id = null, $parent = null)
	{
		$session = Session::instance();
		$session->set('_korty_rendered', TRUE);
				
		// If its and array, we parse the controller and/or action indexes associations 
		if(is_array($template))
		{
			if(array_key_exists('controller', $template))
			{
				$controller = $template['controller'];
			}
			else
			{
				$controller = Request::current()->controller();
			}
			
			if(array_key_exists('action', $template))
			{
				$action = $template['action'];
			}
			
			$template = $controller.'/'.$action.'.tpl';
		}		
		// If it's an string ending with .tpl, we assume that it's the filename
		elseif(preg_match('/\.tpl$/', $template))
		{
			$template = $template;
		}
		// If the template don't end with .tpl and is not an array, we get the template by concatenating .tpl at the end of the string.
		else
		{
			$template = $template.'.tpl';
		}

		// If still not set...
		$controller = isset($controller) ? $controller : $controller = Request::current()->controller();
		
		$session->set('_korty_template_file', $template);
		
		// Is there a custom controller layout?
		if($this->templateExists("layouts/{$controller}.tpl"))
		{
			$layout = "layouts/{$controller}.tpl";
		}
		else
		{
			$layout = 'layouts/application.tpl';	
		}

		// Ok... Display it!
		$this->display($layout, $cache_id = null, $compile_id = null, $parent = null);
	}
	
	/**
	 * Disable the auto render feature.
	 */
	public function disable_autorender()
	{
		$session = Session::instance();
		$session->set('_korty_disable_autorender', TRUE);
	}

	/**
	 * Enable the auto render feature.
	 */
	public function enable_autorender()
	{
		$session = Session::instance();
		$session->set('_korty_disable_autorender', FALSE);
	}

	/**
	 * Write the flash message to show with flash smarty block.
	 *
	 * @param $id string the flash message identifier
	 * @param $message string the message
	 */
	public function flash($id, $message)
	{
		Session::instance()->set("_korty_flash_{$id}", $message);
	}

}
