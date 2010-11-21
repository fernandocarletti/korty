<?php defined('SYSPATH') or die('No direct access allowed.');

class Korty_Controller extends Kohana_Controller {
	public function before() {
		$this->korty = new Korty_Main();
	}
	
	public function after() {
		if(kohana::config("korty.templateAutoLoad")) {
			$template = $this->request->controller.'/'.$this->request->action.'.tpl';
			
			if($this->korty->templateExists($template)) {
				$this->korty->display($template);
				return;
			}
			
			
			$message = "Template for {$this->request->controller}#{$this->request->action} not found!\n";
			$message .= "Did you forgot to create the {$template} file?";
			
			throw new Kohana_Exception($message);
		}
	}
}
