<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model 
        $this->load->model('Model_jurusan');
    }

    public function index()
    {
        $isi['siswa'] = $this->Model_siswa->countSiswa();
        $isi['kelas'] = $this->Model_kelas->countKelas();
        $isi['mapel'] = $this->Model_mapel->countMapel();
        $isi['bank_soal'] = $this->Model_bankSoal->countBankSoal();
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



    public function upload_jurusan()
    {
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
                                'id'              => $cells[0],
                                'kode'     => $cells[1],
                                'jurusan'            => $cells[2]
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_jurusan->simpan($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);

                    $this->session->set_flashdata('pesan', 'Data Jurusan Berhasil Di Tambah');
                    redirect('Dashboard/jurusan');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
    }

    public function kelas()
    {
        $isi['kelas'] = $this->Model_kelas->dataKelas();

        $isi['content'] = 'tampilan_kelas';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_kelas()
    {
        $this->db->empty_table('a_kelas');
        $this->session->set_flashdata('pesan', 'Data Kelas Berhasil Di Hapus');
        redirect('Dashboard/kelas');
    }

    public function upload_kelas()
    {
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
                                'id'              => $cells[0],
                                'kode'     => $cells[1],
                                'kelas'            => $cells[2]
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_kelas->simpan($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);
                    $this->session->set_flashdata('pesan', 'Data Kelas Berhasil Di Tambah');
                    redirect('Dashboard/kelas');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
    }

    public function mata_pelajaran()
    {
        $isi['mapel'] = $this->Model_mapel->dataMapel();

        $isi['content'] = 'tampilan_mata_pelajaran';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_mapel()
    {
        $this->db->empty_table('a_mapel');
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Mapel Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>');
        redirect('Dashboard/mata_pelajaran');
    }

    public function upload_mapel()
    {
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
                                'id_mapel'              => $cells[0],
                                'nama_mapel'     => $cells[1],
                                'jurusan'            => $cells[2]
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_mapel->simpan($save);
                    $reader->close();
                    unlink('temp_doc/' . $file['file_name']);
                    $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Mapel Berhasil Di Tambah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>');
                    redirect('Dashboard/mata_pelajaran');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
    }

    public function peserta_ujian()
    {
        $isi['siswa'] = $this->Model_siswa->dataSiswa();

        $isi['content'] = 'tampilan_siswa';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_peserta_ujian()
    {
        $this->db->empty_table('a_siswa');
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Peserta Ujian Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>');
        redirect('Dashboard/peserta_ujian');
    }

    public function upload_peserta_ujian()
    {
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
                                'id'              => $cells[0],
                                'no_peserta'      => $cells[1],
                                'nama_siswa'      => $cells[2],
                                'kelas'           => $cells[3],
                                'jurusan'         => $cells[4],
                                'username'        => $cells[5],
                                'password'        => $cells[6],
                            );
                            array_push($save, $data);
                        }
                        $numRow++;
                    }
                    $this->Model_siswa->simpan($save);
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
                    redirect('Dashboard/peserta_ujian');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
    }

    public function bank_soal()
    {
        // Drob Down
        $isi['kelas'] = $this->Model_kelas->dataKelasTKJ();
        $isi['mapel'] = $this->Model_mapel->dataMapelTKJ();

        // List Data Bank Soal
        $isi['bankSoal'] = $this->Model_bankSoal->dataBankSoal();

        $isi['content'] = 'bank_soal/tampilan_bank_soal';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_bank_soal()
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

    public function simpan_bank_soal()
    {
        $randIDmapel = rand(1000000, 9999999);
        $ujian = $this->input->post('ujian');
        $mapel = $this->input->post('mapel');
        $kelas = $this->input->post('kelas');

        $data = array(
            'id_bank_soal' => $randIDmapel,
            'id_mapel' => $mapel,
            'id_kelas' => $kelas,
            'nama_ujian' => $ujian,
            'status' => 'non aktif'
        );

        $this->db->insert('bank_soal', $data);

        $this->session->set_flashdata('info', 'BANK DATA BERHASIL DI TAMBAH');
        redirect('Dashboard/bank_soal');
    }

    public function detail_banksoal($id_bank_soal)
    {
        $isi['mapel'] = $this->Model_bankSoal->findByIDBankSoal($id_bank_soal);
        $isi['content'] = 'bank_soal/tampilan_detail_bank_soal';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function simpan_edit_bank_soal()
    {
        $id_mapel = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('id_kelas');
        $status = $this->input->post('status');
        $ujian = $this->input->post('ujian');

        $data = array(
            'id_mapel' => $id_mapel,
            'id_kelas' => $id_kelas,
            'nama_ujian' => $ujian,
            'status' => $status
        );

        $this->db->where('id_bank_soal', $this->input->post('id_bank_soal'));
        $this->db->update('bank_soal', $data);
        redirect('Dashboard/bank_soal');
    }

    public function hapus_bank_soal($id_bank_soal)
    {
        $this->db->where('id_bank_soal', $id_bank_soal);
        $this->db->delete('bank_soal');

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
        redirect('Dashboard/bank_soal');
    }

    public function akun_peserta()
    {

        $isi['akun_peserta'] = $this->Model_siswa->dataAkunPeserta();

        $isi['content'] = 'Ujian/tampilan_akun_peserta';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }
}
