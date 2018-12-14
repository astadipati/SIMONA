<?php
class M_cerai_gugat extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    // CG Hadir AC
    function tampil_cg_hadir(){
        $query = $this->db->query("SELECT a.perkara_id, a.nomor_perkara,
                                    c.tanggal_sidang, c.dihadiri_oleh,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_ac,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    f.`alamat`,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.perkara_id=b.perkara_id
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.perkara_id=c.perkara_id
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.perkara_id=d.perkara_id
                                    LEFT JOIN perkara_akta_cerai AS e ON a.perkara_id=e.perkara_id
                                    LEFT JOIN perkara_pihak2 AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.tanggal_putusan =c.tanggal_sidang
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.tgl_akta_cerai IS NULL
                                    AND c.dihadiri_oleh='1'
                                    AND b.putusan_verstek='T'
                                    AND b.status_putusan_id=62
                                    AND a.jenis_perkara_id=347
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    
    function tampilkan_cg_hadir_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.nomor_perkara,
                                    c.tanggal_sidang, c.dihadiri_oleh,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_ac,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    f.`alamat`,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.perkara_id=b.perkara_id
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.perkara_id=c.perkara_id
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.perkara_id=d.perkara_id
                                    LEFT JOIN perkara_akta_cerai AS e ON a.perkara_id=e.perkara_id
                                    LEFT JOIN perkara_pihak2 AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.tanggal_putusan =c.tanggal_sidang
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.tgl_akta_cerai IS NULL
                                    AND c.dihadiri_oleh='1'
                                    AND b.putusan_verstek='T'
                                    AND b.status_putusan_id=62
                                    AND a.jenis_perkara_id=347
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }

    function tampil_cg_luar_hadir_pbt(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),CURDATE()) AS selisih,
                                    e.`alamat`,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND d.`tanggal_pemberitahuan_putusan` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='T'
                                    AND b.status_putusan_id=62
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    
    function tampilkan_cg_luar_hadir_pbt_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),CURDATE()) AS selisih,
                                    e.`alamat`,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND d.`tanggal_pemberitahuan_putusan` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='T'
                                    AND b.status_putusan_id=62
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
    function tampil_cg_luar_hadir_ac(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    DATE_FORMAT(c.tanggal_sidang,'%d %M %Y') AS tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
									DATE_FORMAT(d.tanggal_pemberitahuan_putusan,'%d %M %Y') AS tanggal_pbt,
                                    DATE_FORMAT(b.tanggal_bht,'%d %M %Y') AS tanggal_bht,
                                    DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY) AS expire_ac,
                                    DATEDIFF(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                     f.`alamat`
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62                                   
                                    AND e.`tgl_akta_cerai` IS NULL
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 
    
    function tampilkan_cg_luar_hadir_ac_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    DATE_FORMAT(c.tanggal_sidang,'%d %M %Y') AS tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(d.tanggal_pemberitahuan_putusan,'%d %M %Y') AS tanggal_pbt,
                                    DATE_FORMAT(b.tanggal_bht,'%d %M %Y') AS tanggal_bht,
                                    DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY) AS expire_ac,
                                    DATEDIFF(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    f.`alamat`,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62                                   
                                    AND e.`tgl_akta_cerai` IS NULL
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }

    function tampil_cg_verstek_pbt(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    DATE_FORMAT(c.tanggal_sidang,'%d %M %Y')AS tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y')AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
				                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),CURDATE()) AS selisih,                                    
                                    f.`alamat`,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
			                        LEFT JOIN perkara_akta_cerai AS e ON a.perkara_id=e.perkara_id
				                    LEFT JOIN perkara_pihak2 AS f ON a.`perkara_id`=f.`perkara_id`
				                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
				                    LEFT JOIN perkara_verzet AS k ON a.`perkara_id`=k.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND k.`tanggal_pendaftaran_verzet`IS NULL
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND b.status_putusan_id=62
                                    AND e.tgl_akta_cerai IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 

    function tampilkan_cg_verstek_pbt_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    DATE_FORMAT(c.tanggal_sidang,'%d %M %Y')AS tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y')AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
				                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),CURDATE()) AS selisih,                                    
                                    f.`alamat`,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
			                        LEFT JOIN perkara_akta_cerai AS e ON a.perkara_id=e.perkara_id
				                    LEFT JOIN perkara_pihak2 AS f ON a.`perkara_id`=f.`perkara_id`
				                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
				                    LEFT JOIN perkara_verzet AS k ON a.`perkara_id`=k.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND k.`tanggal_pendaftaran_verzet`IS NULL
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND b.status_putusan_id=62
                                    AND e.tgl_akta_cerai IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }

    function tampil_cg_verstek_ac(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    DATE_FORMAT(c.tanggal_sidang,'%d %M %Y')AS tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(d.tanggal_pemberitahuan_putusan,'%d %M %Y') AS tanggal_pbt,
                                    DATE_FORMAT(b.tanggal_bht,'%d %M %Y') AS tanggal_bht,
                                    e.`nomor_akta_cerai`,
                                    DATE_FORMAT(DATE_ADD(b.`tanggal_bht`, INTERVAL 15 DAY),'%d %M %Y') AS expire_ac,
                                    DATEDIFF(DATE_ADD(b.`tanggal_bht`, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    LEFT JOIN perkara_verzet AS k ON a.`perkara_id`=k.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND k.`tanggal_pendaftaran_verzet`IS NULL
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`nomor_akta_cerai` IS NULL
                                    AND c.`dihadiri_oleh`='2'
									AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC ");
        return $query; 
    } 
 
    function tampilkan_cg_verstek_ac_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    DATE_FORMAT(c.tanggal_sidang,'%d %M %Y')AS tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(d.tanggal_pemberitahuan_putusan,'%d %M %Y') AS tanggal_pbt,
                                    DATE_FORMAT(b.tanggal_bht,'%d %M %Y') AS tanggal_bht,
                                    e.`nomor_akta_cerai`,
                                    DATE_FORMAT(DATE_ADD(b.`tanggal_bht`, INTERVAL 15 DAY),'%d %M %Y') AS expire_ac,
                                    DATEDIFF(DATE_ADD(b.`tanggal_bht`, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    h.`hakim_nama`, i.`panitera_nama`,
                                    SUBSTRING(j.jurusita_text,21) AS jurusita_text
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS h ON a.`perkara_id`=h.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS i ON a.`perkara_id`=i.`perkara_id`
                                    LEFT JOIN perkara_penetapan AS j ON a.`perkara_id`=j.`perkara_id`
                                    LEFT JOIN perkara_verzet AS k ON a.`perkara_id`=k.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND k.`tanggal_pendaftaran_verzet`IS NULL
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`nomor_akta_cerai` IS NULL
                                    AND c.`dihadiri_oleh`='2'
									AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC limit $halaman, $offset");
    }
}