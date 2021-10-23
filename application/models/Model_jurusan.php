<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jurusan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function countJurusan()
    {
        $sql = "SELECT COUNT(*) AS jurusan FROM `jurusan`";
        $query = $this->db->query($sql);
        return $query->row()->jurusan;
    }
    public function dataJurusan()
    {
        $sql = "SELECT * FROM `a_jurusan`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function simpan($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('a_jurusan', $data);
        }
    }
}
