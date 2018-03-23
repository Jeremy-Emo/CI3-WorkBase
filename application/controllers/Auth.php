<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller {

	public function index()
	{
		$data = new stdClass();
		$data->title = "COUCOU";
		$this->template->render('welcome_message', $data);
	}

  public function login()
  {
    
  }

}
