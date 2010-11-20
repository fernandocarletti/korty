<?php defined('SYSPATH') or die('No direct access allowed.');

return array (

	'template_dir'					=> APPPATH.DS.'view',
	'compile_dir'					=> APPPATH.DS.'cache',
	'config_dir'					=> APPPATH.DS.'config',
	'plugins_dir'					=> KORTYPATH.DS.'libs'.DS.'plugins',
	'debugging'						=> false,
	'debug_tpl'						=> null,
	'debugging_ctrl'				=> 'NONE',
	'auto_literal'					=> true,
	'autoload_filters'				=> array(),
	'compile_check'					=> true,
	'force_compile'					=> false,
	'caching'						=> false,
	'cache_id'						=> null,
	'cache_dir'						=> null,
	'cache_lifetime'				=> 3600,
	'cache_handler_func'			=> null,
	'cache_modified_check'			=> false,
	'config_overwrite'				=> true,
	'config_booleanize'				=> true,
	'config_read_hidden'			=> true,
	'config_fix_newlines'			=> null,
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
