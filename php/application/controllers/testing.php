<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testing extends CI_Controller {
	public function index()
	{
		$this->load->view('test message');
	}
}
