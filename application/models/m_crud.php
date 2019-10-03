<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_crud extends CI_Model
{
    public function getAll($table)
    {
        return $this->db->get($table);
    }
    
    public function getwhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function count($table)
    {
        $query = $this->getAll($table);
        return $query->num_rows();

    }

    public function create($table, $alt)
    {
        $this->db->insert($table, $alt);
    }

    public function update($table, $data)
    {
        $this->db->replace($table,$data);
    }

    public function delete($table, $id, $reset)
    {
        $this->db->delete($table, $id);
        $this->db->query("ALTER TABLE `$table` AUTO_INCREMENT = $reset");
    }

    public function reset()
    {
        $this->db->empty_table('data_pre');
        $this->db->empty_table('data_topsis');
        $this->db->empty_table('data_promethee');
        $this->db->empty_table('data_borda');
        $this->db->empty_table('data_rank');
        redirect(base_url('dashboard'));
    }
}