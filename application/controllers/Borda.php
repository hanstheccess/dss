<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table='data_borda';
	}
	public function index()
	{	
		$data['page_title'] = "Proses - Borda";
		$data['query'] = $this->m_crud->getAll($this->table);
		$data['countkrt'] = $this->m_crud->count('data_krt');
		$data['countalt'] = $this->m_crud->count('data_alt');
		$data['countmetode'] = $this->m_crud->count('data_metode');
		$data['href'] = 'borda';
		function getdata($data, $id=null){
			if ($id==1) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt] = $row->rank;
				}
			} else if ($id==2) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt][$row->id_metode] = $row->rank;   
				}
			} else if ($id==3) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt] = $row->poin;   
				}
			}
			return $result;
		}
		$this->load->view('parts/nav',$data);
		if (!empty($data['query']->result())) {
			$sql1 = $this->m_crud->getAll('data_rank');
			$sql2 = $this->m_crud->getAll('data_borda');
			$alt = $data['countalt'];
			$data['poin'] = $alt+1;
			$data['rank'] = getdata($sql1,2);
			$data['rankborda'] = getdata($sql2,1);
			$data['poinborda'] = getdata($sql2,3);
			$this->load->view('main/borda.php',$data);
		}
		else {
			$this->load->view('errors/error_calculation');
		}
		$this->load->view('parts/foo');
	}
}
