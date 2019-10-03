<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table = 'data_rtg';
	}
	public function index()
	{	
		$data['page_title'] = "Master Data - Rating";
		$data['query'] = $this->m_crud->getAll($this->table);
		$data['countkrt'] = $this->m_crud->count('data_krt');
		$this->load->view('parts/nav',$data);
		$this->load->view('main/rating.php');
		$this->load->view('parts/foo');
	}
	public function create(){
		$new = array('nama_rtg'=>$this->input->post('newRtg'));
		$this->m_crud->create($this->table, $new);
		redirect('rating');
	}
	public function edit(){
		$edit = array('id_rtg' => $this->input->post('editRtg'));
		$data['page_title'] = "Edit - Rating";
		$data['query']= $this->m_crud->getwhere($this->table, $edit);
		$this->load->view('parts/nav',$data);
		$this->load->view('main/edit.php');
		$this->load->view('parts/foo');
	}
	public function doEdit(){
		$update = array(
			'id_rtg'=>$this->input->post('idRtg'),
			'nama_rtg'=>$this->input->post('namaRtg')
		);
		$this->m_crud->update($this->table, $update);
		redirect('rating');
	}
}
