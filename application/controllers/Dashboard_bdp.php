<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Dashboard_bdp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model 
        $this->load->model('Model_jurusan');
    }

    public function index()
    {
        $isi['siswa'] = $this->Model_siswa->countBDP();
        $isi['kelas'] = $this->Model_kelas->countKelasBDP();
        $isi['mapel'] = $this->Model_mapel->countMapelBDP();
        $isi['bank_soal'] = $this->Model_bankSoal->countBankSoalBDP();
        $isi['jadwal_ujian'] = $this->Model_bankSoal->countJadwalBDP();

        $isi['content'] = 'BDP/tampilan_home';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }


    public function kelas()
    {
        $isi['kelas'] = $this->Model_kelas->dataKelasBDP();

        $isi['content'] = 'BDP/tampilan_kelas';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }

    public function guru()
    {
        $isi['guru'] = $this->Model_guru->dataGuruBDP();

        $isi['content'] = 'BDP/tampilan_guru';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }

    public function mata_pelajaran()
    {
        $isi['mapel'] = $this->Model_mapel->dataMapelBDP();

        $isi['content'] = 'BDP/tampilan_mata_pelajaran';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }

    public function peserta_ujian()
    {
        $isi['siswa'] = $this->Model_siswa->dataSiswaBDP();

        $isi['content'] = 'BDP/tampilan_siswa';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }



    public function bank_soal()
    {
        // Drob Down
        $isi['guru'] = $this->Model_guru->dataGuruBDP();
        $isi['mapel'] = $this->Model_mapel->dataMapelBDP();

        // List Data Bank Soal
        $isi['bankSoal'] = $this->Model_bankSoal->dataBankSoalBDP();

        $isi['content'] = 'BDP/bank_soal/tampilan_bank_soal';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }

    public function detail_banksoal($id_bank_soal)
    {
        $isi['header'] = $this->Model_bankSoal->header_bankSoal($id_bank_soal);
        $isi['data_soal'] = $this->Model_bankSoal->dataSoal_bankSoal($id_bank_soal);
        $isi['content'] = 'BDP/bank_soal/tampilan_detail_bank_soal';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
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
        redirect('Dashboard_bdp/bank_soal');
    }

    public function upload_banksoal($id_bank_soal)
    {
        $isi['mapel'] = $this->Model_bankSoal->findByIDBankSoal($id_bank_soal);
        $isi['content'] = 'BDP/bank_soal/tampilan_upload_bank_soal';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }

    public function upload_soal()
    {
        $id_bank_soal = $this->input->post('id_bank_soal');
        $id_mapel = $this->input->post('id_mapel');
        $id_guru = $this->input->post('id_guru');
        $nama_ujian = $this->input->post('nama_ujian');

        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/';
            $config['allowed_types']    = 'xlsx|xls';
            $config['file_name']        = 'doc' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader();
                $reader->open('temp_doc/' . $file['file_name']);


                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
                    $save   = array();
                    foreach ($sheet->getRowIterator() as $row) {

                        if ($numRow > 1) {

                            $cells = $row->getCells();

                            $data = array(
                                'id_bank_soal'              => $id_bank_soal,
                                'soal'      => $cells[0],
                                'pilA'      => $cells[1],
                                'pilB'           => $cells[2],
                                'pilC'         => $cells[3],
                                'pilD'        => $cells[4],
                                'pilE'        => $cells[5],
                                'kunci'        => $cells[6],
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_bankSoal->simpan_soal($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);
                    $this->session->set_flashdata('info', '
                    <div class="row">
                <div class="col-md mt-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data Peserta Ujian Berhasil Di Tambah</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                </div>');

                    $edit_bank_soal = array(
                        'id_bank_soal' => $id_bank_soal,
                        'id_mapel' => $id_mapel,
                        'id_guru' => $id_guru,
                        'nama_ujian' => $nama_ujian,
                        'status' => 'AKTIF'
                    );

                    $this->db->where('id_bank_soal', $id_bank_soal);
                    $this->db->update('bank_soal', $edit_bank_soal);

                    redirect('Dashboard_bdp/bank_soal');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
    }

    public function hapus_bank_soal($id_bank_soal)
    {
        $this->db->where('id_bank_soal', $id_bank_soal);
        $this->db->delete('bank_soal');

        $this->db->where('id_bank_soal', $id_bank_soal);
        $this->db->delete('soal');

        // $this->session->set_flashdata('info', 'BANK DATA BERHASIL DI HAPUS DENGAN ID : ' . $id_bank_soal);
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>BANK DATA BANK SOAL BERHASIL DI HAPUS BERDASARKAN ID </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard_bdp/bank_soal');
    }


    public function jadwal_ujian()
    {
        $isi['bank_soal'] = $this->Model_bankSoal->dataBankSoalAktifBDP();
        $isi['kelas'] = $this->Model_kelas->dataKelasBDP();
        $isi['jadwal_ujian'] = $this->Model_bankSoal->data_jadwalUjianBDP();

        $isi['content'] = 'BDP/Ujian/tampilan_jadwal_ujian';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
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

    public function simpan_jadwal()
    {
        $id_jadwal_ujian = rand(111111, 999999);
        $id_bank_soal = $this->input->post('id_bank_soal');
        $id_kelas = $this->input->post('id_kelas');
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_akhir = $this->input->post('waktu_akhir');
        $durasi_ujian = $this->input->post('durasi_ujian');

        $data = array(
            'id_jadwal_ujian' => $id_jadwal_ujian,
            'id_bank_soal' => $id_bank_soal,
            'id_kelas' => $id_kelas,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'waktu_mulai' => $waktu_mulai,
            'waktu_akhir' => $waktu_akhir,
            'durasi_ujian' => $durasi_ujian
        );

        $this->db->insert('jadwal_ujian', $data);
        redirect('Dashboard_bdp/jadwal_ujian');
    }

    public function hapus_jadwal_ujian($id_jadwal_ujian)
    {
        $this->db->where('id_jadwal_ujian', $id_jadwal_ujian);
        $this->db->delete('jadwal_ujian');

        // $this->session->set_flashdata('info', 'BANK DATA BERHASIL DI HAPUS DENGAN ID : ' . $id_bank_soal);
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>BANK DATA JADWAL UJIAN BERHASIL DI HAPUS BERDASARKAN ID </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
        redirect('Dashboard_bdp/jadwal_ujian');
    }

    public function akun_peserta()
    {

        $isi['akun_peserta'] = $this->Model_siswa->dataAkunPesertaBDP();

        $isi['content'] = 'BDP/Ujian/tampilan_akun_peserta';
        $this->load->view('BDP/templates/header');
        $this->load->view('BDP/tampilan_dashboard', $isi);
        $this->load->view('BDP/templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
