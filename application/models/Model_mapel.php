<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_mapel extends CI_Model
{
    public function countMapel()
    {
        $sql = "SELECT COUNT(*) AS mapel FROM `a_mapel`;";
        $query = $this->db->query($sql);
        return $query->row()->mapel;
    }

    public function countMapelAKL()
    {
        $sql = "SELECT COUNT(*) AS mapel_akl FROM `cbtonline_course`
                WHERE format='singleactivity' AND fullname LIKE '%AKL%'";
        $query = $this->db->query($sql);
        return $query->row()->mapel_akl;
    }

    public function countMapelBDP()
    {
        $sql = "SELECT COUNT(*) AS mapel_bdp FROM `cbtonline_course`
                WHERE format='singleactivity' AND fullname LIKE '%BDP%'";
        $query = $this->db->query($sql);
        return $query->row()->mapel_bdp;
    }

    public function countMapelOTKP()
    {
        $sql = "SELECT COUNT(*) AS mapel_otkp FROM `cbtonline_course`
                WHERE format='singleactivity' AND fullname LIKE '%OTKP%'";
        $query = $this->db->query($sql);
        return $query->row()->mapel_otkp;
    }

    public function countMapelTKJ()
    {
        $sql = "SELECT COUNT(*) AS mapel_tkj FROM `cbtonline_course`
                WHERE format='singleactivity' AND fullname LIKE '%TKJ%'";
        $query = $this->db->query($sql);
        return $query->row()->mapel_tkj;
    }

    public function dataMapel()
    {
        $sql = "SELECT a_mapel.*,a_jurusan.jurusan AS nama_jurusan FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataMapelAKL()
    {
        $sql = "SELECT * FROM `cbtonline_course`
                WHERE format='singleactivity' AND fullname LIKE '%AKL%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataMapelBDP()
    {
        $sql = "SELECT * FROM `a_mapel` 
                WHERE a_mapel.nama_mapel LIKE '%bdp%'
                ORDER BY `nama_mapel`  ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataMapelOTKP()
    {
        $sql = "SELECT * FROM `cbtonline_course`
                WHERE format='singleactivity' AND fullname LIKE '%OTKP%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataMapelTKJ()
    {
        $sql = "SELECT a_mapel.*,a_jurusan.jurusan AS nama_jurusan FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='TKJ';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function simpan($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('a_mapel', $data);
        }
    }
}
