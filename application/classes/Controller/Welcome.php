<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller  {

	public function action_index()
	{
		HTTP::redirect('user/login');
	}

}