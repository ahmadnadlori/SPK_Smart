<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;
class Cetak extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('Mcetak');
    $this->load->model('Mpenduduk');
	$this->load->model('Mtahun');
    //$this->load->library('dompdf_gen');
    $this->load->library('phpexcel');
	if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));		
	//Do your magic here
}
}

public function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

public function laporan(){
    $aktif = $this->Mtahun->tahun_aktif();
	$id_aktif = $aktif->id_tahun_akademik;
	
	$data['kelas']=$this->Mpenduduk->daftar_kelas();
    $data['smart_kriteria']=$this->Mcetak->daftar_smart_kriteria();
    $data['smart_alternatif']=$this->Mcetak->daftar_smart_alternatif($id_aktif);
    //$data['image'] = base64_encode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/ci_smart_new/picture/rembang.png'));
    $data['image'] = base64_encode(file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/picture/rembang.png'));
    $data['image2'] = base64_encode(file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/picture/mandirancan.png'));
    //$data['tgl_indo']=$this->Mcetak->tgl_indo();
	//$data['cetak']=$this->Mcetak->cetak();
	//$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
	$this->load->view('Admin/V_Cetak',$data);
	//$old_limit = ini_set('memory_limit', '12mb');
    // Load/panggil library dompdfnya
    //$this->load->library('dompdf_gen');
    //$dompdf = new DOMPDF();
    // Convert to PDF
    $paper_size  = 'A4'; //paper size
    $orientation = 'landscape';
    $options=new Options();
    $options->set('defaultFont', 'Helvetica');
    $options->set('dpi','120');
    $options->set('enable_html5_parser',true);
    $options->set('tempDir',$_SERVER["DOCUMENT_ROOT"]);
//Any directory
    $dompdf = new Dompdf($options);
    $html = $this->output->get_output();
    $dompdf->set_paper($paper_size, $orientation);
    $dompdf->load_html($html);
    $dompdf->render();
    // //utk menampilkan preview pdf

    $dompdf->stream("laporan ".tgl_indo(date('Y-m-d')).".pdf",array('Attachment'=>false));
    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    //$this->dompdf->stream("welcome.pdf");
    
}
public function laporan_excel(){

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan.xls");
    $aktif = $this->Mtahun->tahun_aktif();
	$id_aktif = $aktif->id_tahun_akademik;
	$data['smart_kriteria']=$this->Mcetak->daftar_smart_kriteria();
    $data['smart_alternatif']=$this->Mcetak->daftar_smart_alternatif($id_aktif);

    //$data['tgl_indo']=$this->Mcetak->tgl_indo();
    //$data['cetak']=$this->Mcetak->cetak();
    //$data['subkriteria2']=$this->Msubkriteria->daftar_sub_kriteria2();
    $this->load->view('Admin/V_Excel',$data);
    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    //$this->dompdf->stream("welcome.pdf");

}
}
?>