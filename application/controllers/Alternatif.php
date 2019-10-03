<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {
	
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table = 'data_alt';
	}
	public function index()
	{	
		$data['page_title'] = "Master Data - Alternatif";
		$data['query'] = $this->m_crud->getAll($this->table);
		$this->load->view('parts/nav',$data);
		$this->load->view('main/alternatif.php');
		$this->load->view('parts/foo');
	}
	public function create(){
		$new = array('nama_alt'=>$this->input->post('newAlt'));
		$this->m_crud->create($this->table, $new);
		redirect('alternatif');
	}
	public function delete(){
		$reset = $this->input->post('deleteAlt');
		$del = array('id_alt'=>$reset);
		$this->m_crud->delete($this->table, $del, $reset);
		redirect('alternatif');
	}
	public function edit(){
		$edit = array('id_alt' => $this->input->post('editAlt'));
		$data['page_title'] = "Edit - Alternatif";
		$data['query']= $this->m_crud->getwhere($this->table, $edit);
		$this->load->view('parts/nav',$data);
		$this->load->view('main/edit.php');
		$this->load->view('parts/foo');
	}
	public function doEdit(){
		$update = array(
			'id_alt'=>$this->input->post('idAlt'),
			'nama_alt'=>$this->input->post('namaAlt')
		);
		$this->m_crud->update($this->table, $update);
		redirect('alternatif');
	}
}