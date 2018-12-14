<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cerai_talak extends CI_Controller
{
  function __construct(){
    parent::__construct();
    $this->load->model('M_menu');
    $this->load->model('M_dashboard');
    $this->load->model('M_cerai_talak'); 
  }

  function index(){
    //   phs ikrar
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
      $config['base_url'] = base_url().'/cerai_talak/index/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_hadir()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_hadir()->num_rows();
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['cthdr']  = $this->M_cerai_talak->tampilkan_ct_hadir_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/hdr_phs_ikrar',$data);
      $this->load->view('template/footer');
  }
// hadir gugur
  function hadir_gugur(){
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
      $config['base_url'] = base_url().'/cerai_talak/hadir_gugur/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_hadir_gugur()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_hadir_gugur()->num_rows(); 
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['cthdrgu']  = $this->M_cerai_talak->tampilkan_ct_hadir_gugur_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/hdr_gugur',$data);
      $this->load->view('template/footer');
  }
// luar hadir pbt
  function luar_hadir_pbt(){
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
      $config['base_url'] = base_url().'/cerai_talak/luar_hadir_pbt/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_luar_hadir_pbt()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_luar_hadir_pbt()->num_rows(); 
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['luarhdrpbt']  = $this->M_cerai_talak->tampilkan_ct_luar_hadir_pbt_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/luar_hdr_pbt',$data);
      $this->load->view('template/footer');
  }
// luar hadir phs ikrar
  function luar_hadir_phs_ikrar(){
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
      $config['base_url'] = base_url().'/cerai_talak/luar_hadir_phs_ikrar/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_luar_hadir_phs_ikrar()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_luar_hadir_phs_ikrar()->num_rows(); 
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['luarhdrphsikr']  = $this->M_cerai_talak->tampilkan_ct_luar_hadir_phs_ikrar_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/luar_hdr_phs_ikrar',$data);
      $this->load->view('template/footer');
  }
// luar hadir gugur
  function luar_hadir_gugur(){
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
      $config['base_url'] = base_url().'/cerai_talak/luar_hadir_gugur/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_luar_hadir_gugur()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_luar_hadir_gugur()->num_rows(); 
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['luarhdrgugur']  = $this->M_cerai_talak->tampilkan_ct_luar_hadir_gugur_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/luar_hdr_gugur',$data);
      $this->load->view('template/footer');
  }
// verstek pbt
  function verstek_pbt(){
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
      $config['base_url'] = base_url().'/cerai_talak/verstek_pbt/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_verstek_pbt()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_verstek_pbt()->num_rows(); 
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['ctvpbt']  = $this->M_cerai_talak->tampilkan_ct_verstek_pbt_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/v_pbt',$data);
      $this->load->view('template/footer');
  }
// verstek phs ikrar
  function verstek_phs_ikrar(){
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
      $config['base_url'] = base_url().'/cerai_talak/verstek_phs_ikrar/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_verstek_phs_ikrar()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_verstek_phs_ikrar()->num_rows(); 
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['ctvphsikrar']  = $this->M_cerai_talak->tampilkan_ct_verstek_phs_ikrar_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/v_phs_ikrar',$data);
      $this->load->view('template/footer');
  }
// verstek gugur
  function verstek_gugur(){
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
      $config['base_url'] = base_url().'/cerai_talak/gugur/';
      $config['total_rows'] = $this->M_cerai_talak->tampil_ct_verstek_gugur()->num_rows(); 
      $data['total'] = $this->M_cerai_talak->tampil_ct_verstek_gugur()->num_rows(); 
      $config['per_page'] = 25;
      $this->pagination->initialize($config);
      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman ==''?0:$halaman;
      $data ['ctvgugur']  = $this->M_cerai_talak->tampilkan_ct_verstek_gugur_paging($halaman,  $config['per_page']);
      $this->load->view('template/header', $menu);
      $this->load->view('admin/cerai_talak/v_gugur',$data);
      $this->load->view('template/footer');
  }
}