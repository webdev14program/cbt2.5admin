<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Dashboard_akl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model 
        $this->load->model('Model_jurusan');
    }

    public function index()
    {
        $isi['siswa'] = $this->Model_siswa->countAKL();
        $isi['kelas'] = $this->Model_kelas->countKelasAKL();
        $isi['mapel'] = $this->Model_mapel->countMapelAKL();
        $isi['bank_soal'] = $this->Model_bankSoal->countBankSoalAKL();
        $isi['content'] = 'AKL/tampilan_home';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }


    public function kelas()
    {
        $isi['kelas'] = $this->Model_kelas->dataKelasAKL();

        $isi['content'] = 'AKL/tampilan_kelas';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }

    public function guru()
    {
        $isi['guru'] = $this->Model_guru->dataGuruAKL();

        $isi['content'] = 'AKL/tampilan_guru';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }

    public function mata_pelajaran()
    {
        $isi['mapel'] = $this->Model_mapel->dataMapelAKL();

        $isi['content'] = 'AKL/tampilan_mata_pelajaran';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }

    public function peserta_ujian()
    {
        $isi['siswa'] = $this->Model_siswa->dataSiswaAKL();

        $isi['content'] = 'AKL/tampilan_siswa';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }



    public function bank_soal()
    {
        // Drob Down
        $isi['guru'] = $this->Model_guru->dataGuruAKL();
        $isi['mapel'] = $this->Model_mapel->dataMapelAKL();

        // List Data Bank Soal
        $isi['bankSoal'] = $this->Model_bankSoal->dataBankSoalAKL();

        $isi['content'] = 'AKL/bank_soal/tampilan_bank_soal';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }



    public function simpan_bank_soal()
    {
        $randIDmapel = rand(1000000, 9999999);
        $ujian = $this->input->post('ujian');
        $mapel = $this->input->post('mapel');
        $guru = $this->input->post('guru');

        $data = array(
            'id_bank_soal' => $randIDmapel,
            'id_mapel' => $mapel,
            'id_guru' => $guru,
            'nama_ujian' => $ujian,
            'status' => 'NON AKTIF'
        );

        $this->db->insert('bank_soal', $data);

        $this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Peserta Ujian Berhasil Di Tambah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard_akl/bank_soal');
    }

    public function detail_banksoal($id_bank_soal)
    {
        $isi['mapel'] = $this->Model_bankSoal->findByIDBankSoal($id_bank_soal);
        $isi['content'] = 'AKL/bank_soal/tampilan_detail_bank_soal';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }

    public function simpan_edit_bank_soal()
    {
        $id_mapel = $this->input->post('id_mapel');
        $id_guru = $this->input->post('id_guru');
        $status = $this->input->post('status');
        $ujian = $this->input->post('nama_ujian');

        $data = array(
            'id_mapel' => $id_mapel,
            'id_guru' => $id_guru,
            'nama_ujian' => $ujian,
            'status' => $status
        );

        $this->db->where('id_bank_soal', $this->input->post('id_bank_soal'));
        $this->db->update('bank_soal', $data);
        redirect('Dashboard_akl/bank_soal');
    }



    public function jadwal_ujian()
    {
        $isi['bank_soal'] = $this->Model_bankSoal->dataBankSoalAktifAKL();
        $isi['kelas'] = $this->Model_kelas->dataKelasAKL();
        $isi['content'] = 'AKL/Ujian/tampilan_jadwal_ujian';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }

    public function hapus_all_jadwal_ujian()
    {
        $this->db->empty_table('bank_soal');
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Bank Soal Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard/bank_soal');
    }

    public function akun_peserta()
    {

        $isi['akun_peserta'] = $this->Model_siswa->dataAkunPesertaAKL();

        $isi['content'] = 'AKL/Ujian/tampilan_akun_peserta';
        $this->load->view('AKL/templates/header');
        $this->load->view('AKL/tampilan_dashboard', $isi);
        $this->load->view('AKL/templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
