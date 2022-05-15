<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kelas extends CI_Model
{

    public function countKelas()
    {
        $sql = "SELECT COUNT(*) AS kelas FROM `a_kelas`";
        $query = $this->db->query($sql);
        return $query->row()->kelas;
    }

    public function countKelasAKL()
    {
        $sql = "SELECT count(*) AS akl FROM `a_kelas`
                WHERE kode='AKL';";
        $query = $this->db->query($sql);
        return $query->row()->akl;
    }

    public function countKelasBDP()
    {
        $sql = "SELECT count(*) AS bdp FROM `a_kelas`
                WHERE kode='BDP';";
        $query = $this->db->query($sql);
        return $query->row()->bdp;
    }

    public function countKelasOTKP()
    {
        $sql = "SELECT count(*) AS otkp FROM `a_kelas`
                WHERE kode='OTKP';";
        $query = $this->db->query($sql);
        return $query->row()->otkp;
    }

    public function dataKelas()
    {
        $sql = "SELECT *, a_kelas.id AS id_kelas FROM `a_kelas`
                INNER JOIN a_jurusan
                ON a_kelas.kode=a_jurusan.kode;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataKelasTKJ()
    {
        $sql = "SELECT *, a_kelas.id AS id_kelas FROM `a_kelas`
                INNER JOIN a_jurusan
                ON a_kelas.kode=a_jurusan.kode
                WHERE a_kelas.kelas LIKE '%tkj%';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataKelasAKL()
    {
        $sql = "SELECT *, a_kelas.id AS id_kelas FROM `a_kelas`
                INNER JOIN a_jurusan
                ON a_kelas.kode=a_jurusan.kode
                WHERE a_kelas.kelas LIKE '%AKL%';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataKelasBDP()
    {
        $sql = "SELECT *, a_kelas.id AS id_kelas FROM `a_kelas`
                INNER JOIN a_jurusan
                ON a_kelas.kode=a_jurusan.kode
                WHERE a_kelas.kelas LIKE '%BDP%';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataKelasOTKP()
    {
        $sql = "SELECT *, a_kelas.id AS id_kelas FROM `a_kelas`
                INNER JOIN a_jurusan
                ON a_kelas.kode=a_jurusan.kode
                WHERE a_kelas.kelas LIKE '%OTKP%';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function findByIDdataKelas($id_kelas)
    {
        $sql = "SELECT kelas.id AS id_kelas,kelas.*,jurusan.* FROM `kelas`
                INNER JOIN jurusan
                ON kelas.kode=jurusan.kode
                WHERE kelas.id='$id_kelas';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function simpan($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('a_kelas', $data);
        }
    }
}
