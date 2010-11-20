<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller extends Kohana_Controller {
	public function before() {
		$this->korty = new Korty_Main();
	}
}
