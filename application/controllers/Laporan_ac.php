<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_ac extends CI_Controller
{
  function __construct(){
    parent::__construct();
    $this->load->model('M_menu');
    $this->load->model('M_dashboard');
    $this->load->model('M_lap_ac'); 
  }
  function index(){
    if(isset($_POST['submit'])){
      $tanggal1           = $this->input->post('tanggal1');
      $tanggal2           = $this->input->post('tanggal2');
      $data['lap_akte']   = $this->M_lap_ac->laporan_akte_periode($tanggal1, $tanggal2);
      $this->load->view('admin/laporan/ac_f_list',$data);
    }else{
      // paging 
    $menu['pkosong']    = $this->M_menu->tampil_pihak_kosong()->num_rows(); 
		$menu['edockosong'] = $this->M_menu->edoc_petitum_kosong()->num_rows(); 
		$menu['pmhkosong']  = $this->M_menu->tampil_pmh()->num_rows(); 
		$menu['ppkosong']   = $this->M_menu->tampil_pp()->num_rows(); 
		$menu['jskosong']   = $this->M_menu->tampil_js()->num_rows(); 
		$menu['phskosong']  = $this->M_menu->tampil_phs()->num_rows(); 
		$menu['cekputus']  	= $this->M_menu->cek_putus()->num_rows(); 
    $menu['putminut']  	= $this->M_menu->putminut()->num_rows(); 
    $menu['put_trans']  	= $this->M_menu->put_trans()->num_rows(); 
		$menu['docputus']  	= $this->M_menu->doc_putus()->num_rows(); 
		$menu['anonputus']	= $this->M_menu->doc_anon_putus()->num_rows(); 
		// hadir
		$menu['hdrcg']		= $this->M_menu->putus_hdr_cg()->num_rows(); 
		$menu['hdrct']		= $this->M_menu->putus_hdr_ct()->num_rows(); 
		$menu['hdrctgugur']	= $this->M_menu->putus_hdr_ct_gugur()->num_rows(); 
		// luar hadir
		$menu['lhdrcgpbt']	= $this->M_menu->putus_lhdr_cg_pbt()->num_rows(); 
		$menu['lhdrcgac']	= $this->M_menu->putus_lhdr_cg_ac()->num_rows(); 
		$menu['lhdrctpbt']	= $this->M_menu->putus_lhdr_ct_pbt()->num_rows(); 
		$menu['lhdrctphs']	= $this->M_menu->putus_lhdr_ct_phs()->num_rows(); 
		$menu['lhdrctgugur']= $this->M_menu->putus_lhdr_ct_gugur()->num_rows(); 
		// verstek
		$menu['vcgpbt']		= $this->M_menu->putus_v_cg_pbt()->num_rows(); 
		$menu['vcgac']		= $this->M_menu->putus_v_cg_ac()->num_rows(); 
		$menu['vctpbt']		= $this->M_menu->putus_v_ct_pbt()->num_rows(); 
		$menu['vctphs']		= $this->M_menu->putus_v_ct_phs()->num_rows(); 
		$menu['vctgugur']	= $this->M_menu->putus_v_ct_gugur()->num_rows();
        $menu['dashboard'] = $this->M_dashboard->tampilkan_dashboard();
        $this->load->library('pagination');
        $config['base_url']   = base_url().'/laporan_ac/index/';
        $config['total_rows'] = $this->M_lap_ac->laporan_akte()->num_rows(); 
        $config['per_page']   = 10;
        $this->pagination->initialize($config);
        $data['paging']       = $this->pagination->create_links();
        $halaman              = $this->uri->segment(3);
        $halaman              = $halaman ==''?0:$halaman;
        $data ['lap_akte']    = $this->M_lap_ac->tampilkan_data_paging($halaman,  $config['per_page']);
        $this->load->view('template/header', $menu);
        $this->load->view('admin/laporan/ac_list',$data);
        $this->load->view('template/footer');
    }
  }

  function cetak_ac(){
    if(isset($_POST['submit'])){
      $tanggal1           = $this->input->post('tanggal1');
      $tanggal2           = $this->input->post('tanggal2');
      $data['lap_akte']   = $this->M_lap_ac->laporan_akte_periode($tanggal1, $tanggal2);
      $this->load->view('admin/laporan/ac_f_list',$data);
    }else{
      echo "Tidak Ada Data Terseleksi";
    }
  }

  public function cetak_pdf()
	{
    $this->load->library('pdfgenerator');

    if(isset($_POST['submit'])){
      $tanggal1           = $this->input->post('tanggal1');
      $tanggal2           = $this->input->post('tanggal2');
      $data['lap_akte']   = $this->M_lap_ac->laporan_akte_periode($tanggal1, $tanggal2);
      // $this->load->view('admin/laporan/ac_f_list',$data);
      $html = $this->load->view('admin/laporan/ac_f_pdf', $data, true);
	    
	    $this->pdfgenerator->generate($html,'Lap_pdf');
    }else{
      echo "Tidak Ada Data Terseleksi";
    }
  }

  public function cetak_xls()
	{
    if(isset($_POST['submit'])){
      $tanggal1           = $this->input->post('tanggal1');
      $tanggal2           = $this->input->post('tanggal2');
      $data['lap_akte']   = $this->M_lap_ac->laporan_akte_periode($tanggal1, $tanggal2);
      $this->load->view('admin/laporan/ac_f_xls',$data);
    }else{
      echo "Tidak Ada Data Terseleksi";
    }
  }
}
