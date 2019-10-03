<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topsis extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->table='data_topsis';
	}
	public function index()
	{	
		$data['page_title'] = "Proses - Topsis";
		$data['query'] = $this->m_crud->getAll($this->table);
		$countkrt = $data['countkrt'] = $this->m_crud->count('data_krt');
		$countalt = $data['countalt'] = $this->m_crud->count('data_alt');
		$data['href'] = 'topsis';
		function getdata($data, $id=null, $bool=null){
			if ($id==null) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt][$row->id_krt] = $row->nilai;   
				}
			}
			else if($bool==1) {
				foreach ($data->result() as $row) {
					$result[$id][$row->id_alt] = $row->nilai;   
				}
			}
			else if($bool==2) {
				foreach ($data->result() as $row) {
					$result[$row->id_alt] = $row->nilai;   
				}
			}
			else if ($id==1 or $id==2) {
				foreach ($data->result() as $row) {
					$result[$id][$row->id_krt] = $row->nilai;   
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
			$T01 = $this->m_crud->getwhere($this->table,array('id_proses'=>'T01'));
			$T02 = $this->m_crud->getwhere($this->table,array('id_proses'=>'T02'));
			$T03SIP = $this->m_crud->getwhere($this->table,array('id_proses'=>'T03SIP'));
			$T03SIN = $this->m_crud->getwhere($this->table,array('id_proses'=>'T03SIN'));
			$T04JKP = $this->m_crud->getwhere($this->table,array('id_proses'=>'T04JKP'));
			$T04JKN = $this->m_crud->getwhere($this->table,array('id_proses'=>'T04JKN'));
			$T05JSP = $this->m_crud->getwhere($this->table,array('id_proses'=>'T05JSP'));
			$T05JSN = $this->m_crud->getwhere($this->table,array('id_proses'=>'T05JSN'));
			$T06 = $this->m_crud->getwhere($this->table,array('id_proses'=>'T06'));
			$rank = $this->m_crud->getwhere('data_rank',array('id_metode'=>1));
			$data['print'] = getdata($pre);
			$data['T01'] = getdata($T01);
			$data['T02'] = getdata($T02);
			$data['T03'] = getdata($T03SIP,1);
			$data['T03'] += getdata($T03SIN,2);
			$data['T04JKP'] = getdata($T04JKP);
			$data['T04JKN'] = getdata($T04JKN);
			$data['T05'] = getdata($T05JSP,1,1);
			$data['T05'] += getdata($T05JSN,2,1);
			$data['T06'] = getdata($T06,1,2);
			$data['rank'] = getdata($rank,3);

			
			
			$data['si'] = array(
				1=>'SI+',
				2=>'SI-',
			);
			$this->load->view('main/topsis.php',$data);
		}
		else {
			$this->load->view('errors/error_calculation',$data);
		}
		$this->load->view('parts/foo');
	}
}
