<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_kua extends CI_Controller
{
  function __construct(){
    parent::__construct();
    $this->load->model('M_lap_kua'); 
    $this->load->model('M_menu'); 
    $this->load->model('M_dashboard'); 
  }

  function index(){
    if(isset($_POST['submit'])){
      $tanggal1 = $this->input->post('tanggal1');
      $tanggal2 = $this->input->post('tanggal2');
      $kec = $this->input->post('kec');
      $data['lap_kua'] = $this->M_lap_kua->laporan_kua_periode($tanggal1, $tanggal2, $kec);
      $this->load->view('admin/laporan/kua_f_list',$data);
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
      $config['base_url'] = base_url().'/laporan_kua/index/';
      $config['total_rows'] = $this->M_lap_kua->laporan_kua()->num_rows(); //dari tampilkan data menghitung jumlah record
      $config['per_page'] = 10;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['lap_kua']  = $this->M_lap_kua->tampilkan_data_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/laporan/kua_list',$data);
      $this->load->view('template/footer');
     
    }
  }

  function cetak_pdf(){
    $this->load->library('pdfgenerator');
    if(isset($_POST['submit'])){
      $tanggal1 = $this->input->post('tanggal1');
      $tanggal2 = $this->input->post('tanggal2');
      $data['lap_kua'] = $this->M_lap_kua->laporan_kua_periode($tanggal1, $tanggal2);
      $html = $this->load->view('admin/laporan/kua_f_pdf',$data);
      $this->pdfgenerator->generate($html,'contoh');
    }else{
      echo "Tidak Ada Data Terseleksi";
    }
  }

  function cetak_xls(){
    if(isset($_POST['submit'])){
      $tanggal1 = $this->input->post('tanggal1');
      $tanggal2 = $this->input->post('tanggal2');
      $kec = $this->input->post('kec');
      $data['lap_kua'] = $this->M_lap_kua->laporan_kua_periode($tanggal1, $tanggal2, $kec);
      $this->load->view('admin/laporan/kua_xls',$data);
    }else{
      echo "Tidak Ada Data Terseleksi";
    }
  }
}
