<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculate extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_crud');
	}
	public function index()
	{	
        $this->preprocessing();
        $data['page_title'] = "Dashboard";
        $data['query'] = $this->m_crud->getAll('data_pre');
		$data['countkrt'] = $this->m_crud->count('data_krt');
        $data['countalt'] = $this->m_crud->count('data_alt');
        redirect('/');
    }
    public function resetdata(){
        $this->m_crud->reset();
    }
    public function preprocessing()
    {
        $countkrt = $this->m_crud->count('data_krt');
        $countalt = $this->m_crud->count('data_alt');
        $countrtg = $this->m_crud->count('data_rtg');
        $query = $this->m_crud->getAll('data_rtg');
        $rating = $query->result_array();
        
        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countkrt ; $j++) { 
                $pre[$i][$j] = 0;
            }
        }
        
        $j = 1; $k = 1; $c = 0;
        for ($i=0; $i < $countrtg; $i++) { 
            if ($rating[$i]['id_alt'] == $j and $rating[$i]['id_krt'] == $k) {
                $pre[$j][$k] += $rating[$i]['nilai_rtg'];
                if ($rating[$i]['id_alt']==1) {
                    $c++;
                }
            }
            
            if ($i+1==$countrtg and $k==$countkrt and $j <$countalt){
                $j++; $k = 1; $i = 1;
            }
            else if ($i+1==$countrtg and $k < $countkrt) {
                $k++;
                $i=0;
            }
        }
        $c = $c/$countkrt;
        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countkrt ; $j++) { 
                $pre[$i][$j] = $pre[$i][$j]/$c;
            }
        }
        for ($j=1; $j <= $countalt; $j++) {
            for ($k=1; $k <= $countkrt; $k++) { 
                $this->m_crud->create('data_pre',array('id_alt'=>$j,'id_krt'=>$k,'nilai'=>$pre[$j][$k]));
            } 
        }
    }
    public function topsis(){
        $countkrt = $this->m_crud->count('data_krt');
        $countalt = $this->m_crud->count('data_alt');
        $countpre = $this->m_crud->count('data_pre');
        $query = $this->m_crud->getAll('data_pre');
        $q = $query->result_array();
        $this->db->select('bobot_krt');
        $query = $this->m_crud->getAll('data_krt');
        $bobot = $query->result_array();

        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countkrt ; $j++) { 
                $pre[$i][$j] = 0;
                $nor[$i][$j] = 0;
                $norbot[$i][$j] = 0;
                $jarsip[$i][$j] = 0;
                $jarsin[$i][$j] = 0;
            }
        }

        for ($i=1; $i <= $countkrt; $i++) { 
            $sqrt[$i] = 0;
            $sip[$i] = 0;
            $sin[$i] = 0;
        }

        for ($i=1; $i <= $countalt; $i++) { 
            $jaraksin[$i] = 0;
            $jaraksip[$i] = 0;
            $preferensi[$i] = 0;
        }

        $k = 1; $j = 1;

        //PREPROCESSING DATA - TOPSIS [T00]
        for ($i=0; $i < $countpre; $i++) { 
            if ($q[$i]['id_alt']==$j and $q[$i]['id_krt']==$k) {
                $pre[$j][$k] += $q[$i]['nilai'];
                $sqrt[$k] += pow($q[$i]['nilai'],2);
            }
            if ($i+1==$countpre and $k==$countkrt and $j <$countalt){
                $j++; $k = 1; $i = 1;
            }
            else if ($i+1==$countpre and $k < $countkrt) {
                $k++;
                $i=0;
            }
        }
        
        for ($i=1; $i <= $countkrt; $i++) { 
            $sqrt[$i] = sqrt($sqrt[$i]);
        }

        //NORMALISASI - TOPSIS [T01]
        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countkrt ; $j++) { 
                $nor[$i][$j] = $pre[$i][$j]/$sqrt[$j];
                $this->m_crud->create('data_topsis',array('id_proses'=>'T01','id_alt'=>$i,'id_krt'=>$j,'nilai'=>$nor[$i][$j]));
            }
        }

        //NORMALISASI TERBOBOT - TOPSIS [T02]
        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countkrt ; $j++) { 
                $k = $j;
                $k = $k-1;
                $norbot[$i][$j] = $nor[$i][$j]*$bobot[$k]['bobot_krt'];
                $this->m_crud->create('data_topsis',array('id_proses'=>'T02','id_alt'=>$i,'id_krt'=>$j,'nilai'=>$norbot[$i][$j]));
            }
        }
        
        //SOLUSI IDEAL POSITIF DAN NEGATIF - TOPSIS [T03]
        for ($i=1; $i <= $countkrt; $i++) { 
            $sip[$i] = max(array_column($norbot, $i)); //T03SIP
            $this->m_crud->create('data_topsis',array('id_proses'=>'T03SIP','id_alt'=>0,'id_krt'=>$i,'nilai'=>$sip[$i]));
            $sin[$i] = min(array_column($norbot, $i)); //T03SIN
            $this->m_crud->create('data_topsis',array('id_proses'=>'T03SIN','id_alt'=>0,'id_krt'=>$i,'nilai'=>$sin[$i]));
        }

        //JARAK KRITERIA SOLUSI IDEAL POSITIF DAN NEGATIF - TOPSIS [T04]
        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countkrt ; $j++) { 
                $jarsip[$i][$j] = pow(($norbot[$i][$j]-$sip[$j]),2);
                $this->m_crud->create('data_topsis',array('id_proses'=>'T04JKP','id_alt'=>$i,'id_krt'=>$j,'nilai'=>$jarsip[$i][$j]));
                $jarsin[$i][$j] = pow(($norbot[$i][$j]-$sin[$j]),2);
                $this->m_crud->create('data_topsis',array('id_proses'=>'T04JKN','id_alt'=>$i,'id_krt'=>$j,'nilai'=>$jarsin[$i][$j]));
            }
        }

        //JARAK SOLUSI IDEAL POSITIF DAN NEGATIF - TOPSIS [T05]
        $a = 1;

        for ($i=1; $i <= $countkrt; $i++) { 
            $jaraksip[$a] += $jarsip[$a][$i];
            $jaraksin[$a] += $jarsin[$a][$i];
            if ($a < $countalt and $i == $countkrt) {
                $a++;
                $i = 0;
            }
        }

        for ($i=1; $i <= $countalt; $i++) { 
            $this->m_crud->create('data_topsis',array('id_proses'=>'T05JSP','id_alt'=>$i,'id_krt'=>0,'nilai'=>$jaraksip[$i]));
            $this->m_crud->create('data_topsis',array('id_proses'=>'T05JSN','id_alt'=>$i,'id_krt'=>0,'nilai'=>$jaraksin[$i]));
        }

        // NILAI PREFERENSI
        for ($i=1; $i <= $countalt; $i++) { 
            $preferensi[$i] = $jaraksin[$i]/($jaraksin[$i]+$jaraksip[$i]);
            $this->m_crud->create('data_topsis',array('id_proses'=>'T06','id_alt'=>$i,'id_krt'=>0,'nilai'=>$preferensi[$i]));
        }

        function rank($data){
			$sorted_data = $data;
			rsort($sorted_data);
			foreach ($data as $key => $value) {
				foreach ($sorted_data as $sorted_key => $sorted_value) {
					if ($value==$sorted_value) {
						$val = $sorted_key+1;
						$result[$key] = $val;
					}
				}
			}
			return $result;
        }
        
        $res = $preferensi;
        $result = rank($res);

        for ($i=1; $i <=$countalt ; $i++) { 
            $this->m_crud->create('data_rank',array('id_metode'=>1,'id_alt'=>$i,'rank'=>$result[$i]));
        }

        redirect('topsis');

    }

    public function promethee(){
        $countkrt = $this->m_crud->count('data_krt');
        $countalt = $this->m_crud->count('data_alt');
        $countpre = $this->m_crud->count('data_pre');
        $query = $this->m_crud->getAll('data_pre');
        $q = $query->result_array();
        $this->db->select('bobot_krt');
        $query = $this->m_crud->getAll('data_krt');
        $bobot = $query->result_array();

        $a = $countalt;
        $loop = $a * ($a-1);

        
        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countkrt ; $j++) { 
                $pre[$i][$j] = 0;
            }
        }

        for ($i=1; $i <= $countalt; $i++) { 
            for ($j=1; $j <= $countalt ; $j++) { 
                $mip[$i][$j] = 0;
            }
        }

        for ($i=1; $i <= $countkrt; $i++) { 
            $sqrt[$i] = 0;
            $krt[$i] = $i;
        }

        for ($i=1; $i <= $countalt; $i++) { 
            $alt[$i] = $i;
            $hasilakhir[$i]['leavingflow'] = 0;
            $hasilakhir[$i]['enteringflow'] = 0;
            $hasilakhir[$i]['netflow'] = 0;
            $hasilakhir[$i]['rank'] = 0;
        }

        $k = 1; $j = 1;

        //PREPROCESSING DATA - PROMETHEE [P00]
        for ($i=0; $i < $countpre; $i++) { 
            if ($q[$i]['id_alt']==$j and $q[$i]['id_krt']==$k) {
                $pre[$j][$k] += $q[$i]['nilai'];
                $sqrt[$k] += pow($q[$i]['nilai'],2);
            }
            if ($i+1==$countpre and $k==$countkrt and $j <$countalt){
                $j++; $k = 1; $i = 1;
            }
            else if ($i+1==$countpre and $k < $countkrt) {
                $k++;
                $i=0;
            }
        }

        //PERBANDINGAN BERPASANGAN - PROMETHEE [P01]
        function transpose($array_one) {
            $array_two = [];
            foreach ($array_one as $key => $item) {
                foreach ($item as $subkey => $subitem) {
                    $array_two[$subkey][$key] = $subitem;
                }
            }
            return $array_two;
        }

        $tr = transpose($pre);
        $d = array();
        foreach ($alt as $cola) {
            foreach ($alt as $colb) {
                if ($cola!=$colb) {
                    foreach ($krt as $col) {
                        $d[$col][$cola][$colb] = $tr[$col][$cola]-$tr[$col][$colb];
                        $this->m_crud->create('data_promethee',array('id_proses'=>'P01','id_krt'=>$col,'id_alt1'=>$cola,'id_alt2'=>$colb,'nilai'=>$d[$col][$cola][$colb]));
                    }
                }
            }
        }

        //PREFERENSI - PROMETHEE [P02]
        function nilaipre($val){
            if ($val<=0) {
                return 0;
            }
            else {
                return 1;
            }
        }

        $p = array();
        foreach ($alt as $cola) {
            foreach ($alt as $colb) {
                if ($cola!=$colb) {
                    foreach ($krt as $col) {
                        $p[$col][$cola][$colb] = nilaipre($d[$col][$cola][$colb]);
                        $this->m_crud->create('data_promethee',array('id_proses'=>'P02','id_krt'=>$col,'id_alt1'=>$cola,'id_alt2'=>$colb,'nilai'=>$p[$col][$cola][$colb]));
                    }
                }
            }
        }


        //INDEKS PREFERENSI - PROMETHEE [P03]
        $sum = 0;
        for ($i=0; $i < $countkrt; $i++) { 
            $sum += $bobot[$i]['bobot_krt'];
        }

        $bobotnorm = array();
        for ($i=0; $i < $countkrt; $i++) { 
            $k = $i;
            $k += 1;
            $bobotnorm[$k] = $bobot[$i]['bobot_krt']/$sum;
        }

        $ip = array();
        foreach ($alt as $cola) {
            foreach ($alt as $colb) {
                if ($cola!=$colb) {
                    foreach ($krt as $col) {
                        $ip[$col][$cola][$colb] = $p[$col][$cola][$colb]*$bobotnorm[$col];
                        $this->m_crud->create('data_promethee',array('id_proses'=>'P03','id_krt'=>$col,'id_alt1'=>$cola,'id_alt2'=>$colb,'nilai'=>$ip[$col][$cola][$colb]));
                    }
                }
            }
        }

        //MATRIKS INDEKS PREFERENSI - PROMETHEE [P04]
        foreach ($alt as $cola) {
            foreach ($alt as $colb) {
                if ($cola!=$colb) {
                    foreach ($krt as $col) {
                        $mip[$cola][$colb] += $ip[$col][$cola][$colb];
                    }
                }
            }
        }
        
        for ($i=1; $i <=$countalt ; $i++) { 
            for ($j=1; $j <=$countalt ; $j++) { 
                $this->m_crud->create('data_promethee',array('id_proses'=>'P04','id_krt'=>0,'id_alt1'=>$i,'id_alt2'=>$j,'nilai'=>$mip[$i][$j]));
            }
        }
        

        //HASIL AKHIR - PROMETHEE [P05]
        $div = $countalt;
        $div -=1;
        foreach ($alt as $cola) {
            foreach ($alt as $colb) {
                if ($cola!=$colb) {
                    foreach ($alt as $col) {
                        if ($col==$cola) {
                            $hasilakhir[$col]['leavingflow'] += $mip[$col][$colb]/$div;
                        }
                        if ($col==$colb) {
                            $hasilakhir[$col]['enteringflow'] += $mip[$cola][$col]/$div;
                        }
                        $hasilakhir[$col]['netflow'] = ($hasilakhir[$col]['leavingflow']-$hasilakhir[$col]['enteringflow']);
                        $sort[$col] = $hasilakhir[$col]['netflow'];
                    }
                }
            }
        }

        for ($i=1; $i <=$countalt ; $i++) { 
            $this->m_crud->create('data_promethee',array('id_proses'=>'P05','id_krt'=>0,'id_alt1'=>$i,'id_alt2'=>1,'nilai'=>$hasilakhir[$i]['leavingflow']));
            $this->m_crud->create('data_promethee',array('id_proses'=>'P05','id_krt'=>0,'id_alt1'=>$i,'id_alt2'=>2,'nilai'=>$hasilakhir[$i]['enteringflow']));
            $this->m_crud->create('data_promethee',array('id_proses'=>'P05','id_krt'=>0,'id_alt1'=>$i,'id_alt2'=>3,'nilai'=>$hasilakhir[$i]['netflow']));
        }

        function rank($data){
			$sorted_data = $data;
			rsort($sorted_data);
			foreach ($data as $key => $value) {
				foreach ($sorted_data as $sorted_key => $sorted_value) {
					if ($value==$sorted_value) {
						$val = $sorted_key+1;
						$result[$key] = $val;
					}
				}
			}
			return $result;
        }
        
        $res = $sort;
        $result = rank($res);

        for ($i=1; $i <=$countalt ; $i++) { 
            $this->m_crud->create('data_rank',array('id_metode'=>2,'id_alt'=>$i,'rank'=>$result[$i]));
        }

        redirect('promethee');

    }
    public function borda(){
        $countalt = $this->m_crud->count('data_alt');
        $query = $this->m_crud->getAll('data_rank');
        for ($i=1; $i <=$countalt ; $i++) { 
            $result[1][$i] = 0;
        }
        foreach ($query->result_array() as $row) {
            $alt = $countalt;
            $p = $alt+1;
            $rank = $row['rank'];
            $nilai = $p-$rank;
            $result[1][$row['id_alt']] += $nilai;
        }
        
        function rank($data){
			$sorted_data = $data;
			rsort($sorted_data);
			foreach ($data as $key => $value) {
				foreach ($sorted_data as $sorted_key => $sorted_value) {
					if ($value==$sorted_value) {
						$val = $sorted_key+1;
						$result[$key] = $val;
					}
				}
			}
			return $result;
        }

        $res = $result[1];
        $rank = rank($res);

        for ($i=1; $i <=$countalt ; $i++) { 
            $result[2][$i] = $rank[$i];
        }

        echo "<pre>"; print_r($result); echo "</pre>";

        for ($i=1; $i <=$countalt ; $i++) { 
            $this->m_crud->create('data_borda',array(
                'id_alt'=>$i,
                'poin'=>$result[1][$i],
                'rank'=>$result[2][$i],
            ));
        }


        redirect('borda');
    }
}
