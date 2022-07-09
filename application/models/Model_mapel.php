<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_mapel extends CI_Model
{
    public function countMapel()
    {
        $sql = "SELECT COUNT(*) AS mapel FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode";
        $query = $this->db->query($sql);
        return $query->row()->mapel;
    }

    public function countMapelAKL()
    {
        $sql = "SELECT COUNT(*) AS mapel_akl FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='AKL';";
        $query = $this->db->query($sql);
        return $query->row()->mapel_akl;
    }

    public function countMapelBDP()
    {
        $sql = "SELECT COUNT(*) AS mapel_bdp FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='BDP';";
        $query = $this->db->query($sql);
        return $query->row()->mapel_bdp;
    }

    public function countMapelOTKP()
    {
        $sql = "SELECT COUNT(*) AS mapel_otkp FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='OTKP';";
        $query = $this->db->query($sql);
        return $query->row()->mapel_otkp;
    }

    public function countMapelTKJ()
    {
        $sql = "SELECT COUNT(*) AS mapel_tkj FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='TKJ';";
        $query = $this->db->query($sql);
        return $query->row()->mapel_tkj;
    }

    public function dataMapel()
    {
        $sql = "SELECT a_mapel.*,a_jurusan.jurusan AS nama_jurusan FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode";
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

    public function dataMapelAKL()
    {
        $sql = "SELECT a_mapel.*,a_jurusan.jurusan AS nama_jurusan FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='AKL';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataMapelBDP()
    {
        $sql = "SELECT a_mapel.*,a_jurusan.jurusan AS nama_jurusan FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='BDP';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataMapelOTKP()
    {
        $sql = "SELECT a_mapel.*,a_jurusan.jurusan AS nama_jurusan FROM `a_mapel`
                INNER JOIN a_jurusan
                ON a_mapel.jurusan=a_jurusan.kode
                WHERE a_mapel.jurusan='OTKP';";
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
