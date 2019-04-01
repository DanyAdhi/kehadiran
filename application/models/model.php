<?php 

class Model extends CI_Model{


	public function get_all($table)
	{
		return $this->db->get($table);
	}

	public function get_by($table,$id, $where)
	{
		return $this->db->get_where($table, [$id=>$where]);
	}

	public function save($table,$data)
	{
		$this->db->insert($table, $data);
	}

	public function delete($table,$pk, $where)
	{
		$this->db->delete($table, [$pk=>$where]);
	}

	public function update($table, $id, $where, $data)
	{
		$this->db->update($table, $data ,[$id=>$where]);
	}

	public function reset_pass($table, $id, $where, $field)
	{
		$pass = '$2y$10$NuJpueDsXtO2jre2Dq5TXucFV8hEnOV4CLUnMAgvCpO5o2wIe6wOG';
		$data = [$field=>$pass];
		$this->db->update($table, $data, [$id=>$where]);
	}


	public function kehadidan()
	{
        $this->db->select('*');
        $this->db->from('kehadiran');
        $this->db->join('sub_ket','kehadiran.jenis_keterangan=sub_ket.id');
        $query = $this->db->get();

        return $query->result();
	}

	public function edit_kehadiran($id)
	{
		$this->db->select('*');
        $this->db->from('kehadiran');
        $this->db->where("id_kehadiran", $id);
        $this->db->join('sub_ket','kehadiran.jenis_keterangan=sub_ket.id');
        $query = $this->db->get();

        return $query->result();
	}
}
 ?>