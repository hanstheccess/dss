<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promethee extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table='data_promethee';
	}
	public function index()
	{	
		$data['page_title'] = "Proses - Promethee";
		$data['query'] = $this->m_crud->getAll($this->table);
		$data['countkrt'] = $this->m_crud->count('data_krt');
		$data['countalt'] = $this->m_crud->count('data_alt');
		$data['href'] = 'promethee';
		function getdata($data, $id=null){
			if ($id==null) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt][$row->id_krt] = $row->nilai;
				}
			} else if ($id==1) {
				foreach ($data->result() as $row) {
					$result[$row->id_krt][$row->id_alt1][$row->id_alt2] = $row->nilai;   
				}
			} else if ($id==2) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt1][$row->id_alt2] = $row->nilai;  
				}
			} else if ($id==3) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt] = $row->rank;
				}
			}
			
			return $result;
		}

		$this->load->view('parts/nav',$data);
		if (!empty($data['query']->result())) {
			$pre = $this->m_crud->getAll('data_pre');
			$P01 = $this->m_crud->getwhere($this->table,array('id_proses'=>'P01'));
			$P02 = $this->m_crud->getwhere($this->table,array('id_proses'=>'P02'));
			$P03 = $this->m_crud->getwhere($this->table,array('id_proses'=>'P03'));
			$P04 = $this->m_crud->getwhere($this->table,array('id_proses'=>'P04'));
			$P05 = $this->m_crud->getwhere($this->table,array('id_proses'=>'P05'));
			$rank = $this->m_crud->getwhere('data_rank',array('id_metode'=>2));
			$data['print'] = getdata($pre);
			$data['P01'] = getdata($P01,1);
			$data['P02'] = getdata($P02,1);
			$data['P03'] = getdata($P03,1);
			$data['P04'] = getdata($P04,2);
			$data['P05'] = getdata($P05,2);
			$data['rank'] = getdata($rank,3);

			$this->load->view('main/promethee.php',$data);
		}
		else {
			$this->load->view('errors/error_calculation');
		}
		$this->load->view('parts/foo');
	}
}
