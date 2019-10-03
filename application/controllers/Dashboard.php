<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table = 'data_pre';
	}
	public function index()
	{	
		$data['page_title'] = "Dashboard";
		$data['query'] = $this->m_crud->getAll($this->table);
		$data['countkrt'] = $this->m_crud->count('data_krt');
		$data['countalt'] = $this->m_crud->count('data_alt');
		$this->load->view('parts/nav',$data);
		if (!empty($data['query']->result())) {
			$this->load->view('main/dashboard.php');
		}
		else {
			$this->load->view('errors/error_notset');
		}
		$this->load->view('parts/foo');
	}
}
