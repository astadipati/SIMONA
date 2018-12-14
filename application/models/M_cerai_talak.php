<?php

class M_cerai_talak extends CI_Model{

    function tampil_ct_hadir(){
        // phs ikrar
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                     h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
									AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
									AND f.`tgl_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND c.`dihadiri_oleh`='1'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346 
                                    GROUP BY nomor_perkara DESC");
        return $query; 
    } 

    function tampilkan_ct_hadir_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                     h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
									AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
									AND f.`tgl_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND c.`dihadiri_oleh`='1'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346 
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
    // hadir gugur 
    // ditemukan perkara crai talak 6 bulan tanggal ikrar masih kosong tinggal ganti tgl_ikrar dengan null
    function tampil_ct_hadir_gugur(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan, 
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur,
                                    DATEDIFF(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tahun_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NOT NULL
                                    AND c.`dihadiri_oleh`='1'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC");
        return $query; 
    } 

    function tampilkan_ct_hadir_gugur_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan, 
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur,
                                    DATEDIFF(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tahun_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NOT NULL
                                    AND c.`dihadiri_oleh`='1'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
// luar hadir pbt
    function tampil_ct_luar_hadir_pbt(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan, 
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    DATEDIFF(DATE_ADD(b.`tanggal_putusan`, INTERVAL 7 DAY),CURDATE()) AS selisih,
				                    g.alamat,
                                    k.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_banding AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS k ON a.`perkara_id`=k.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND h.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tgl_akta_cerai`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 
// luar hadir pbt
    function tampilkan_ct_luar_hadir_pbt_paging($halaman, $offset){
        return $this->db->query(" SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan, 
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    DATEDIFF(DATE_ADD(b.`tanggal_putusan`, INTERVAL 7 DAY),CURDATE()) AS selisih,
				                    g.alamat,
                                    k.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_banding AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS k ON a.`perkara_id`=k.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND h.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tgl_akta_cerai`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
// luar hadir phs ikrar
    function tampil_ct_luar_hadir_phs_ikrar(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(d.`tanggal_pemberitahuan_putusan`,'%d %M %Y') AS tanggal_pbt,
                                    DATE_FORMAT(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar,
                                    DATEDIFF(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    function tampilkan_ct_luar_hadir_phs_ikrar_paging($halaman, $offset){
        return $this->db->query(" SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(d.`tanggal_pemberitahuan_putusan`,'%d %M %Y') AS tanggal_pbt,
                                    DATE_FORMAT(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar,
                                    DATEDIFF(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
// luar hadir gugur
    function tampil_ct_luar_hadir_gugur(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur,
                                    DATEDIFF(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NOT NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    function tampilkan_ct_luar_hadir_gugur_paging($halaman, $offset){
        return $this->db->query(" SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur,
                                    DATEDIFF(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NOT NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
// verstek pbt
    function tampil_ct_verstek_pbt(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y')AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),CURDATE()) AS selisih,
                                    g.`alamat`,
                                    k.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
				                    LEFT JOIN perkara_pihak2 AS g ON a.`perkara_id`=g.`perkara_id`
				                    LEFT JOIN perkara_banding AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS k ON a.`perkara_id`=k.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND d.`tanggal_pemberitahuan_putusan` IS NULL
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND h.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND f.`tgl_akta_cerai`IS NULL
									AND b.status_putusan_id=62
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    function tampilkan_ct_verstek_pbt_paging($halaman, $offset){
        return $this->db->query(" SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y')AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),CURDATE()) AS selisih,
                                    g.`alamat`,
                                    k.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
				                    LEFT JOIN perkara_pihak2 AS g ON a.`perkara_id`=g.`perkara_id`
				                    LEFT JOIN perkara_banding AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS k ON a.`perkara_id`=k.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND d.`tanggal_pemberitahuan_putusan` IS NULL
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND h.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
                                    AND f.`tgl_akta_cerai`IS NULL
									AND b.status_putusan_id=62
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
// verstek phs ikrar
    function tampil_ct_verstek_phs_ikrar(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    d.`tanggal_pemberitahuan_putusan`,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar,
                                    DATEDIFF(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
									LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
									AND f.tgl_akta_cerai IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    function tampilkan_ct_verstek_phs_ikrar_paging($halaman, $offset){
        return $this->db->query(" SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    d.`tanggal_pemberitahuan_putusan`,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar,
                                    DATEDIFF(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
									LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
									AND f.tgl_akta_cerai IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
// verstek gugur
    function tampil_ct_verstek_gugur(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
									LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NOT NULL
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    function tampilkan_ct_verstek_gugur_paging($halaman, $offset){
        return $this->db->query(" SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
									LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NOT NULL
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }

}