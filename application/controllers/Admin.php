<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    //public $smart_alternatif = 'smart_alternatif';
    //public $smart_alternatif_kriteria = 'smart_alternatif_kriteria';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('phpexcel_model');
        $this->load->model('Mkelas');
        $this->load->model('Mkriteria');
        $this->load->model('Mtahun');
        $this->load->model('Msubkriteria');
        $this->load->model('Mpenduduk');
        $this->load->model('Mexcel');
        $this->load->model('Mpenilaian');
        $this->load->model('Mhasilpenilaian');
        $this->load->model('Siswa_model');
        $this->load->model('Muser');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
            //Do your magic here
        }

        
        
    }





    public function index()
    {
        $data['siswa_per_kelas'] = $this->Siswa_model->get_jumlah_siswa_per_kelas();
        $this->load->view('Admin/Dashboard', $data);
    }

    public function user()
    {
        $data['user'] = $this->Muser->get_user();
        $this->load->view('Admin/User', $data);
    }

    public function tambah_user()
    {
        if ($this->input->post('username')) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'akses' => $this->input->post('akses')
            );

            $this->Muser->tambah_user($data);

            //echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
            // Set flashdata untuk menampilkan notifikasi setelah data berhasil disimpan
            $this->session->set_flashdata('success', 'Data user berhasil disimpan.');
            redirect(site_url('Admin/user'), 'refresh');
        }

        $this->load->view('Admin/Tambah_user');
    }

    public function edit_user()
    {
        $username = $this->input->get('username');
        $this->load->model('Muser');

        // Mendapatkan data pengguna dari tabel smart_akun berdasarkan username
        $user = $this->db->get_where('smart_akun', array('username' => $username))->row();

        // Jika pengguna tidak ditemukan, tampilkan halaman 404
        if (!$user) {
            show_404();
        }

        // Jika form di-submit
        if ($this->input->post('submit')) {
            // Validasi input dari form
            $this->form_validation->set_rules('new_username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('akses', 'Akses', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika validasi gagal, tampilkan kembali form edit pengguna dengan pesan kesalahan
                $data['user'] = $user;
                $this->session->set_flashdata('error', 'Validasi gagal!');
                $this->load->view('Admin/Edit_user', $data);
            } else {
                // Jika validasi berhasil, simpan data pengguna ke tabel smart_akun
                $new_username = $this->input->post('new_username');
                $password = md5($this->input->post('password'));
                $akses = $this->input->post('akses');
                $data = array('username' => $new_username, 'password' => $password, 'akses' => $akses);

                $this->db->where('username', $username);
                $this->db->update('smart_akun', $data);

                // Tampilkan pesan sukses dan redirect ke halaman daftar pengguna
                //$this->session->set_flashdata('message', '<div class="alert alert-success">Data pengguna berhasil diubah!</div>');
                $this->session->set_flashdata('success', 'Data pengguna berhasil diubah!');
                redirect('Admin/user');
            }
        } else {
            // Tampilkan form edit pengguna
            $data['user'] = $user;
            $this->load->view('Admin/Edit_user', $data);
        }
    }

    public function hapus_user()
    {
        $data = $this->input->get('username');
        $this->Muser->hapus_user($data);
        //$this->session->set_flashdata('success', 'Data pengguna berhasil dihapus!');
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/User'), 'refresh');
    }

    public function tahun()
    {
        $data['tahun'] = $this->Mtahun->daftar_tahun();
        $this->load->view('Admin/Tahun', $data);
    }
    public function tambah_tahun()
    {
        $this->load->view('Admin/Tahun_tambah');
    }

    public function proses_simpan_tahun()
    {
        $data = array(
            'tahun'    => $this->input->post('tahun'),
            'status' => "0",
        );
        $this->Mtahun->simpan_tahun($data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Tahun'), 'refresh');
    }

    public function edit_tahun()
    {
        $id_tahun_akademik = $this->input->get('id_tahun_akademik');
        $data['tahun'] = $this->Mtahun->edit_tahun($id_tahun_akademik);
        $this->load->view('Admin/Tahun_edit', $data);
        $this->session->set_flashdata('id_tahun_akademik', $id_tahun_akademik);
    }

    public function proses_edit_tahun()
    {
        $id_tahun_akademik = $this->session->flashdata('id_tahun_akademik');
        $data = array(
            'tahun'    => $this->input->post('tahun'),
        );
        $this->Mtahun->proses_edit_tahun($id_tahun_akademik, $data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/tahun'), 'refresh');
    }

    public function aktif_tahun()
    {
        $tahun_baru = $this->input->get('id_baru');
        $tahun_lama = $this->input->get('id_lama');
        $this->Mtahun->aktif($tahun_baru);
        $this->Mtahun->nonaktif($tahun_lama);

        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/tahun'), 'refresh');
    }

    public function proses_hapus_tahun()
    {

        $data = $this->input->get('id_tahun_akademik');
        $this->Mtahun->hapus_tahun($data);

        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/tahun'), 'refresh');
    }



    public function kriteria()
    {
        $data['kriteria'] = $this->Mkriteria->daftar_kriteria();
        $this->load->view('Admin/Kriteria', $data);
    }
    public function tambah_kriteria()
    {
        $this->load->view('Admin/Kriteria_tambah');
    }
    public function proses_simpan_kriteria()
    {
        $data = array(
            'nama_kriteria'    => $this->input->post('nama_kriteria'),
            'bobot_kriteria' => $this->input->post('bobot_kriteria'),
            'bobot_normalisasi' => $this->input->post('bobot_kriteria')
        );
        $this->Mkriteria->simpan_kriteria($data);
        $this->db->select('SUM(bobot_kriteria) as total');
        $this->db->from('smart_kriteria');
        $query = $this->db->get()->row()->total;
        $query2 = $this->db->query('select * from smart_kriteria');
        $ac = $query2->result();
        foreach ($ac as $row) {
            $ida = $row->id_kriteria;
            $perhitungan = substr($row->bobot_kriteria / $query, 0, 4);
            $akhir =  $this->db->query("update smart_kriteria set 
    bobot_normalisasi='" . $perhitungan . "' where id_kriteria='" . $ida . "'");
        }

        $query = $this->db->query('select * from smart_alternatif');
        $ab = $query->result();
        foreach ($ab as $index => $row2) {
            $query2 = $this->db->query('select * from smart_kriteria');
            $ac = $query2->result();
            foreach ($ac as $row3) {
                $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
                $ad = $query->result();
                foreach ($ad as $row4) {
                    $ida = $row4->id_alternatif;
                    $idk = $row4->id_kriteria;
                    $kal = $row4->nilai_alternatif_kriteria * $row3->bobot_normalisasi;
                    $ea = $this->db->query("update smart_alternatif_kriteria set bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");
                }
                $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $row2->id_alternatif . "'");
                $ideas = $row2->id_alternatif;
                $hsl = $queryku->row()->bak;
                if ($hsl >= 75) {
                    $ket = "diterima";
                } else {
                    $ket = "ditolak";
                }
                $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ideas . "'");
            }
        }
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Kriteria'), 'refresh');
    }

    public function cek_bobot()
    {
        $this->db->select('SUM(bobot_kriteria) as total');
        $this->db->from('smart_kriteria');
        $query = $this->db->get()->row()->total;
        //echo $query;
        $hasil = intval($query + $this->input->post('bobot_kriteria'));
        //echo $hasil;
        return $hasil >= 11;
    }
    public function cek_bobot_edit($id_kriteria)
    {
        $id_kriteria = $this->session->flashdata('id_kriteria');

        $a = $this->input->post('bobot_kriteria');
        $total = $this->db->select('SUM(bobot_kriteria) as total');
        $total = $this->db->from('smart_kriteria');
        $total = $this->db->get()->row()->total;

        $bobot = $this->db->select('SUM(bobot_kriteria) as total');
        $bobot = $this->db->from('smart_kriteria');
        $bobot = $this->db->where('id_kriteria', $id_kriteria);
        $bobot = $this->db->get()->row()->total;

        $hasil = intval(($total - $bobot) + $this->input->post('bobot_kriteria'));
        return $hasil >= 11;
    }

    public function proses_hapus_kriteria()
    {

        $data = $this->input->get('id_kriteria');
        $this->Mkriteria->hapus_kriteria($data);

        $total = $this->db->select('SUM(bobot_kriteria) as total');
        $total = $this->db->from('smart_kriteria');
        $total = $this->db->get()->row()->total;


        $query2 = $this->db->query('select * from smart_kriteria');
        $ac = $query2->result();
        foreach ($ac as $row) {
            $ida = $row->id_kriteria;
            $perhitungan = substr($row->bobot_kriteria / $total, 0, 4);
            //          echo "$perhitungan";
            $akhir =  $this->db->query("update smart_kriteria set bobot_normalisasi='" . $perhitungan . "' where id_kriteria='" . $ida . "'");
        }


        $query1 = $this->db->query('select * from smart_alternatif');
        $ab = $query1->result();
        $no = 1;
        foreach ($ab as $index => $row2) {

            $query2 = $this->db->query('select * from smart_kriteria');
            $ac = $query2->result();
            $no = 1;
            foreach ($ac as $row3) {

                $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
                $ad = $query->result();
                foreach ($ad as $row4) {
                    $ida = $row4->id_alternatif;
                    $idk = $row4->id_kriteria;
                    $kal = $row4->nilai_alternatif_kriteria * $row3->bobot_normalisasi;

                    $ea = $this->db->query("update smart_alternatif_kriteria set bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");
                }

                $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $row2->id_alternatif . "'");
                $ideas = $row2->id_alternatif;
                $hsl = $queryku->row()->bak;
                if ($hsl >= 75) {
                    $ket = "diterima";
                } else {
                    $ket = "ditolak";
                }
                $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ideas . "'");
            }
        }

        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Kriteria'), 'refresh');
    }


    public function edit_kriteria()
    {
        $id_kriteria = $this->input->get('id_kriteria');
        $data['kriteria'] = $this->Mkriteria->edit_kriteria($id_kriteria);
        $this->load->view('Admin/Kriteria_edit', $data);
        $this->session->set_flashdata('id_kriteria', $id_kriteria);
    }
    public function proses_edit_kriteria()
    {
        $id_kriteria = $this->session->flashdata('id_kriteria');
        $data = array(
            'nama_kriteria'    => $this->input->post('nama_kriteria'),
            'bobot_kriteria'    => $this->input->post('bobot_kriteria'),
            'bobot_normalisasi' => $this->input->post('bobot_kriteria')
        );
        $this->Mkriteria->proses_edit_kriteria($id_kriteria, $data);
        $e = $this->db->select('SUM(bobot_kriteria) as total');
        $e = $this->db->from('smart_kriteria');
        $e = $this->db->get()->row()->total;
        $e2 = $this->db->query('select * from smart_kriteria');
        $eec = $e2->result();
        foreach ($eec as $rowe) {
            $idae = $rowe->id_kriteria;
            $perhitungane = substr($rowe->bobot_kriteria / $e, 0, 4);
            $akhire =  $this->db->query("update smart_kriteria set bobot_normalisasi='" . $perhitungane . "' where id_kriteria='" . $idae . "'");
        }

        $query1 = $this->db->query('select * from smart_alternatif');
        $ab = $query1->result();
        foreach ($ab as $index => $row2) {
            $query2 = $this->db->query('select * from smart_kriteria');
            $ac = $query2->result();
            foreach ($ac as $row3) {
                $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
                $ad = $query->result();
                foreach ($ad as $row4) {
                    $ida = $row4->id_alternatif;
                    $idk = $row4->id_kriteria;
                    $kal = $row4->nilai_alternatif_kriteria * $row3->bobot_normalisasi;

                    $ea = $this->db->query("update smart_alternatif_kriteria set bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");
                }
                $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $row2->id_alternatif . "'");
                $ideas = $row2->id_alternatif;
                $hsl = $queryku->row()->bak;
                if ($hsl >= 75) {
                    $ket = "diterima";
                } else {
                    $ket = "ditolak";
                }
                $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ideas . "'");
            }
        }
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/kriteria'), 'refresh');
    }
    public function sub_kriteria()
    {
        //$data['subkriteria']=$this->Msubkriteria->daftar_sub_kriteria();
        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $this->load->view('Admin/Sub_kriteria');
    }

    public function tambah_sub_kriteria()
    {
        $data['kriteria'] = $this->Mkriteria->daftar_kriteria();
        $this->load->view('Admin/Sub_kriteria_tambah', $data);
    }
    public function proses_simpan_sub_kriteria()
    {
        $data = array(
            'nama_sub_kriteria'    => $this->input->post('nama_sub_kriteria'),
            'nilai_sub_kriteria' => $this->input->post('nilai_sub_kriteria'),
            'id_kriteria' => $this->input->post('id_kriteria')
        );
        $this->Msubkriteria->simpan_sub_kriteria($data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Sub_kriteria'), 'refresh');
    }

    public function proses_hapus_sub_kriteria()
    {
        $data = $this->input->get('id_sub_kriteria');
        $this->Msubkriteria->hapus_sub_kriteria($data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Sub_kriteria'), 'refresh');
    }
    public function proses_edit_sub_kriteria()
    {
        /*$this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'callback_cek_bobot_edit');
	if ($this->form_validation->run()==true){
		echo '<script type="text/javascript">alert("nilai harus 10 jika dijumlah !!")</script>';
					redirect(site_url('Admin/Kriteria'),'refresh');
	}else{ */
        $id_sub_kriteria = $this->session->flashdata('id_sub_kriteria');
        $data = array(
            'nama_sub_kriteria'    => $this->input->post('nama_sub_kriteria'),
            'nilai_sub_kriteria'    => $this->input->post('nilai_sub_kriteria'),
            'id_kriteria' => $this->input->post('id_kriteria')
        );
        $this->Msubkriteria->proses_edit_sub_kriteria($id_sub_kriteria, $data);

        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Sub_kriteria'), 'refresh');
    }
    //}	
    public function edit_sub_kriteria()
    {
        $id_sub_kriteria = $this->input->get('id_sub_kriteria');
        $data['sub_kriteria'] = $this->Msubkriteria->edit_sub_kriteria($id_sub_kriteria);
        //	$data['kriteria']=$this->Mkriteria->daftar_kriteria();
        $this->load->view('Admin/Sub_kriteria_edit', $data);
        $this->session->set_flashdata('id_sub_kriteria', $id_sub_kriteria);
    }

    //kelas
    public function kelas()
    {
        //$data['subkriteria']=$this->Msubkriteria->daftar_sub_kriteria();
        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $data['kelas'] = $this->Mkelas->daftar_kelas();
        $this->load->view('Admin/Kelas', $data);
    }

    public function tambah_kelas()
    {
        $data['kelas'] = $this->Mkelas->daftar_kelas();
        $this->load->view('Admin/Kelas_tambah', $data);
    }
    public function proses_simpan_kelas()
    {
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas')
        );
        $this->Mkelas->simpan_kelas($data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Kelas'), 'refresh');
    }

    public function proses_hapus_kelas()
    {
        $data = $this->input->get('id_kelas');
        $this->Mkelas->hapus_kelas($data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Kelas'), 'refresh');
    }
    public function proses_edit_kelas()
    {
        /*$this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'callback_cek_bobot_edit');
	if ($this->form_validation->run()==true){
		echo '<script type="text/javascript">alert("nilai harus 10 jika dijumlah !!")</script>';
					redirect(site_url('Admin/Kriteria'),'refresh');
	}else{ */
        $id_kelas = $this->session->flashdata('id_kelas');
        $data = array(
            'nama_kelas'    => $this->input->post('nama_kelas'),
            //'id_kelas'=> $this->input->post('id_kelas')			
        );
        $this->Mkelas->proses_edit_kelas($id_kelas, $data);

        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Kelas'), 'refresh');
    }
    //}	
    public function edit_kelas()
    {
        $id_kelas = $this->input->get('id_kelas');
        $data['kelas'] = $this->Mkelas->edit_kelas($id_kelas);
        //	$data['kriteria']=$this->Mkriteria->daftar_kriteria();
        $this->load->view('Admin/Kelas_edit', $data);
        $this->session->set_flashdata('id_kelas', $id_kelas);
    }

    public function penduduk()
    {
        // $data['output'] = "<h4>Import excel, pastikan file anda berformat <strong>.xls/.xlsx</strong></h4>";
        // $data['output'] .= form_open_multipart('Admin/do_upload');
        // $form = array(
        // 			'name'        => 'userfile',
        // 			'style'       => 'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=0);opacity:0;background-color:transparent;color:transparent;',
        // 			'onchange'	=> "$('#upload-file-info').html($(this).val());"
        // 		);
        // $data['output'] .= "<div style='position:relative;'>";
        // $data['output'] .= "<a class='btn btn-primary' href='javascript:;'>";
        // $data['output'] .= "Import file… ".form_upload($form);
        // $data['output'] .= "</a>";
        // $data['output'] .= "&nbsp;";
        // $data['output'] .= "<span class='label label-info' id='upload-file-info'></span>";
        // $data['output'] .= "&nbsp;&nbsp;&nbsp;";
        // $data['output'] .= form_submit('name', 'Go !', 'class = "btn btn-default"');
        // $data['output'] .= "</div>";
        // $data['output'] .= form_close();
        // if ($success) {
        // 	echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        // 							redirect(site_url('Admin/Penduduk'), 'refresh');
        // }
        $aktif = $this->Mtahun->tahun_aktif();
        $id_aktif = $aktif->id_tahun_akademik;

        if ($this->session->userdata("wk") != false){
            $data['penduduk'] = $this->Mpenduduk->daftar_penduduk($id_aktif, $this->session->userdata("id_kelas"));
        } else {
            $data['penduduk'] = $this->Mpenduduk->daftar_penduduk($id_aktif);
        }
        
        
        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $this->load->view('Admin/Penduduk', $data);
    }


    public function do_upload()
    {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xlsx|xls';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            echo '<script type="text/javascript">alert("File yang diupload bukan .xls/.xlsx!!!")</script>';
            redirect(site_url('Admin/Penduduk'), 'refresh');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $filename = $upload_data['file_name'];
            $this->phpexcel_model->upload_data($filename);
            unlink('./assets/uploads/' . $filename);
            redirect('Admin/penduduk/success');
        }
    }


    public function export_siswa()
    {
        $aktif = $this->Mtahun->tahun_aktif();
        $id_aktif = $aktif->id_tahun_akademik;
        $this->load->model('Mpenduduk');
        $penduduk = $this->Mpenduduk->daftar_penduduk($id_aktif);
        $filename = "Data Siswa_" . date('Ymd') . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1">';
        echo '<tr><th>No</th><th>NISN</th><th>Nama Siswa</th><th>Nama Kelas</th></tr>';

        $no = 1;
        foreach ($penduduk as $row) {
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            // echo '<td>' . $row->no_kk . '</td>';
            echo '<td>' . "'" . $row->no_kk . '</td>'; // Menambahkan tanda kutip satu pada nilai variabel $row->no_kk
            echo '<td>' . $row->nama_alternatif . '</td>';
            echo '<td>' . $row->nama_kelas . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    public function export()
    {
        //membuat objek
        $aktif = $this->Mtahun->tahun_aktif();
        $id_aktif = $aktif->id_tahun_akademik;

        $objPHPExcel = new PHPExcel();
        $data = $this->db->query("SELECT * FROM smart_alternatif WHERE id_tahun_akademik='$id_aktif';");
        // Nama Field Baris Pertama
        $fields = $data->list_fields();
        $col = 0;
        foreach ($fields as $field) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }

        // Mengambil Data
        $row = 2;
        foreach ($data->result() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }

            $row++;
        }
        $objPHPExcel->setActiveSheetIndex(0);

        //Set Title
        $objPHPExcel->getActiveSheet()->setTitle('Data Absen');

        //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        //Header
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        //Nama File
        header('Content-Disposition: attachment;filename="data penduduk.xlsx"');

        //Download
        $objWriter->save("php://output");
    }

    public function tambah_penduduk()
    {
        $data['kelas'] = $this->Mpenduduk->daftar_kelas();
        //$data['sub_kriteria']=$this->Mpenduduk->daftar_sub_kriteria();
        $this->load->view('Admin/Penduduk_tambah', $data);
    }

    public function get_kelas_by_id()
    {
        $id_kelas = $this->input->post('id_kelas');
        $kelas = $this->db->get_where('kelas', array('id_kelas' => $id_kelas))->row_array();
        echo json_encode($kelas);
    }

    public function proses_simpan_penduduk()
    {
        //$id_kelas = $this->db->select('id_kelas')->from('smart_kelas')->get()->row()->id_kelas;

        $pesanError = [
            'required' => '<span style="color:red;">%s harap diisi</span>',
            'numeric' => '<span style="color:red;">%s harus berupa angka</span>',
            'max_length' => '<span style="color:red;">panjang no kk harus 16 angka </span>',
            'min_length' => '<span style="color:red;">panjang no kk harus 16 angka </span>'
        ];
        $this->form_validation->set_rules('no_kk', 'no_kk', 'required|numeric|max_length[16]', $pesanError);
        $this->form_validation->set_rules('nama_alternatif', 'nama_alternatif', 'required', $pesanError);
        if ($this->form_validation->run() == False) {
            $this->load->view('admin/Penduduk_tambah');
        } else {
            $aktif = $this->Mtahun->tahun_aktif();
            $id_aktif = $aktif->id_tahun_akademik;

            $no_kk = $_POST['no_kk'];
            $this->db->select('*');
            $this->db->from('smart_alternatif');
            $this->db->where('id_tahun_akademik', $id_aktif);
            $this->db->where('no_kk', $no_kk);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                echo '<script type="text/javascript">alert("NISN sudah terdaftar!!")</script>';
                redirect(site_url('Admin/tambah_penduduk'), 'refresh');
            } else {

                $aktif = $this->Mtahun->tahun_aktif();
                $id_aktif = $aktif->id_tahun_akademik;

                $data = array(
                    'id_tahun_akademik'    => $id_aktif,
                    'no_kk'    => $this->input->post('no_kk'),
                    'nama_alternatif' => $this->input->post('nama_alternatif'),
                    'id_kelas' => $this->input->post('id_kelas'),
                    'ket_alternatif' => 'ditolak'
                );
                $this->Mpenduduk->simpan_penduduk($data);
                echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
                redirect(site_url('Admin/Penduduk'), 'refresh');
            }
        }
    }
    public function proses_hapus_penduduk()
    {
        $data = $this->input->get('id_alternatif');
        $this->Mpenduduk->hapus_penduduk($data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Penduduk'), 'refresh');
    }

    public function edit_penduduk()
    {
        $data['kelas'] = $this->Mpenduduk->daftar_kelas();
        $id_alternatif = $this->input->get('id_alternatif');
        $data['penduduk'] = $this->Mpenduduk->edit_penduduk($id_alternatif);
        $this->load->view('Admin/Penduduk_edit', $data);
        $this->session->set_flashdata('id_alternatif', $id_alternatif);
    }
    public function proses_edit_penduduk()
    {
        /*	$this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'callback_cek_bobot_edit');
	if ($this->form_validation->run()==true){
		echo '<script type="text/javascript">alert("nilai harus 10 jika dijumlah !!")</script>';
					redirect(site_url('Admin/Kriteria'),'refresh');
	}else{*/
        $id_alternatif = $this->session->flashdata('id_alternatif');
        $data = array(
            'no_kk'    => $this->input->post('no_kk'),
            'nama_alternatif'    => $this->input->post('nama_alternatif'),
            'id_kelas' => $this->input->post('id_kelas')
        );
        $this->Mpenduduk->proses_edit_penduduk($id_alternatif, $data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Penduduk'), 'refresh');

        //	}
    }

    public function penilaian()
    {
        //$data['penilaian']=$this->Mpenilaian->daftar_penilaian();
        $aktif = $this->Mtahun->tahun_aktif();
        $id_aktif = $aktif->id_tahun_akademik;
        $data['smart_kriteria'] = $this->Mhasilpenilaian->daftar_smart_kriteria();
        if ($this->session->userdata("wk") != false){
            $data['smart_alternatif'] = $this->Mhasilpenilaian->daftar_smart_alternatif($id_aktif, $this->session->userdata("id_kelas"));    
        } else {
            $data['smart_alternatif'] = $this->Mhasilpenilaian->daftar_smart_alternatif($id_aktif);    
        }
        
        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $this->load->view('Admin/Penilaian', $data);
    }
    public function tambah_penilaian()
    {
        

        //$data['kriteria']=$this->Mpenduduk->daftar_kriteria();
        //$data['sub_kriteria']=$this->Mpenduduk->daftar_sub_kriteria();
        $this->load->view('Admin/Penilaian_tambah');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->blog_model->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'            => $row->blog_title,
                        'description'    => $row->blog_description,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function edit_penilaian()
    {

        $id_alternatif = $this->input->get('id_alternatif');
        $this->db->select('*');
        $this->db->from('smart_alternatif_kriteria');
        $this->db->where('id_alternatif', $id_alternatif);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            echo '<script type="text/javascript">alert("Data belum ada, data ditambah dulu!!")</script>';
            redirect(site_url('Admin/tambah_penilaian'), 'refresh');
        } else {

            $id_alternatif = $this->input->get('id_alternatif');
            $data['penilaian'] = $this->Mpenilaian->edit_penilaian($id_alternatif);
            $data['penilaian2'] = $this->Mpenilaian->edit_penilaian2($id_alternatif);
            $data['penilaian3'] = $this->Mpenilaian->edit_penilaian3($id_alternatif);
            $this->load->view('Admin/Penilaian_edit', $data);
            $this->session->set_flashdata('id_alternatif', $id_alternatif);
        }
    }
    public function proses_edit_penilaian()
    {
        //$id_alternatif = $this->session->flashdata('id_alternatif');
        $qu = $this->db->select('*');
        $qu = $this->db->from('smart_kriteria');
        //$this->db->join('smart_penduduk','smart_penduduk.id_pen=smart_alternatif_penduduk.id_pen');
        $qu = $this->db->get()->result();
        //return $query->result();
        foreach ($qu as $row3) {
            if ($this->session->userdata('akses') == "wali kelas") {
                if ($row3->nama_kriteria == "Nilai Rata-rata Raport" || $row3->nama_kriteria == "Nilai Presensi Kehadiran" || $row3->nama_kriteria == "Nilai Ujian Sekolah") {
                    //if($q->id_kriteria==true){
                    $alt = $_POST['alt'];
                    $idkri = $row3->id_kriteria;
                    $kri = $_POST['kri'][$idkri];
                    $altkri = $_POST['altkri'][$idkri];
                    $a = "0";

                    $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='" . $kri . "' and id_alternatif='" . $alt . "'");
                    $ad = $query->result();
                    foreach ($ad as $row4) {
                        $ida = $row4->id_alternatif;
                        $idk = $row4->id_kriteria;
                        $kal = $altkri * $row3->bobot_normalisasi;

                        $ea = $this->db->query("update smart_alternatif_kriteria set nilai_alternatif_kriteria='" . $altkri . "', bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");

                        $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $alt . "'");
                        //$queryku->result();
                        //$ideas = $row2->id_alternatif;
                        $hsl = $queryku->row()->bak;
                        if ($hsl >= 75) {
                            $ket = "diterima";
                        } else {
                            $ket = "ditolak";
                        }
                        $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ida . "'");
                    }
                }
            } else if ($this->session->userdata('akses') == "wakasek") {
                if ($row3->nama_kriteria == "Nilai Ekstrakulikuler" || $row3->nama_kriteria == "Nilai Prestasi") {
                    //if($q->id_kriteria==true){
                    $alt = $_POST['alt'];
                    $idkri = $row3->id_kriteria;
                    $kri = $_POST['kri'][$idkri];
                    $altkri = $_POST['altkri'][$idkri];
                    $a = "0";

                    $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='" . $kri . "' and id_alternatif='" . $alt . "'");
                    $ad = $query->result();
                    foreach ($ad as $row4) {
                        $ida = $row4->id_alternatif;
                        $idk = $row4->id_kriteria;
                        $kal = $altkri * $row3->bobot_normalisasi;

                        $ea = $this->db->query("update smart_alternatif_kriteria set nilai_alternatif_kriteria='" . $altkri . "', bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");

                        $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $alt . "'");
                        //$queryku->result();
                        //$ideas = $row2->id_alternatif;
                        $hsl = $queryku->row()->bak;
                        if ($hsl >= 75) {
                            $ket = "diterima";
                        } else {
                            $ket = "ditolak";
                        }
                        $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ida . "'");
                    }
                }
            } else {
                //if($q->id_kriteria==true){
                $alt = $_POST['alt'];
                $idkri = $row3->id_kriteria;
                $kri = $_POST['kri'][$idkri];
                $altkri = $_POST['altkri'][$idkri];
                $a = "0";

                $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='" . $kri . "' and id_alternatif='" . $alt . "'");
                $ad = $query->result();
                foreach ($ad as $row4) {
                    $ida = $row4->id_alternatif;
                    $idk = $row4->id_kriteria;
                    $kal = $altkri * $row3->bobot_normalisasi;

                    $ea = $this->db->query("update smart_alternatif_kriteria set nilai_alternatif_kriteria='" . $altkri . "', bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");

                    $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $alt . "'");
                    //$queryku->result();
                    //$ideas = $row2->id_alternatif;
                    $hsl = $queryku->row()->bak;
                    if ($hsl >= 75) {
                        $ket = "diterima";
                    } else {
                        $ket = "ditolak";
                    }
                    $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ida . "'");
                }
            }
        }
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Penilaian'), 'refresh');
    }

    public function proses_simpan_penilaian()
    {
        $alt = $_POST['alt'];
        $this->db->select('*');
        $this->db->from('smart_alternatif_kriteria');
        $this->db->where('id_alternatif', $alt);
        $query = $this->db->get();

        // if ($query->num_rows()>0){
        // 	echo '<script type="text/javascript">alert("Data sudah ada, data harus dihapus dulu!!")</script>';
        // 				redirect(site_url('Admin/Penilaian'),'refresh');

        // }else{
        // var_dump($_POST);
        $qu = $this->db->select('*');
        $qu = $this->db->from('smart_kriteria');
        $qu = $this->db->get()->result();


        foreach ($qu as $row3) {
            if ($this->session->userdata('akses') == "wali kelas") {
                if ($row3->nama_kriteria == "Nilai Rata-rata Raport" || $row3->nama_kriteria == "Nilai Presensi Kehadiran" || $row3->nama_kriteria == "Nilai Ujian Sekolah") {
                    $aktif = $this->Mtahun->tahun_aktif();
                    $id_aktif = $aktif->id_tahun_akademik;

                    $cek = $this->db->get_where('smart_alternatif_kriteria', ['id_alternatif' => $alt, 'id_tahun_akademik' => $id_aktif, 'id_kriteria' => $row3->id_kriteria])->num_rows();
                    if ($cek > 0) {
                        $delete = $this->db->delete('smart_alternatif_kriteria', ['id_alternatif' => $alt, 'id_tahun_akademik' => $id_aktif, 'id_kriteria' => $row3->id_kriteria]);
                    }


                    $alt = $_POST['alt'];
                    $idkri = $row3->id_kriteria;
                    $kri = $_POST['kri'][$idkri];
                    $altkri = $_POST['altkri'][$idkri];
                    $kal = $altkri * $row3->bobot_normalisasi;
                    $data = array(
                        'id_tahun_akademik'    => $id_aktif,
                        'id_alternatif'    => $alt,
                        'id_kriteria'    => $kri,
                        'nilai_alternatif_kriteria' =>  $altkri,
                        'bobot_alternatif_kriteria' => $kal
                    );

                    $this->Mpenilaian->simpan_penilaian($data);
                    $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $alt . "'");
                    //$queryku->result();
                    //$ideas = $row2->id_alternatif;
                    $hsl = $queryku->row()->bak;
                    if ($hsl >= 75) {
                        $ket = "diterima";
                    } else {
                        $ket = "ditolak";
                    }
                    $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $alt . "'");
                }
            } else if ($this->session->userdata('akses') == "wakasek") {
                if ($row3->nama_kriteria == "Nilai Ekstrakulikuler" || $row3->nama_kriteria == "Nilai Prestasi") {
                    $aktif = $this->Mtahun->tahun_aktif();
                    $id_aktif = $aktif->id_tahun_akademik;

                    $cek = $this->db->get_where('smart_alternatif_kriteria', ['id_alternatif' => $alt, 'id_tahun_akademik' => $id_aktif, 'id_kriteria' => $row3->id_kriteria])->num_rows();
                    if ($cek > 0) {
                        $delete = $this->db->delete('smart_alternatif_kriteria', ['id_alternatif' => $alt, 'id_tahun_akademik' => $id_aktif, 'id_kriteria' => $row3->id_kriteria]);
                    }
                    // var_dump($_POST);
                    $alt = $_POST['alt'];
                    $idkri = $row3->id_kriteria;
                    $kri = $_POST['kri'][$idkri];
                    $altkri = $_POST['altkri'][$idkri];
                    $kal = $altkri * $row3->bobot_normalisasi;
                    $data = array(
                        'id_tahun_akademik'    => $id_aktif,
                        'id_alternatif'    => $alt,
                        'id_kriteria'    => $kri,
                        'nilai_alternatif_kriteria' =>  $altkri,
                        'bobot_alternatif_kriteria' => $kal
                    );

                    $this->Mpenilaian->simpan_penilaian($data);
                    $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $alt . "'");
                    //$queryku->result();
                    //$ideas = $row2->id_alternatif;
                    $hsl = $queryku->row()->bak;
                    if ($hsl >= 75) {
                        $ket = "diterima";
                    } else {
                        $ket = "ditolak";
                    }
                    $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $alt . "'");
                } else {
                    continue;
                }
            } else {

                $aktif = $this->Mtahun->tahun_aktif();
                $id_aktif = $aktif->id_tahun_akademik;

                $cek = $this->db->get_where('smart_alternatif_kriteria', ['id_alternatif' => $alt, 'id_tahun_akademik' => $id_aktif, 'id_kriteria' => $row3->id_kriteria])->num_rows();
                if ($cek > 0) {
                    $delete = $this->db->delete('smart_alternatif_kriteria', ['id_alternatif' => $alt, 'id_tahun_akademik' => $id_aktif, 'id_kriteria' => $row3->id_kriteria]);
                }
                $alt = $_POST['alt'];
                $idkri = $row3->id_kriteria;
                $kri = $_POST['kri'][$idkri];
                $altkri = $_POST['altkri'][$idkri];
                $kal = $altkri * $row3->bobot_normalisasi;

                $data = array(
                    'id_tahun_akademik'    => $id_aktif,
                    'id_alternatif'    => $alt,
                    'id_kriteria'    => $kri,
                    'nilai_alternatif_kriteria' =>  $altkri,
                    'bobot_alternatif_kriteria' => $kal
                );

                $this->Mpenilaian->simpan_penilaian($data);
                $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $alt . "'");
                //$queryku->result();
                //$ideas = $row2->id_alternatif;
                $hsl = $queryku->row()->bak;
                if ($hsl >= 75) {
                    $ket = "diterima";
                } else {
                    $ket = "ditolak";
                }
                $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $alt . "'");
            }

            //if($q->id_kriteria==true){


            //print_r($data);

            //}
            // }	//echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
            //				redirect(site_url('Admin/Penilaian'),'refresh');
            //}

        }
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Penilaian'), 'refresh');
    }




    public function proses_hapus_penilaian()
    {
        $data = $this->input->get('id_alternatif');
        $this->Mpenilaian->hapus_penilaian($data);
        $this->Mpenilaian->reset_penilaian($data);
        echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
        redirect(site_url('Admin/Penilaian'), 'refresh');
    }
    public function eksekusi_penilaian()
    {
        $data['penilaian'] = $this->Mpenilaian->daftar_penilaian();

        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $this->load->view('Admin/Eksekusi_penilaian', $data);
    }

    public function hasil_penilaian()
    {
        $aktif = $this->Mtahun->tahun_aktif();
        $id_aktif = $aktif->id_tahun_akademik;
        $data['kelas'] = $this->Mpenduduk->daftar_kelas();
        $data['smart_kriteria'] = $this->Mhasilpenilaian->daftar_smart_kriteria();
        $data['smart_alternatif'] = $this->Mhasilpenilaian->daftar_smart_alternatif($id_aktif);
        //$data['smart_alternatif_kriteria']=$this->Mhasilpenilaian->daftar_smart_alternatif_kriteria();
        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $this->load->view('Admin/Hasil_penilaian', $data);
    }

    public function laporan()
    {
        $this->load->view('Admin/lap');
    }

    public function eksekusi()
    {
        $query1 = $this->db->query('select * from smart_alternatif');
        $ab = $query1->result();
        $no = 1;
        foreach ($ab as $index => $row2) {

            $query2 = $this->db->query('select * from smart_kriteria');
            $ac = $query2->result();
            $no = 1;
            foreach ($ac as $row3) {



                $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
                $ad = $query->result();
                foreach ($ad as $row4) {
                    $ida = $row4->id_alternatif;
                    $idk = $row4->id_kriteria;
                    $kal = $row4->nilai_alternatif_kriteria * $row3->bobot_normalisasi;

                    $ea = $this->db->query("update smart_alternatif_kriteria set bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");
                }

                $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='" . $row2->id_alternatif . "'");
                $ideas = $row2->id_alternatif;
                $hsl = $queryku->row()->bak;
                if ($hsl >= 75) {
                    $ket = "diterima";
                } else {
                    $ket = "ditolak";
                }
                $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ideas . "'");
            }
        }
        $data['smart_kriteria'] = $this->Mhasilpenilaian->daftar_smart_kriteria();
        $data['smart_alternatif'] = $this->Mhasilpenilaian->daftar_smart_alternatif();
        //$data['smart_alternatif_kriteria']=$this->Mhasilpenilaian->daftar_smart_alternatif_kriteria();
        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $this->load->view('Admin/hasil_penilaian', $data);
    }

    public function proses_import_excel()
    {

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xlsx|xls';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $filename = $upload_data['file_name'];
            $this->phpexcel_model->upload_data($filename);
            unlink('./assets/uploads/' . $filename);
            redirect('Admin/tambah_penduduk', 'refresh');
        }


        $data['penduduk'] = $this->Mpenduduk->daftar_penduduk();
        //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
        $this->load->view('Admin/Penduduk', $data);
    }
}
