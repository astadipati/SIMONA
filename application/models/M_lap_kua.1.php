<?php

class M_lap_kua extends CI_Model{

    function laporan_kua(){
        $query = $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_id`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`pekerjaan`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`pekerjaan` AS pekerjaan2,p2.`alamat` AS alamat2,
                                    a.`jenis_perkara_id` AS hukum,
                                    e.`qobla_bada`,e.`faktor_perceraian_id`,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2017
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL ORDER BY e.`nomor_akta_cerai` DESC");
        return $query; 
    } 

    function tampilkan_data_paging($halaman, $offset){
        return $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_id`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`pekerjaan`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`pekerjaan` AS pekerjaan2,p2.`alamat` AS alamat2,
                                    a.`jenis_perkara_id` AS hukum,
                                    e.`qobla_bada`,e.`faktor_perceraian_id`,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2017
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL ORDER BY e.`nomor_akta_cerai` DESC limit $halaman, $offset");
    }

    function laporan_kua_periode($tanggal1, $tanggal2){
        $query = $this->db->query("SELECT a.`nomor_perkara`,a.`jenis_perkara_id`,f.`tgl_nikah`,d.`tanggal_bht`,
                                    DATE_FORMAT(d.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan,
                                    b.`nama`,p1.`pendidikan_id` AS pend1,p1.`pekerjaan`,p1.`alamat`,
                                    c.`nama` AS nama2,p2.`pendidikan_id` AS pend2,p2.`alamat` AS alamat2,p2.`pekerjaan` AS pekerjaan2,p2.`alamat` AS alamat2,
                                    a.`jenis_perkara_id` AS hukum,
                                    e.`qobla_bada`,e.`faktor_perceraian_id`,e.`nomor_akta_cerai`,
                                    DATE_FORMAT(e.`tgl_akta_cerai`,'%d/%m/%Y')AS tgl_akta_cerai,
                                    f.`no_kutipan_akta_nikah`, 
                                    DATE_FORMAT(f.`tgl_kutipan_akta_nikah`,'%d/%m/%Y')AS tgl_kutipan_akta_nikah,f.`kua_tempat_nikah`,e.`keadaan_istri`,
                                    TIMESTAMPDIFF(YEAR,f.`tgl_nikah`, d.`tanggal_bht`) AS lama_nikah
                                    FROM perkara AS a
                                    INNER JOIN perkara_pihak1 AS b ON a.`perkara_id` = b.perkara_id 
                                    INNER JOIN pihak AS p1 ON b.`pihak_id`=p1.`id`
                                    INNER JOIN perkara_pihak2 AS c ON a.`perkara_id`=c.`perkara_id` 
                                    INNER JOIN pihak AS p2 ON c.`pihak_id`=p2.`id`
                                    LEFT JOIN perkara_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_data_pernikahan AS f ON a.`perkara_id`=f.`perkara_id`
                                    WHERE YEAR(a.tanggal_pendaftaran) > 2017
                                    AND d.`tanggal_putusan` IS NOT NULL
                                    AND d.`status_putusan_id`=62
                                    AND e.`tgl_akta_cerai`  IS NOT NULL
                                    AND e.tgl_akta_cerai BETWEEN '$tanggal1' AND '$tanggal2' 
                                    ORDER BY e.`nomor_akta_cerai` ASC ");
        return $query; 
    } 
}