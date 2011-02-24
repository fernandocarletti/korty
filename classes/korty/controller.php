<?php defined('SYSPATH') or die('No direct access allowed.');

class Korty_Controller extends Kohana_Controller {
	
	/**
	 * Execute some actions before controller execution.
	 * 
	 */
	public function before()
	{
		// Create korty instance
		$this->korty = new Korty_Main();
	}
	
	/**
	 * Execute some actions after controller execution.
	 * 
	 * @throws Kohana_Exception
	 */
	public function after()
	{
		// Execute template autoloading
		if(kohana::config("korty.template_autoload"))
		{ 
			// Retrieve the list of controllers or actions to ignore the autoload execution
			$ignored_list = kohana::config('korty.ignore_autoload');
			$ignore_autoload = FALSE;
			
			// Loop ignored list
			foreach($ignored_list as $controller)
			{
				// If it's an array, loop this and ignore only some actions. If not, ignore whole controller
				if(is_array($controller))
				{
					foreach($controller as $controller_name => $action_name)
					{
						if($this->request->controller() == $controller_name AND $this->request->action() == $action_name) {
							$ignore_autoload = TRUE;
							break;
						}
					}
				}
				else
				{
					if($this->request->controller() == $controller) {
						$ignore_autoload = TRUE;
						break;
					}
				}
				
				// If the ignored item hass been found, leave the loop
				if($ignore_autoload)
				{
					break;
				}
			}
			
			// If this action shouldn't be ignored, do the load
			if( ! $ignore_autoload)
			{
				// The layout organization format
				$template = $this->request->controller().'/'.$this->request->action().'.tpl';
				
				// Load only if template exists
				if($this->korty->templateExists($template))
				{
					$this->korty->display($template);
					$this->request->korty_rendered = TRUE;
				}
				
				// If some template was loaded before by korty::render(), we don't need to warn about missing template =]
				if(!isset($this->request->korty_rendered))
				{
					$message = "Template for {$this->request->controller()}#{$this->request->action()} not found!\n"
					         . "Did you forgot to create the {$template} file?";
				
					throw new Kohana_Exception($message);
				}
			}
		}
	}
}
