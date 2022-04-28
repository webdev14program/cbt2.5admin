<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_bankSoal extends CI_Model
{
    public function countBankSoal()
    {
        $sql = "SELECT COUNT(*) AS bank_soal FROM `bank_soal`
                WHERE bank_soal.status='AKTIF';";
        $query = $this->db->query($sql);
        return $query->row()->bank_soal;
    }

    function dataBankSoal()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_guru.nama_guru,a_mapel.nama_mapel,bank_soal.status,bank_soal.time FROM `bank_soal`
INNER JOIN a_mapel
ON a_mapel.id_mapel=bank_soal.id_mapel
INNER JOIN a_guru
ON a_guru.id_guru=bank_soal.id_guru;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function findByIDBankSoal($id_bank_soal)
    {
        $sql = "SELECT * FROM `bank_soal`
INNER JOIN a_mapel
ON a_mapel.id_mapel=bank_soal.id_mapel
INNER JOIN a_guru
ON a_guru.id_guru=bank_soal.id_guru
WHERE id_bank_soal='$id_bank_soal';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function dataBankSoalAktif()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_mapel.nama_mapel,a_kelas.kelas,bank_soal.status FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_kelas
                ON bank_soal.id_kelas=a_kelas.id
                WHERE bank_soal.status='AKTIF'
                ORDER BY `a_kelas`.`kelas` ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
