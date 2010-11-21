<?php defined('SYSPATH') or die('No direct access allowed.');

return array (

	'templateAutoLoad' => true,

	'template_dir'					=> APPPATH.'views',
	'compile_dir'					=> APPPATH.'cache',
	'config_dir'					=> APPPATH.'config',
	'plugins_dir'					=> array(APPPATH."plugins", KORTYPATH."plugins", SMARTY_SYSPLUGINS_DIR),
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
