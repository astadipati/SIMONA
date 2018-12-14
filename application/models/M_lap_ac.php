<?php

class M_lap_ac extends CI_Model{
 
    function laporan_akte(){
        $query = $this->db->query("SELECT a.nomor_akta_cerai, DATE_FORMAT (a.tgl_akta_cerai, '%d/%m/%Y') AS tgl_ac, a.no_seri_akta_cerai,
                                DATE_FORMAT(a.`tgl_penyerahan_akta_cerai`,'%d/%m/%Y') AS serah1,
                                DATE_FORMAT(a.`tgl_penyerahan_akta_cerai_pihak2`,'%d/%m/%Y') AS serah2,a.`perceraian_ke`,
                                b.`jenis_perkara_id`,b.nomor_perkara, b.pihak1_text, b.pihak2_text,
                                DATE_FORMAT (c.tanggal_putusan, '%d/%m/%Y') AS tgl_put, DATE_FORMAT (c.tanggal_bht, '%d/%m/%Y') AS tgl_bht,
                                DATE_FORMAT (d.tgl_ikrar_talak, '%d/%m/%Y') AS tgl_ikrar,
                                DATE_FORMAT (e.tgl_kutipan_akta_nikah, '%d/%m/%Y') AS tgl_kutipan, e.no_kutipan_akta_nikah,
                                SUBSTRING(e.kua_tempat_nikah,21) AS kua,
                                DATE_FORMAT(f.`putusan_banding`, '%d/%m/%Y') AS putusan_banding,
                                DATE_FORMAT(g.`putusan_kasasi`, '%d/%m/%Y') AS putusan_kasasi
                                FROM perkara_akta_cerai AS a
                                LEFT JOIN perkara AS b ON a.perkara_id = b.perkara_id
                                LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id 
                                LEFT JOIN perkara_ikrar_talak AS d ON a.perkara_id = d.perkara_id 
                                LEFT JOIN perkara_data_pernikahan AS e ON a.perkara_id = e.perkara_id 
                                LEFT JOIN perkara_banding AS f ON a.`perkara_id`=f.`perkara_id`
                                LEFT JOIN perkara_kasasi AS g ON a.`perkara_id`=g.`perkara_id`
                                WHERE a.tgl_akta_cerai IS NOT NULL ORDER BY  a.nomor_akta_cerai DESC");
        return $query; 
    } 

    function tampilkan_data_paging($halaman, $offset){
        return $this->db->query("SELECT a.nomor_akta_cerai, DATE_FORMAT (a.tgl_akta_cerai, '%d/%m/%Y') AS tgl_ac, a.no_seri_akta_cerai,
                                DATE_FORMAT(a.`tgl_penyerahan_akta_cerai`,'%d/%m/%Y') AS serah1,
                                DATE_FORMAT(a.`tgl_penyerahan_akta_cerai_pihak2`,'%d/%m/%Y') AS serah2,a.`perceraian_ke`,
                                b.`jenis_perkara_id`,b.nomor_perkara, b.pihak1_text, b.pihak2_text,
                                DATE_FORMAT (c.tanggal_putusan, '%d/%m/%Y') AS tgl_put, DATE_FORMAT (c.tanggal_bht, '%d/%m/%Y') AS tgl_bht,
                                DATE_FORMAT (d.tgl_ikrar_talak, '%d/%m/%Y') AS tgl_ikrar,
                                DATE_FORMAT (e.tgl_kutipan_akta_nikah, '%d/%m/%Y') AS tgl_kutipan, e.no_kutipan_akta_nikah,
                                SUBSTRING(e.kua_tempat_nikah,21) AS kua,
                                DATE_FORMAT(f.`putusan_banding`, '%d/%m/%Y') AS putusan_banding,
                                DATE_FORMAT(g.`putusan_kasasi`, '%d/%m/%Y') AS putusan_kasasi
                                FROM perkara_akta_cerai AS a
                                LEFT JOIN perkara AS b ON a.perkara_id = b.perkara_id
                                LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id 
                                LEFT JOIN perkara_ikrar_talak AS d ON a.perkara_id = d.perkara_id 
                                LEFT JOIN perkara_data_pernikahan AS e ON a.perkara_id = e.perkara_id 
                                LEFT JOIN perkara_banding AS f ON a.`perkara_id`=f.`perkara_id`
                                LEFT JOIN perkara_kasasi AS g ON a.`perkara_id`=g.`perkara_id`
                                WHERE a.tgl_akta_cerai IS NOT NULL ORDER BY a.tgl_akta_cerai DESC limit $halaman, $offset");
    }

    function laporan_akte_periode($tanggal1, $tanggal2){
        $query = $this->db->query("SELECT a.nomor_akta_cerai, DATE_FORMAT (a.tgl_akta_cerai, '%d/%m/%Y') AS tgl_ac, a.no_seri_akta_cerai,
                                DATE_FORMAT(a.`tgl_penyerahan_akta_cerai`,'%d/%m/%Y') AS serah1,
                                DATE_FORMAT(a.`tgl_penyerahan_akta_cerai_pihak2`,'%d/%m/%Y') AS serah2,a.`perceraian_ke`,
                                b.`jenis_perkara_id`,b.nomor_perkara, b.pihak1_text, b.pihak2_text,
                                DATE_FORMAT (c.tanggal_putusan, '%d/%m/%Y') AS tgl_put, DATE_FORMAT (c.tanggal_bht, '%d/%m/%Y') AS tgl_bht,
                                DATE_FORMAT (d.tgl_ikrar_talak, '%d/%m/%Y') AS tgl_ikrar,
                                DATE_FORMAT (e.tgl_kutipan_akta_nikah, '%d/%m/%Y') AS tgl_kutipan, e.no_kutipan_akta_nikah,
                                SUBSTRING(e.kua_tempat_nikah,21) AS kua,
                                DATE_FORMAT(f.`putusan_banding`, '%d/%m/%Y') AS putusan_banding,
                                DATE_FORMAT(g.`putusan_kasasi`, '%d/%m/%Y') AS putusan_kasasi
                                FROM perkara_akta_cerai AS a
                                LEFT JOIN perkara AS b ON a.perkara_id = b.perkara_id
                                LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id 
                                LEFT JOIN perkara_ikrar_talak AS d ON a.perkara_id = d.perkara_id 
                                LEFT JOIN perkara_data_pernikahan AS e ON a.perkara_id = e.perkara_id 
                                LEFT JOIN perkara_banding AS f ON a.`perkara_id`=f.`perkara_id`
                                LEFT JOIN perkara_kasasi AS g ON a.`perkara_id`=g.`perkara_id`
                                WHERE a.tgl_akta_cerai BETWEEN '$tanggal1' AND '$tanggal2'
                                ORDER BY a.nomor_akta_cerai ASC");
        return $query; 
    } 
}