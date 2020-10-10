<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    public function datagrafik()
    {
        $data['struktural'] = $this->db->query("SELECT
                `struktural`.*,
                `pengguna`.*,
                (SELECT COUNT(*) FROM surat WHERE surat.idpengguna=pengguna.idpengguna) AS suratkeluar,
                (SELECT COUNT(*) FROM suratmasuk WHERE suratmasuk.idpengguna=pengguna.idpengguna AND tipe='Penerima') AS suratmasuk,
                (SELECT COUNT(*) FROM suratmasuk WHERE suratmasuk.idpengguna=pengguna.idpengguna AND tipe='Tembusan') AS surattembusan
            FROM
                `pegawai`
                RIGHT JOIN `pejabat` ON `pegawai`.`idpegawai` = `pejabat`.`idpegawai`
                LEFT JOIN `struktural` ON `struktural`.`idstruktural` =
                `pejabat`.`idstruktural`
                LEFT JOIN `pengguna` ON `pegawai`.`idpengguna` = `pengguna`.`idpengguna`
            WHERE pejabat.status='true'")->result();
        $data['kategori'] = $this->db->query("SELECT
                *,
                (SELECT COUNT(*) FROM surat WHERE surat.idkategori_surat=kategorisurat.idkategori_surat) AS total
            FROM
                `kategorisurat`")->result();
        return $data;
    }        

}

/* End of file ModelName.php */
