<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table='data_cal';
	}
	public function index()
	{	
		$data['page_title'] = "Proses - Evaluasi";
		$data['query'] = $this->m_crud->getAll($this->table);
		$data['countkrt'] = $this->m_crud->count('data_krt');
		$data['countalt'] = $this->m_crud->count('data_alt');
		$this->load->view('parts/nav',$data);
		if (!empty($data['query']->result())) {
			$this->load->view('main/evaluasi.php');
		}
		else {
			$this->load->view('errors/error_calculation');
		}
		$this->load->view('parts/foo');
	}
}
