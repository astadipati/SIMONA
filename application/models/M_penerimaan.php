<?php
class M_penerimaan extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
     
    function tampil_pihak_kosong(){
        $query = $this->db->query("SELECT DATE_FORMAT(tanggal_pendaftaran, '%d/%m/%Y') AS tanggal_pendaftaran, jenis_perkara_nama, nomor_perkara, pihak1_text 
        FROM perkara WHERE YEAR( tanggal_pendaftaran) >= 2017 AND pihak1_text='' ORDER BY perkara_id DESC");
        return $query; 
    }

    function tampil_pihak_kosong_paging($halaman, $offset){
        return $this->db->query("SELECT DATE_FORMAT(tanggal_pendaftaran, '%d/%m/%Y') AS tanggal_pendaftaran, jenis_perkara_nama, nomor_perkara, pihak1_text 
        FROM perkara WHERE YEAR( tanggal_pendaftaran) >= 2017 AND pihak1_text='' ORDER BY perkara_id DESC limit $halaman, $offset");
    }

    function edoc_petitum_kosong(){
        $query = $this->db->query("SELECT DATE_FORMAT(tanggal_pendaftaran, '%d/%m/%Y') AS tanggal_pendaftaran, jenis_perkara_nama, nomor_perkara, petitum_dok
        FROM perkara WHERE YEAR( tanggal_pendaftaran) >= 2017 AND petitum_dok ='' ORDER BY perkara_id DESC");
        return $query; 
    }

    function tampil_edoc_petitum_kosong_paging($halaman, $offset){
        return $this->db->query("SELECT DATE_FORMAT(tanggal_pendaftaran, '%d/%m/%Y') AS tanggal_pendaftaran, jenis_perkara_nama, nomor_perkara, petitum_dok
        FROM perkara WHERE YEAR( tanggal_pendaftaran) >= 2017 AND petitum_dok ='' ORDER BY perkara_id DESC limit $halaman, $offset");
    }

}
?>