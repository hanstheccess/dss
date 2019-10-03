<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table = 'data_krt';
	}
	public function index()
	{	
		$data['page_title'] = "Master Data - Kriteria";
		$data['query'] = $this->m_crud->getAll($this->table);
		$this->load->view('parts/nav',$data);
		$this->load->view('main/kriteria.php');
		$this->load->view('parts/foo');
	}
	public function create(){
		$new = array('nama_krt'=>$this->input->post('newKrt'));
		$this->m_crud->create($this->table, $new);
		redirect('kriteria');
	}
	public function delete(){
		$reset = $this->input->post('deleteKrt');
		$del = array('id_krt'=>$reset);
		$this->m_crud->delete($this->table, $del, $reset);
		redirect('kriteria');
	}
	public function edit(){
		$edit = array('id_krt' => $this->input->post('editKrt'));
		$data['page_title'] = "Edit - Kriteria";
		$data['query']= $this->m_crud->getwhere($this->table, $edit);
		$this->load->view('parts/nav',$data);
		$this->load->view('main/edit.php');
		$this->load->view('parts/foo');
	}
	public function doEdit(){
		$update = array(
			'id_krt'=>$this->input->post('idKrt'),
			'nama_krt'=>$this->input->post('namaKrt')
		);
		$this->m_crud->update($this->table, $update);
		redirect('kriteria');
	}
	public function editBobot(){
		$countkrt = $this->m_crud->count('data_krt');
		$query = $this->m_crud->getAll($this->table);
		$datakrt = $query->result_array();
		$update = array(
			'id_krt'=>$this->input->post('id'),
			'nama_krt'=>$this->input->post('nama'),
			'bobot_krt'=>$this->input->post('bobot')
		);

		$this->m_crud->update($this->table, $update);
		redirect('kriteria');
	}
}