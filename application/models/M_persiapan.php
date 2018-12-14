<?php
class M_persiapan extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function tampil_pmh(){
        $query = $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran,
                                    a.jenis_perkara_nama, a.nomor_perkara,
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

    function tampil_pmh_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran,
                                    a.jenis_perkara_nama, a.nomor_perkara,
                                    b.penetapan_majelis_hakim,
                                    c.tanggal_putusan, c.status_putusan_nama
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NULL
                                    ORDER BY perkara_id DESC limit $halaman, $offset");
    }
    // pp
    function tampil_pp(){
        $query = $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran,
				                    a.jenis_perkara_nama, a.nomor_perkara,
                                    DATE_FORMAT(b.penetapan_majelis_hakim,'%d/%m/%Y') AS penetapan_majelis_hakim,
                                    b.penetapan_panitera_pengganti,
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

    function tampil_pp_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran,
				                    a.jenis_perkara_nama, a.nomor_perkara,
                                    DATE_FORMAT(b.penetapan_majelis_hakim,'%d/%m/%Y') AS penetapan_majelis_hakim,
                                    b.penetapan_panitera_pengganti,
                                    c.tanggal_putusan, c.status_putusan_nama
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NOT NULL
                                    AND b.panitera_pengganti_id IS NULL
                                    ORDER BY perkara_id DESC limit $halaman, $offset");
    }
    // js jsp
    function tampil_js(){
        $query = $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran, a.jenis_perkara_nama, a.nomor_perkara,
                                    DATE_FORMAT(b.penetapan_majelis_hakim,'%d/%m/%Y')AS penetapan_majelis_hakim,
                                    DATE_FORMAT(b.penetapan_panitera_pengganti,'%d/%m/%Y')AS penetapan_panitera_pengganti,
                                    b.penetapan_jurusita, b.jurusita_text,
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

    function tampil_js_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran, a.jenis_perkara_nama, a.nomor_perkara,
                                    DATE_FORMAT(b.penetapan_majelis_hakim,'%d/%m/%Y')AS penetapan_majelis_hakim,
                                    DATE_FORMAT(b.penetapan_panitera_pengganti,'%d/%m/%Y')AS penetapan_panitera_pengganti,
                                    b.penetapan_jurusita, b.jurusita_text,
                                    c.tanggal_putusan, c.status_putusan_nama
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NOT NULL
                                    AND b.panitera_pengganti_id IS NOT NULL
                                    AND b.jurusita_id IS NULL
                                    ORDER BY perkara_id DESC limit $halaman, $offset");
    }
    // PHS
    function tampil_phs(){
        $query = $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran,
				                    a.jenis_perkara_nama, a.nomor_perkara,
                                    b.majelis_hakim_id, 
                                    DATE_FORMAT(b.penetapan_majelis_hakim,'%d/%m/%Y')AS penetapan_majelis_hakim,
                                    b.majelis_hakim_nama, 
                                    SUBSTRING(b.panitera_pengganti_text,21) AS pp,
                                    SUBSTRING(b.jurusita_text,21) AS js,
                                    b.penetapan_hari_sidang
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NOT NULL
                                    AND b.`penetapan_hari_sidang` IS NULL
                                    AND b.panitera_pengganti_id IS NOT NULL
                                    AND b.jurusita_id IS NOT NULL
                                    ORDER BY b.majelis_hakim_nama ASC ");
        return $query; 
    }

    function tampil_phs_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, DATE_FORMAT(a.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran,
				                    a.jenis_perkara_nama, a.nomor_perkara,
                                    b.majelis_hakim_id, 
                                    DATE_FORMAT(b.penetapan_majelis_hakim,'%d/%m/%Y')AS penetapan_majelis_hakim,
                                    b.majelis_hakim_nama, 
                                    SUBSTRING(b.panitera_pengganti_text,21) AS pp,
                                    SUBSTRING(b.jurusita_text,21) AS js,
                                    b.penetapan_hari_sidang
                                    FROM perkara AS a
                                    LEFT JOIN perkara_penetapan AS b ON a.perkara_id = b.perkara_id
                                    LEFT JOIN perkara_putusan AS c ON a.perkara_id = c.perkara_id
                                    WHERE c.tanggal_putusan IS NULL
                                    AND b.penetapan_majelis_hakim IS NOT NULL
                                    AND b.`penetapan_hari_sidang` IS NULL
                                    AND b.panitera_pengganti_id IS NOT NULL
                                    AND b.jurusita_id IS NOT NULL
                                    ORDER BY b.majelis_hakim_nama ASC limit $halaman, $offset");
    }

}
?>