<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phpexcel_model extends CI_Model {

    public function upload_data($filename){
        ini_set('memory_limit', '-1');
        $inputFileName = './assets/uploads/'.$filename;
        try {
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $numRows = count($worksheet);

        for ($i=1; $i < ($numRows+1) ; $i++) { 
            
            $ins = array(
                    "no_kk"          => $worksheet[$i]["A"],
                    "nama_alternatif"   => $worksheet[$i]["B"],
                    "hasil_alternatif"   => $worksheet[$i]["C"],
                    "ket_alternatif"   => $worksheet[$i]["D"],
                    //"alamat"   => $worksheet[$i]["E"],
                   );

            $this->db->insert('smart_alternatif', $ins);
        }
    }

}

/* End of file Phpexcel_model.php */
/* Location: ./application/models/Phpexcel_model.php */