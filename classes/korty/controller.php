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
		// Get session instance to manage template render status.
		$session = Session::instance();

		// Execute template autoloading
		if(kohana::$config->load("korty.template_autoload"))
		{ 
			// Retrieve the list of controllers or actions to ignore the autoload execution
			$ignored_list = kohana::$config->load('korty.ignore_autoload');
			$ignore_autoload = $session->get('_korty_disable_autorender');
			
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
				
				// If the ignored item has been found, leave the loop
				if($ignore_autoload)
				{
					break;
				}
			}
			
			// If this action shouldn't be ignored, do the load
			if( ! $ignore_autoload)
			{
				// The layout organization format
				$template_file = $this->request->controller().'/'.$this->request->action().'.tpl';
				
				// Load only if template exists
				if($this->korty->templateExists($template_file))
				{
					$session = Session::instance();
					$session->set('_korty_template_file', $template_file);
					$this->korty->render($template_file);
				}
				
				// If some template was loaded before by korty::render(), we don't need to warn about missing template =]
				if( ! $session->get('_korty_rendered'))
				{
					$message = "Template for {$this->request->controller()}#{$this->request->action()} not found!\n"
					         . "Did you forgot to create the {$template_file} file?";
				
					throw new Kohana_Exception($message);
				}
			}
		}
				
		$session->delete('_korty_rendered');
		$session->delete('_korty_disable_autorender');
	}
}
