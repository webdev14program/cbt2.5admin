<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $isi['siswa'] = $this->Model_siswa->countSiswa();
        $isi['kelas'] = $this->Model_kelas->countKelas();
        $isi['mapel'] = $this->Model_mapel->countMapel();
        $isi['content'] = 'tampilan_home';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function jurusan()
    {
        $isi['jurusan'] = $this->Model_jurusan->dataJurusan();

        $isi['content'] = 'tampilan_jurusan';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function kelas()
    {
        $isi['kelas'] = $this->Model_kelas->dataKelas();

        $isi['content'] = 'tampilan_kelas';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function mata_pelajaran()
    {
        $isi['mapel'] = $this->Model_mapel->dataMapel();

        $isi['content'] = 'tampilan_mata_pelajaran';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function peserta_ujian()
    {
        $isi['siswa'] = $this->Model_siswa->dataSiswa();

        $isi['content'] = 'tampilan_siswa';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function bank_soal()
    {
        $isi['bankSoal'] = $this->Model_bankSoal->dataBankSoal();
        $isi['bankSoal2'] = $this->Model_bankSoal->dataBankSoalrow();

        $isi['content'] = 'bank_soal/tampilan_bank_soal';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }
}
