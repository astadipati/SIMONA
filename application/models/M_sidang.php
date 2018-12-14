<?php

class M_sidang extends CI_Model{ 
    function tampilkan_j_sidang(){
        $query = $this->db->query(" SELECT a.`nomor_perkara`, a.`pihak1_text`, a.`pihak2_text`,  a.`jenis_perkara_nama`,
                                    b.`ruangan`, 
                                    b.`agenda`,
                                    c.`hakim_id`, c.`hakim_nama`,
                                    (SELECT GROUP_CONCAT(CONCAT(perkara_hakim_pn.jabatan_hakim_nama,': ',hakim_pn.nama_gelar) SEPARATOR '<br/>')
                                    FROM perkara_hakim_pn
                                    LEFT JOIN hakim_pn ON hakim_pn.id=perkara_hakim_pn.hakim_id
                                    WHERE perkara_hakim_pn.perkara_id=a.perkara_id AND perkara_hakim_pn.aktif = 'Y'
                                    ORDER BY perkara_hakim_pn.urutan ASC) AS namaHakim,
                                    (SELECT GROUP_CONCAT(panitera_pn.nama_gelar SEPARATOR '<br/>')
                                    FROM perkara_panitera_pn
                                    LEFT JOIN panitera_pn ON panitera_pn.id=perkara_panitera_pn.panitera_id
                                    WHERE perkara_panitera_pn.perkara_id=a.perkara_id AND perkara_panitera_pn.aktif = 'Y'
                                    ORDER BY perkara_panitera_pn.urutan ASC) AS namaPanitera
                                    FROM perkara_jadwal_sidang AS b
                                    LEFT JOIN perkara AS a ON a.`perkara_id`=b.`perkara_id`
                                    LEFT JOIN perkara_hakim_pn AS c ON a.`perkara_id`=c.`perkara_id`
                                    WHERE b.`tanggal_sidang`= DATE(NOW())
                                    AND c.`jabatan_hakim_id`=1
                                    ORDER BY c.hakim_nama ");
        
        return $query; 
    }

    function tampil_jadwal_sidang_paging($halaman, $offset){
        return $this->db->query("SELECT
                                    a.`nomor_perkara`,
                                    b.`ruangan`, 
                                    b.`agenda`,
                                    a.`pihak1_text`,
                                    a.`pihak2_text`,
                                    a.`para_pihak`,
                                    (SELECT GROUP_CONCAT(CONCAT(c.jabatan_hakim_nama,': ',d.nama_gelar) SEPARATOR '<br/>')
                                    FROM perkara_hakim_pn AS c
                                    LEFT JOIN hakim_pn AS d ON d.id=c.hakim_id
                                    WHERE c.perkara_id=a.perkara_id AND c.aktif = 'Y'
                                    ORDER BY c.urutan ASC) AS namaHakim,
                                    (SELECT GROUP_CONCAT(f.nama_gelar SEPARATOR '<br/>')
                                    FROM perkara_panitera_pn AS e
                                    LEFT JOIN panitera_pn AS f ON f.id=e.panitera_id
                                    WHERE e.perkara_id=a.perkara_id AND e.aktif = 'Y'
                                    ORDER BY e.urutan ASC) AS namaPanitera
                                    FROM perkara_jadwal_sidang AS b
                                    LEFT JOIN perkara AS a ON a.`perkara_id`=b.`perkara_id`
                                    WHERE b.`tanggal_sidang`= DATE(NOW()) limit $halaman, $offset");
    }
    
   function dropdown (){
       $data=array();
           $query = $this->db->query("SELECT a.`perkara_id`,a.`hakim_id`,a.`jabatan_hakim_id`,a.`jabatan_hakim_nama`,a.`hakim_nama`,b.`nomor_perkara`
                                        FROM perkara_hakim_pn AS a 
                                        LEFT JOIN perkara AS b ON a.`perkara_id`=b.`perkara_id`
                                        WHERE jabatan_hakim_id = 1 
                                        AND DATE_FORMAT(b.`tanggal_pendaftaran`,'%Y') > 2017
                                        AND a.`aktif`='Y'
                                        GROUP BY a.`hakim_nama` ");
            if($query->num_rows() > 0){
                foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
            }
            $query->free_result();
            return $data;
        
    }

    function sidang_periode($tanggal, $majelis){
        $query = $this->db->query("SELECT a.`nomor_perkara`, a.`pihak1_text`, a.`pihak2_text`, a.`para_pihak`, a.`jenis_perkara_nama`,
                                    b.`ruangan`, 
                                    b.`agenda`,
                                    c.`hakim_id`, c.`hakim_nama`,
                                    (SELECT GROUP_CONCAT(CONCAT(perkara_hakim_pn.jabatan_hakim_nama,': ',hakim_pn.nama_gelar) SEPARATOR '<br/>')
                                    FROM perkara_hakim_pn
                                    LEFT JOIN hakim_pn ON hakim_pn.id=perkara_hakim_pn.hakim_id
                                    WHERE perkara_hakim_pn.perkara_id=a.perkara_id AND perkara_hakim_pn.aktif = 'Y'
                                    ORDER BY perkara_hakim_pn.urutan ASC) AS namaHakim,
                                    (SELECT GROUP_CONCAT(panitera_pn.nama_gelar SEPARATOR '<br/>')
                                    FROM perkara_panitera_pn
                                    LEFT JOIN panitera_pn ON panitera_pn.id=perkara_panitera_pn.panitera_id
                                    WHERE perkara_panitera_pn.perkara_id=a.perkara_id AND perkara_panitera_pn.aktif = 'Y'
                                    ORDER BY perkara_panitera_pn.urutan ASC) AS namaPanitera
                                    FROM perkara_jadwal_sidang AS b
                                    LEFT JOIN perkara AS a ON a.`perkara_id`=b.`perkara_id`
                                    left join perkara_hakim_pn as c on a.`perkara_id`=c.`perkara_id`
                                    WHERE b.`tanggal_sidang`='$tanggal'
                                    and c.`hakim_nama`='$majelis'
				                    ORDER BY namaHakim");
        return $query; 
    }

    function sidang_periodexx($tanggal, $majelis){
        $query = $this->db->query("SELECT a.`nomor_perkara`, a.`pihak1_text`, a.`pihak2_text`, a.`para_pihak`, a.`jenis_perkara_nama`,
                                    b.`ruangan`, 
                                    b.`agenda`,
                                    c.`hakim_id`, c.`hakim_nama`,
                                    (SELECT GROUP_CONCAT(CONCAT(perkara_hakim_pn.jabatan_hakim_nama,': ',hakim_pn.nama_gelar) SEPARATOR '<br/>')
                                    FROM perkara_hakim_pn
                                    LEFT JOIN hakim_pn ON hakim_pn.id=perkara_hakim_pn.hakim_id
                                    WHERE perkara_hakim_pn.perkara_id=a.perkara_id AND perkara_hakim_pn.aktif = 'Y'
                                    ORDER BY perkara_hakim_pn.urutan ASC) AS namaHakim,
                                    (SELECT GROUP_CONCAT(panitera_pn.nama_gelar SEPARATOR '<br/>')
                                    FROM perkara_panitera_pn
                                    LEFT JOIN panitera_pn ON panitera_pn.id=perkara_panitera_pn.panitera_id
                                    WHERE perkara_panitera_pn.perkara_id=a.perkara_id AND perkara_panitera_pn.aktif = 'Y'
                                    ORDER BY perkara_panitera_pn.urutan ASC) AS namaPanitera
                                    FROM perkara_jadwal_sidang AS b
                                    LEFT JOIN perkara AS a ON a.`perkara_id`=b.`perkara_id`
                                    left join perkara_hakim_pn as c on a.`perkara_id`=c.`perkara_id`
                                    WHERE  DATE_FORMAT( b.`tanggal_sidang`,'%d/%m/%Y')='01/02/2018'
                                    and c.`hakim_nama`='Drs.H.IRWANDI, MH.'
				                    ORDER BY namaHakim");
        return $query; 
    }
}