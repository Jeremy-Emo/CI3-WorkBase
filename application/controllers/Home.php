<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	public function index()
	{
		$data = new stdClass();
		$data->title = "COUCOU";
		$this->load->model('user_model');
		$data->test = $this->user_model->search('*', array('mail', 'a@a.fr'));
		$this->template->render('welcome_message', $data);
	}
}
