<?php defined('SYSPATH') or die('No direct access allowed.');

return array (
	
	// Enable template autoload
	'template_autoload' => true,

	// Template autoload ignore list
	'ignore_autoload' => array(
		// 'index' => array(
		// 	'test'
		// ),
		// 'unittest',
		// 'userguide'
	),

	'template_dir'					=> APPPATH.'views',
	'compile_dir'					=> APPPATH.'cache',
	'config_dir'					=> APPPATH.'config',
	'plugins_dir'					=> array(APPPATH.'plugins', KORTYPATH.'plugins', KORTYPATH.'libs'.DS.'plugins', SMARTY_SYSPLUGINS_DIR),
	'debugging'						=> FALSE,
	'debug_tpl'						=> null,
	'debugging_ctrl'				=> 'NONE',
	'auto_literal'					=> TRUE,
	'autoload_filters'				=> array(),
	'compile_check'					=> TRUE,
	'force_compile'					=> FALSE,
	'caching'						=> FALSE,
	'cache_id'						=> null,
	'cache_dir'						=> null,
	'cache_lifetime'				=> 3600,
	'cache_handler_func'			=> null,
	'cache_modified_check'			=> FALSE,
	'config_overwrite'				=> TRUE,
	'config_booleanize'				=> TRUE,
	'config_read_hidden'			=> TRUE,
	'config_fix_newlines'			=> TRUE,
	'default_template_handler_func'	=> null,
	'php_handling'					=> Smarty::PHP_PASSTHRU,
	'trusted_dir'					=> array(),
	'left_delimiter'				=> '{',
	'right_delimiter'				=> '}',
	'compiler_class'				=> null,
	'request_vars_order'			=> null,
	'request_use_auto_globals'		=> null,
	'compile_id'					=> null,
	'use_sub_dirs'					=> null,
	'default_modifiers'				=> array(),
	'default_resource_type'			=> 'file', 



);
