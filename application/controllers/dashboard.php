<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		var $section = 'Dashboard';

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk')!=TRUE){$url=base_url('login');redirect($url);};
		}

		public function index()
		{
			$data = ['content'=>'admin/dashboard',
					 'section'=>$this->section];
			$this->load->view('template/template', $data);
		}

	}
 ?>