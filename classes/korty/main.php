<?php defined("SYSPATH") or die("No direct access allowed.");

if(!defined("DS")) {
	define("DS", DIRECTORY_SEPARATOR);
}

if(!defined("KORTYPATH")) {
	define("KORTYPATH", realpath(dirname(__FILE__).DS."..".DS."..").DS);
}

require_once(KORTYPATH.DS."libs".DS."Smarty.class.php");

class Korty_Main extends Smarty {

	public function __construct() {
		$config = kohana::config("korty");

		parent::__construct();
		
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

}
