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

    public function countBankSoalAKL()
    {
        $sql = "SELECT COUNT(*) AS bank_soal_akl FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='AKL';";
        $query = $this->db->query($sql);
        return $query->row()->bank_soal_akl;
    }

    public function countBankSoalBDP()
    {
        $sql = "SELECT COUNT(*) AS bank_soal_bdp FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='BDP';";
        $query = $this->db->query($sql);
        return $query->row()->bank_soal_bdp;
    }

    public function countBankSoalOTKP()
    {
        $sql = "SELECT COUNT(*) AS bank_soal_otkp FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='OTKP';";
        $query = $this->db->query($sql);
        return $query->row()->bank_soal_otkp;
    }

    public function countBankSoalTKJ()
    {
        $sql = "SELECT COUNT(*) AS bank_soal_tkj FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='TKJ';";
        $query = $this->db->query($sql);
        return $query->row()->bank_soal_tkj;
    }

    public function countJadwalAKL()
    {
        $sql = "SELECT COUNT(*) AS jadwal_ujian FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                WHERE a_mapel.jurusan='AKL';";
        $query = $this->db->query($sql);
        return $query->row()->jadwal_ujian;
    }

    public function countJadwalBDP()
    {
        $sql = "SELECT COUNT(*) AS jadwal_ujian FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                WHERE a_mapel.jurusan='BDP';";
        $query = $this->db->query($sql);
        return $query->row()->jadwal_ujian;
    }



    public function countJadwalOTKP()
    {
        $sql = "SELECT COUNT(*) AS jadwal_ujian FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                WHERE a_mapel.jurusan='OTKP';";
        $query = $this->db->query($sql);
        return $query->row()->jadwal_ujian;
    }

    public function countJadwalTKJ()
    {
        $sql = "SELECT COUNT(*) AS jadwal_ujian FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                WHERE a_mapel.jurusan='TKJ';";
        $query = $this->db->query($sql);
        return $query->row()->jadwal_ujian;
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

    function dataBankSoalAKL()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_guru.nama_guru,a_mapel.nama_mapel,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                INNER JOIN a_guru
                ON a_guru.id_guru=bank_soal.id_guru
                WHERE a_mapel.jurusan='AKL';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBankSoalBDP()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_guru.nama_guru,a_mapel.nama_mapel,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                INNER JOIN a_guru
                ON a_guru.id_guru=bank_soal.id_guru
                WHERE a_mapel.jurusan='BDP';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBankSoalOTKP()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_guru.nama_guru,a_mapel.nama_mapel,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                INNER JOIN a_guru
                ON a_guru.id_guru=bank_soal.id_guru
                WHERE a_mapel.jurusan='OTKP';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBankSoalTKJ()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_guru.nama_guru,a_mapel.nama_mapel,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON a_mapel.id_mapel=bank_soal.id_mapel
                INNER JOIN a_guru
                ON a_guru.id_guru=bank_soal.id_guru
                WHERE a_mapel.jurusan='TKJ';";
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
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_mapel.nama_mapel,a_guru.nama_guru,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                WHERE bank_soal.status='AKTIF';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBankSoalAktifAKL()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_mapel.nama_mapel,a_guru.nama_guru,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='AKL';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBankSoalAktifBDP()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_mapel.nama_mapel,a_guru.nama_guru,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='BDP';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBankSoalAktifOTKP()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_mapel.nama_mapel,a_guru.nama_guru,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='OTKP';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dataBankSoalAktifTKJ()
    {
        $sql = "SELECT bank_soal.id_bank_soal,bank_soal.nama_ujian,a_mapel.nama_mapel,a_guru.nama_guru,bank_soal.status,bank_soal.time FROM `bank_soal`
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                WHERE bank_soal.status='AKTIF' AND a_mapel.jurusan='TKJ';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function header_bankSoal($id_bank_soal)
    {
        $sql = "SELECT bank_soal.id_bank_soal,a_guru.nama_guru,a_mapel.nama_mapel,bank_soal.nama_ujian FROM `soal`
                INNER JOIN bank_soal
                ON soal.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                WHERE bank_soal.id_bank_soal='$id_bank_soal'
                GROUP BY bank_soal.id_bank_soal;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    function dataSoal_bankSoal($id_bank_soal)
    {
        $sql = "SELECT soal.id_bank_soal,soal.soal,soal.pilA,soal.pilB,soal.pilC,soal.pilD,soal.pilE,soal.kunci FROM `soal`
                INNER JOIN bank_soal
                ON soal.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                WHERE bank_soal.id_bank_soal='$id_bank_soal';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function data_jadwalUjian()
    {
        $sql = "SELECT a_guru.nama_guru,a_mapel.nama_mapel, a_kelas.kelas,jadwal_ujian.tgl_awal,jadwal_ujian.waktu_mulai,jadwal_ujian.waktu_akhir,jadwal_ujian.durasi_ujian,
                concat(dayname(jadwal_ujian.tgl_awal),', ' ,day(jadwal_ujian.tgl_awal),' ',monthname(jadwal_ujian.tgl_awal),' ',year(jadwal_ujian.tgl_awal)) AS tanggal_ujian
                FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_kelas
                ON jadwal_ujian.id_kelas=a_kelas.id
                ORDER BY jadwal_ujian.tgl_awal ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function data_jadwalUjianAKL()
    {
        $sql = "SELECT jadwal_ujian.id_jadwal_ujian,a_guru.nama_guru,a_mapel.nama_mapel, a_kelas.kelas,jadwal_ujian.tgl_awal,jadwal_ujian.waktu_mulai,jadwal_ujian.waktu_akhir,jadwal_ujian.durasi_ujian,
                concat(dayname(jadwal_ujian.tgl_awal),', ' ,day(jadwal_ujian.tgl_awal),' ',monthname(jadwal_ujian.tgl_awal),' ',year(jadwal_ujian.tgl_awal)) AS tanggal_ujian
                FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_kelas
                ON jadwal_ujian.id_kelas=a_kelas.id
                WHERE a_kelas.kelas LIKE '%AKL%'
                ORDER BY jadwal_ujian.tgl_awal,jadwal_ujian.id_kelas ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function data_jadwalUjianBDP()
    {
        $sql = "SELECT jadwal_ujian.id_jadwal_ujian,a_guru.nama_guru,a_mapel.nama_mapel, a_kelas.kelas,jadwal_ujian.tgl_awal,jadwal_ujian.waktu_mulai,jadwal_ujian.waktu_akhir,jadwal_ujian.durasi_ujian,
                concat(dayname(jadwal_ujian.tgl_awal),', ' ,day(jadwal_ujian.tgl_awal),' ',monthname(jadwal_ujian.tgl_awal),' ',year(jadwal_ujian.tgl_awal)) AS tanggal_ujian
                FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_kelas
                ON jadwal_ujian.id_kelas=a_kelas.id
                WHERE a_kelas.kelas LIKE '%BDP%'
                ORDER BY jadwal_ujian.tgl_awal,jadwal_ujian.id_kelas ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function data_jadwalUjianOTKP()
    {
        $sql = "SELECT jadwal_ujian.id_jadwal_ujian,a_guru.nama_guru,a_mapel.nama_mapel, a_kelas.kelas,jadwal_ujian.tgl_awal,jadwal_ujian.waktu_mulai,jadwal_ujian.waktu_akhir,jadwal_ujian.durasi_ujian,
                concat(dayname(jadwal_ujian.tgl_awal),', ' ,day(jadwal_ujian.tgl_awal),' ',monthname(jadwal_ujian.tgl_awal),' ',year(jadwal_ujian.tgl_awal)) AS tanggal_ujian
                FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_kelas
                ON jadwal_ujian.id_kelas=a_kelas.id
                WHERE a_kelas.kelas LIKE '%OTKP%'
                ORDER BY jadwal_ujian.tgl_awal,jadwal_ujian.id_kelas ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function data_jadwalUjianTKJ()
    {
        $sql = "SELECT jadwal_ujian.id_jadwal_ujian,a_guru.nama_guru,a_mapel.nama_mapel, a_kelas.kelas,jadwal_ujian.tgl_awal,jadwal_ujian.waktu_mulai,jadwal_ujian.waktu_akhir,jadwal_ujian.durasi_ujian,
                concat(dayname(jadwal_ujian.tgl_awal),', ' ,day(jadwal_ujian.tgl_awal),' ',monthname(jadwal_ujian.tgl_awal),' ',year(jadwal_ujian.tgl_awal)) AS tanggal_ujian
                FROM `jadwal_ujian`
                INNER JOIN bank_soal
                ON jadwal_ujian.id_bank_soal=bank_soal.id_bank_soal
                INNER JOIN a_mapel
                ON bank_soal.id_mapel=a_mapel.id_mapel
                INNER JOIN a_guru
                ON bank_soal.id_guru=a_guru.id_guru
                INNER JOIN a_kelas
                ON jadwal_ujian.id_kelas=a_kelas.id
                WHERE a_kelas.kelas LIKE '%TKJ%'
                ORDER BY jadwal_ujian.tgl_awal,jadwal_ujian.id_kelas ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function simpan_soal($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('soal', $data);
        }
    }
}
