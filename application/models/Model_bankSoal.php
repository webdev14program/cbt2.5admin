<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_bankSoal extends CI_Model
{
    public function dataBankSoal()
    {
        $sql = "SELECT * FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_kelas
                ON bank_soal.id_kelas=a_kelas.id  
                ORDER BY `a_kelas`.`kelas` ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataBankSoalrow()
    {
        $sql = "SELECT * FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_kelas
                ON bank_soal.id_kelas=a_kelas.id  
                ORDER BY `a_kelas`.`kelas` ASC;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
}
