<?php

class M_dashboard extends CI_Model{

    public $table = "sys_config";

    function tampilkan_dashboard(){
        $query = $this->db->query("SELECT C.masuk AS masuk, C.minutasi AS minutasi, C.sisa AS sisa,
                                 (SELECT VALUE FROM sys_config WHERE id = 62) AS namaPN,
                                 (SELECT VALUE FROM sys_config WHERE id = 80) AS versiSIPP,
                                 @kinerjaPN := ROUND(SUM(C.minutasi)*100/(SUM(C.masuk)+SUM(C.sisa)),2) AS kinerjaPN,
                                 (CASE WHEN @kinerjaPN < 50.00 THEN 'red' WHEN @kinerjaPN >=90 THEN 'green' ELSE '#def30c' END) AS warnaPN
                                 FROM (SELECT
                                 SUM(CASE WHEN YEAR(A.tanggal_pendaftaran)<=YEAR(NOW())-1 AND (YEAR(B.tanggal_minutasi)>=YEAR(NOW()) OR (B.tanggal_minutasi IS NULL OR B.tanggal_minutasi='')) THEN 1 ELSE 0 END) AS sisa,
                                 SUM(CASE WHEN YEAR(A.tanggal_pendaftaran)=YEAR(NOW()) THEN 1 ELSE 0 END) AS masuk,
                                 SUM(CASE WHEN YEAR(A.tanggal_pendaftaran)<=YEAR(NOW()) AND YEAR(B.tanggal_minutasi)=YEAR(NOW()) THEN 1 ELSE 0 END) AS minutasi
                                 FROM perkara AS A LEFT JOIN perkara_putusan AS B ON A.perkara_id=B.perkara_id WHERE A.alur_perkara_id <> 114) AS C");
        return $query; 
    }

}