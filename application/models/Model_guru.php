<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru extends CI_Model
{

    public function dataGuru()
    {
        $sql = "SELECT * FROM `a_guru`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataGuruTKJ()
    {
        $sql = "SELECT * FROM `a_guru`
                WHERE jenis_guru='TKJ' OR jenis_guru='UMUM';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataGuruAKL()
    {
        $sql = "SELECT * FROM `a_guru`
                WHERE jenis_guru='AKL' OR jenis_guru='UMUM'
                ORDER BY jenis_guru,id_guru ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function simpan($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('a_guru', $data);
        }
    }
}
