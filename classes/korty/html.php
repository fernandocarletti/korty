<?php defined('SYSPATH') or die('No direct access allowed.');

class Korty_Html {

	protected $tag     = null;
	protected $params  = array();
	protected $content = null;
	protected $force_close = false;
	
	public function __construct($tag, $force_close = true)
	{
		$this->tag = $tag;
		$this->force_close = $force_close;
	}

	public function add_param($param, $value)
	{
		$this->params[$param] = $value;
	}

	public function add_params_from_array(array $params)
	{
		$this->params = array_merge($this->params, $params);
	}

	public function set_content($value)
	{
		$this->content = $value;
	}

	public function append_content($value)
	{
		$this->content .= $value;
	}

	public function build_tag()
	{
		$html = "<{$this->tag}";

		foreach($this->params as $param => $value)
		{
			$html .= " {$param}=\"{$value}\"";
		}

		$html .= (isset($this->content) OR $this->force_close) ? ">{$this->content}</{$this->tag}>" : " />";

		return $html;
	}

}