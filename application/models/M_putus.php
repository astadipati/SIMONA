<?php

class M_putus extends CI_Model{
    function tampilkan_cek_putus(){
        $query = $this->db->query("SELECT a.perkara_id, b.nomor_perkara,
                                    DATE_FORMAT(b.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran, c.hakim_nama, d.panitera_nama,
                                    DATE_FORMAT(e.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,
                                    DATE_FORMAT(a.tanggal_transaksi,'%d/%m/%Y') tanggal_transaksi 
                                    FROM perkara_biaya AS a 
                                    LEFT JOIN perkara AS b 
                                    ON a.perkara_id = b.perkara_id 
                                    LEFT JOIN perkara_hakim_pn AS c 
                                    ON a.perkara_id = c.perkara_id 
                                    LEFT JOIN perkara_panitera_pn AS d 
                                    ON a.perkara_id = d.perkara_id 
                                    LEFT JOIN perkara_putusan AS e 
                                    ON a.perkara_id = e.perkara_id 
                                    WHERE a.tanggal_transaksi IS NOT NULL 
                                    AND e.tanggal_putusan IS NULL
                                    AND a.jenis_biaya_id = '157' 
                                    AND c.`jabatan_hakim_id`=1
                                    ORDER BY c.hakim_nama ASC");
        return $query; 
    }

    function tampil_cek_putus_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, b.nomor_perkara,
                                    DATE_FORMAT(b.tanggal_pendaftaran,'%d/%m/%Y') AS tanggal_pendaftaran, c.hakim_nama, d.panitera_nama,
                                    DATE_FORMAT(e.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,
                                    DATE_FORMAT(a.tanggal_transaksi,'%d/%m/%Y') tanggal_transaksi 
                                    FROM perkara_biaya AS a 
                                    LEFT JOIN perkara AS b 
                                    ON a.perkara_id = b.perkara_id 
                                    LEFT JOIN perkara_hakim_pn AS c 
                                    ON a.perkara_id = c.perkara_id 
                                    LEFT JOIN perkara_panitera_pn AS d 
                                    ON a.perkara_id = d.perkara_id 
                                    LEFT JOIN perkara_putusan AS e 
                                    ON a.perkara_id = e.perkara_id 
                                    WHERE a.tanggal_transaksi IS NOT NULL 
                                    AND e.tanggal_putusan IS NULL
                                    AND a.jenis_biaya_id = '157' 
                                    AND c.`jabatan_hakim_id`=1
                                    ORDER BY c.hakim_nama ASC limit $halaman, $offset");
    }
    // edoc put
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

    function doc_putus_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.nomor_perkara, c.hakim_nama, d.panitera_nama,
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
                                    ORDER BY c.hakim_nama ASC limit $halaman, $offset");
    }
    // edoc put
    function doc_anon(){
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

    function doc_anon_paging($halaman, $offset){
        return $this->db->query("SELECT a.perkara_id, a.nomor_perkara,
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
                                    ORDER BY b.hakim_nama ASC limit $halaman, $offset");
    }
    // putus minut
    function put_minut(){
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

    function put_minut_paging($halaman, $offset){
        return $this->db->query("SELECT a.nomor_perkara, c.`hakim_nama`,d.`panitera_nama`,
                                    DATE_FORMAT(b.tanggal_putusan,'%d/%m/%Y') AS tanggal_putusan,b.status_putusan_nama, b.amar_putusan, b.tanggal_minutasi 
                                    FROM perkara AS a 
                                    LEFT JOIN perkara_putusan AS b ON a.perkara_id = b.perkara_id 
                                    LEFT JOIN perkara_hakim_pn AS c ON a.`perkara_id`=c.`perkara_id`
                                    LEFT JOIN perkara_panitera_pn AS d ON a.`perkara_id`=d.`perkara_id`
                                    WHERE b.tanggal_putusan IS NOT NULL 
                                    AND c.`jabatan_hakim_id`=1
                                    AND b.tanggal_minutasi IS NULL
                                    ORDER BY c.`hakim_id` limit $halaman, $offset");
    }

    function put_transaksi(){
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
                                    GROUP BY perkara_id ");
    return $query; 
    }

    function put_transaksi_paging($halaman, $offset){
        return $this->db->query("SELECT a.`perkara_id`, 
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
                                    GROUP BY perkara_id limit $halaman, $offset");
    }



}