<?php
class M_menu extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function tampil_pihak_kosong(){
        $query = $this->db->query("SELECT DATE_FORMAT(tanggal_pendaftaran, '%d/%m/%Y') AS tanggal_pendaftaran, jenis_perkara_nama, nomor_perkara, pihak1_text 
        FROM perkara WHERE YEAR( tanggal_pendaftaran) > 2017 AND pihak1_text='' ORDER BY perkara_id DESC");
        return $query; 
    } 

    function edoc_petitum_kosong(){
        $query = $this->db->query("SELECT DATE_FORMAT(tanggal_pendaftaran, '%d/%m/%Y') AS tanggal_pendaftaran, jenis_perkara_nama, nomor_perkara, petitum_dok
        FROM perkara WHERE YEAR( tanggal_pendaftaran) > 2017 AND petitum_dok ='' ORDER BY perkara_id DESC");
        return $query; 
    }

    function tampil_pmh(){
        $query = $this->db->query("SELECT a.perkara_id, a.tanggal_pendaftaran, a.jenis_perkara_nama, a.nomor_perkara,
                                    b.penetapan_majelis_hakim,
                                    c.tanggal_putusan, c.status_putusan_nama
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NULL
                                    ORDER BY perkara_id DESC");
        return $query; 
    }

    function tampil_pp(){
        $query = $this->db->query("SELECT a.perkara_id, a.tanggal_pendaftaran, a.jenis_perkara_nama, a.nomor_perkara,
                                    b.penetapan_majelis_hakim, b.penetapan_panitera_pengganti,
                                    c.tanggal_putusan, c.status_putusan_nama
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NOT NULL
                                    AND b.panitera_pengganti_id IS NULL
                                    ORDER BY perkara_id DESC ");
        return $query; 
    }

    function tampil_js(){
        $query = $this->db->query("SELECT a.perkara_id, a.tanggal_pendaftaran, a.jenis_perkara_nama, a.nomor_perkara,
                                    b.penetapan_majelis_hakim, b.penetapan_panitera_pengganti, b.penetapan_jurusita, b.jurusita_text,
                                    c.tanggal_putusan, c.status_putusan_nama
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NOT NULL
                                    AND b.panitera_pengganti_id IS NOT NULL
                                    AND b.jurusita_id IS NULL
                                    ORDER BY perkara_id DESC ");
        return $query; 
    }
 
    function tampil_phs(){
        $query = $this->db->query(" SELECT a.perkara_id, a.tanggal_pendaftaran, a.jenis_perkara_nama, a.nomor_perkara,
                                    b.majelis_hakim_id, b.penetapan_majelis_hakim, b.majelis_hakim_nama, 
                                    SUBSTRING(b.panitera_pengganti_text,21) AS pp,
                                    SUBSTRING(b.jurusita_text,21) AS js,
                                    b.penetapan_hari_sidang
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NOT NULL
                                    AND b.penetapan_hari_sidang IS NULL
                                    AND b.panitera_pengganti_id IS NOT NULL
                                    AND b.jurusita_id IS NOT NULL
                                    ORDER BY perkara_id DESC ");
        return $query; 
    }

    function jadwal_sidang(){

    }

    function cek_putus(){
        $query = $this->db->query("SELECT a.perkara_id, b.nomor_perkara,
                                    DATE_FORMAT(b.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran, c.hakim_nama, d.panitera_nama,
                                    DATE_FORMAT(e.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,
                                    DATE_FORMAT(a.tanggal_transaksi,'%d/%m/%Y') tanggal_transaksi 
                                    FROM perkara_biaya AS a 
                                    LEFT JOIN perkara AS b 
                                    ON a.perkara_id = b.perkara_id 
                                    RIGHT JOIN perkara_hakim_pn AS c 
                                    ON a.perkara_id = c.perkara_id 
                                    RIGHT JOIN perkara_panitera_pn AS d 
                                    ON a.perkara_id = d.perkara_id 
                                    LEFT JOIN perkara_putusan AS e 
                                    ON a.perkara_id = e.perkara_id 
                                    WHERE a.tanggal_transaksi IS NOT NULL 
                                    AND e.tanggal_putusan IS NULL
                                    AND a.jenis_biaya_id = '157' 
                                    AND c.urutan = '1' 
                                    AND c.aktif = 'Y' 
                                    AND d.aktif = 'Y' 
                                    ORDER BY c.hakim_nama ASC");
    return $query; 
    }

    function putminut(){
        $query = $this->db->query("SELECT a.nomor_perkara, c.`hakim_nama`,d.`panitera_nama`,
                                    DATE_FORMAT(b.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,b.status_putusan_nama, b.amar_putusan, b.tanggal_minutasi 
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.perkara_id = b.perkara_id 
                                    LEFT JOIN perkara_hakim_pn AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE b.tanggal_putusan IS NOT NULL 
                                    AND c.`jabatan_hakim_id`=1
                                    AND b.tanggal_minutasi IS NULL
                                    ORDER BY c.`hakim_id`");
    return $query; 
    }
   
    function put_trans(){
        $query = $this->db->query("SELECT a.`perkara_id`, 
                                    DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y')AS tanggal_pendaftaran,
                                    a.`pihak1_text`,a.`pihak2_text`,a.`nomor_perkara`,c.`hakim_nama`,d.`panitera_nama`,
                                    DATE_FORMAT(b.`tanggal_putusan`,'%d/%m/%Y') AS tanggal_putusan
                                    FROM perkara AS a
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS c ON a.perkara_id = c.perkara_id 
                                    LEFT JOIN perkara_panitera_pn AS d ON a.perkara_id = d.perkara_id 
                                    WHERE a.`perkara_id` NOT IN (SELECT e.perkara_id 
                                                FROM	perkara_biaya AS e 
                                                WHERE e.jenis_biaya_id = '157') 
                                    AND DATE_FORMAT(a.`tanggal_pendaftaran`,'%Y')>2017
                                    AND b.`tanggal_putusan`IS NOT NULL
                                    AND a.`prodeo`= 0
                                    GROUP BY perkara_id");
    return $query; 
    }

    function doc_putus(){
        $query = $this->db->query("SELECT a.perkara_id, a.nomor_perkara, c.hakim_nama, d.panitera_nama,
	                                DATE_FORMAT(e.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan, b.amar_putusan_dok
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b 
                                    ON a.perkara_id = b.perkara_id 
                                    RIGHT JOIN perkara_hakim_pn AS c 
                                    ON a.perkara_id = c.perkara_id 
                                    RIGHT JOIN perkara_panitera_pn AS d 
                                    ON a.perkara_id = d.perkara_id 
                                    LEFT JOIN perkara_putusan AS e 
                                    ON a.perkara_id = e.perkara_id 
                                    WHERE YEAR( tanggal_pendaftaran) > 2017 
                                    AND c.`jabatan_hakim_id`=1
                                    AND e.tanggal_putusan IS NOT NULL
                                    AND b.amar_putusan_dok IS NULL
                                    ORDER BY c.hakim_nama ASC");
    return $query; 
    }

    function doc_anon_putus(){
        $query = $this->db->query("SELECT a.perkara_id, a.nomor_perkara,
                                    DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran, b.hakim_nama, c.panitera_nama,
                                    DATE_FORMAT(d.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,
                                    d.`amar_putusan_anonimisasi_dok`
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_hakim_pn AS b
                                    ON a.perkara_id = b.perkara_id 
                                    LEFT JOIN perkara_panitera_pn AS c
                                    ON a.perkara_id = c.perkara_id 
                                    LEFT JOIN perkara_putusan AS d 
                                    ON a.perkara_id = d.perkara_id 
                                    WHERE d.tanggal_putusan IS NOT NULL
									AND d.`amar_putusan_dok` IS NOT NULL
                                    AND d.`amar_putusan_anonimisasi_dok` IS NULL 
                                    AND b.`jabatan_hakim_id`=1
                                    AND DATE_FORMAT(a.`tanggal_pendaftaran`,'%Y') > 2017
                                    ORDER BY b.hakim_nama ASC");
    return $query; 
    }
// putus hadir
    function putus_hdr_cg(){
        $query = $this->db->query("SELECT a.perkara_id, a.nomor_perkara,
                                    c.tanggal_sidang, c.dihadiri_oleh,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_ac,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih,
                                    f.`alamat`
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.perkara_id=b.perkara_id
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.perkara_id=c.perkara_id
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.perkara_id=d.perkara_id
                                    LEFT JOIN perkara_akta_cerai AS e ON a.perkara_id=e.perkara_id
                                    LEFT JOIN perkara_pihak2 AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    WHERE b.tanggal_putusan =c.tanggal_sidang
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.tgl_akta_cerai IS NULL
                                    AND c.dihadiri_oleh='1'
                                    AND b.putusan_verstek='T'
                                    AND b.status_putusan_id=62
                                    AND a.jenis_perkara_id=347
                                    GROUP BY nomor_perkara DESC");
    return $query; 
    }
    // putus ct hadir phs ikrar
    function putus_hdr_ct(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 15 DAY),CURDATE()) AS selisih
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
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
    // CT hadir Gugur
    function putus_hdr_ct_gugur(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan, 
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur,
                                    DATEDIFF(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),CURDATE()) AS selisih
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
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
    // luar hadir ##########################   SNIFF   #############################################
    // cg PBT
    function putus_lhdr_cg_pbt(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    DATEDIFF(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),CURDATE()) AS selisih,
                                    e.`alamat`
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS e ON a.`perkara_id`=e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND d.`tanggal_pemberitahuan_putusan` IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='T'
                                    AND b.status_putusan_id=62
                                    AND a.`jenis_perkara_id`=347
                                    GROUP BY nomor_perkara DESC");
    return $query; 
    }
    // cg akte cerai
    function putus_lhdr_cg_ac(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    DATE_FORMAT(c.tanggal_sidang,'%d %M %Y') AS tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(d.tanggal_pemberitahuan_putusan,'%d %M %Y') AS tgl_bht,
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
                                    GROUP BY nomor_perkara DESC");
    return $query; 
    }
    // CT luar hadir pbt
    function putus_lhdr_ct_pbt(){
        $query = $this->db->query("SELECT a.perkara_id,a.`jenis_perkara_nama`, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan, 
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
				                    g.alamat
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_pihak2 AS g ON a.`perkara_id`=g.`perkara_id`
                                    LEFT JOIN perkara_banding AS h ON a.`perkara_id`=h.`perkara_id`
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
    // CT Luar hadir PHS ikrar
    function putus_lhdr_ct_phs(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(d.`tanggal_pemberitahuan_putusan`,'%d %M %Y') AS tanggal_pbt,
                                    DATE_FORMAT(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
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
    // luar hadir gugur
    function putus_lhdr_ct_gugur(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
                                    LEFT JOIN perkara_akta_cerai AS f ON a.`perkara_id`=f.`perkara_id`
                                    LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND f.`tgl_akta_cerai` IS NULL
                                    AND e.`tgl_ikrar_talak` IS NOT NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.status_putusan_id=62
                                    AND b.`putusan_verstek`='T'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC");
        return $query; 
    } 

     // verstek ##########################   SNIFF   #############################################
    
    function putus_v_cg_pbt(){
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
    // cg verstek ac
    function putus_v_cg_ac(){
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

    // verstek CT pbt
    function putus_v_ct_pbt(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y')AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(b.tanggal_putusan, INTERVAL 7 DAY),'%d %M %Y') AS expire_pbt,
                                    g.`alamat`
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
				                    LEFT JOIN perkara_pihak2 AS g ON a.`perkara_id`=g.`perkara_id`
				                    LEFT JOIN perkara_banding AS h ON a.`perkara_id`=h.`perkara_id`
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

    // verstek CT phs ikrar
    function putus_v_ct_phs(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan,'%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(d.tanggal_pemberitahuan_putusan, INTERVAL 15 DAY),'%d %M %Y') AS expire_phs_ikrar
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
									LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
                                    WHERE b.`tanggal_putusan` =c.`tanggal_sidang`
                                    AND DATE_FORMAT(a.tanggal_pendaftaran, '%Y') >2017
                                    AND g.`tanggal_pendaftaran_banding`IS NULL
                                    AND e.`tgl_ikrar_talak` IS NULL
									AND f.tgl_akta_cerai IS NULL
                                    AND c.`dihadiri_oleh`='2'
                                    AND b.`putusan_verstek`='Y'
                                    AND a.`jenis_perkara_id`=346
                                    GROUP BY nomor_perkara DESC");
        return $query;  
    } 
    // verstek CT gugur 
    function putus_v_ct_gugur(){
        $query = $this->db->query("SELECT a.perkara_id, a.`nomor_perkara`,
                                    c.tanggal_sidang,c.dihadiri_oleh ,
                                    DATE_FORMAT(b.tanggal_putusan, '%d %M %Y') AS tanggal_putusan,
                                    DATE_FORMAT(DATE_ADD(e.tgl_ikrar_talak, INTERVAL 6 MONTH),'%d %M %Y') AS expire_gugur
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_putusan_pemberitahuan_putusan AS d ON a.`perkara_id`=d.`perkara_id`
                                    LEFT JOIN perkara_ikrar_talak AS e ON a.`perkara_id`= e.`perkara_id`
									LEFT JOIN perkara_akta_cerai AS f ON a.perkara_id=f.perkara_id
									LEFT JOIN perkara_banding AS g ON a.`perkara_id`=g.`perkara_id`
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
}
?>