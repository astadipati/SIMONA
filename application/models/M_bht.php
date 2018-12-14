<?php

class M_bht extends CI_Model{

    function gbht(){
        $query = $this->db->query("SELECT a.`perkara_id`, a.`alur_perkara_id`, a.`jenis_perkara_id`,
                                    DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,
                                    a.`jenis_perkara_nama`, a.`nomor_perkara`, a.`pihak1_text`, a.`pihak2_text`,
                                    DATE_FORMAT(b.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    DATE_FORMAT(b.`tanggal_bht`,'%d/%m/%Y') AS tanggal_bht
                                    FROM perkara AS a
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    WHERE DATE_FORMAT(a.`tanggal_pendaftaran`,'%Y')>2017
                                    AND b.`tanggal_bht`IS NOT NULL
                                    AND a.`alur_perkara_id`=15 ORDER BY a.`perkara_id` DESC");
        return $query; 
    } 

    function gbht_paging($halaman, $offset){
        return $this->db->query("SELECT a.`perkara_id`, a.`alur_perkara_id`, a.`jenis_perkara_id`,
                                    DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,
                                    a.`jenis_perkara_nama`, a.`nomor_perkara`, a.`pihak1_text`, a.`pihak2_text`,
                                    DATE_FORMAT(b.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    DATE_FORMAT(b.`tanggal_bht`,'%d/%m/%Y') AS tanggal_bht
                                    FROM perkara AS a
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    WHERE DATE_FORMAT(a.`tanggal_pendaftaran`,'%Y')>2017
                                    AND b.`tanggal_bht`IS NOT NULL
                                    AND a.`alur_perkara_id`=15 ORDER BY a.`perkara_id` DESC limit $halaman, $offset");
    }

    function gbht_periode($tanggal1, $tanggal2){
        $query = $this->db->query("SELECT a.`perkara_id`, a.`alur_perkara_id`, a.`jenis_perkara_id`,
                                    DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,
                                    a.`jenis_perkara_nama`, a.`nomor_perkara`, a.`pihak1_text`, a.`pihak2_text`,
                                    DATE_FORMAT(b.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    DATE_FORMAT(b.`tanggal_bht`,'%d/%m/%Y') AS tanggal_bht
                                    FROM perkara AS a
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    WHERE DATE_FORMAT(a.`tanggal_pendaftaran`,'%Y')>2017
                                    AND b.`tanggal_bht`IS NOT NULL
									AND  b.`tanggal_bht` BETWEEN '$tanggal1' AND '$tanggal2' 
                                    AND a.`alur_perkara_id`=15 ORDER BY a.`perkara_id` ASC");
        return $query; 
    } 
    // perkara P BHT
}