<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Putus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_penerimaan');
		$this->load->model('M_menu');
		$this->load->model('M_putus');
		$this->load->model('M_dashboard');
	}

	public function index()
	{
		$menu['pkosong']    = $this->M_menu->tampil_pihak_kosong()->num_rows(); 
		$menu['edockosong'] = $this->M_menu->edoc_petitum_kosong()->num_rows(); 
		$menu['pmhkosong']  = $this->M_menu->tampil_pmh()->num_rows(); 
		$menu['ppkosong']   = $this->M_menu->tampil_pp()->num_rows(); 
		$menu['jskosong']   = $this->M_menu->tampil_js()->num_rows(); 
		$menu['phskosong']  = $this->M_menu->tampil_phs()->num_rows(); 
		$menu['cekputus']  	= $this->M_menu->cek_putus()->num_rows(); 
		$menu['putminut']  	= $this->M_menu->putminut()->num_rows(); 
		$menu['put_trans']  = $this->M_menu->put_trans()->num_rows(); 
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
		// sniff
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/putus/index/';
		$config['total_rows'] = $this->M_putus->tampilkan_cek_putus()->num_rows(); 
		$data['total'] = $this->M_putus->tampilkan_cek_putus()->num_rows(); 
		$config['per_page'] = 25;
		$this->pagination->initialize($config);
		$data['paging']     = $this->pagination->create_links();
		$halaman            = $this->uri->segment(3);
		$halaman            = $halaman ==''?0:$halaman;
		$data ['cekputus']  = $this->M_putus->tampil_cek_putus_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/putus/putusan',$data);
		$this->load->view('template/footer');

	
	}

	function minut(){
		$menu['pkosong']    = $this->M_menu->tampil_pihak_kosong()->num_rows(); 
		$menu['edockosong'] = $this->M_menu->edoc_petitum_kosong()->num_rows(); 
		$menu['pmhkosong']  = $this->M_menu->tampil_pmh()->num_rows(); 
		$menu['ppkosong']   = $this->M_menu->tampil_pp()->num_rows(); 
		$menu['jskosong']   = $this->M_menu->tampil_js()->num_rows(); 
		$menu['phskosong']  = $this->M_menu->tampil_phs()->num_rows(); 
		$menu['cekputus']  	= $this->M_menu->cek_putus()->num_rows(); 
		$menu['putminut']  	= $this->M_menu->putminut()->num_rows(); 
		$menu['put_trans'] 	= $this->M_menu->put_trans()->num_rows(); 
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
		// sniff
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/putus/minut/';
		$config['total_rows'] = $this->M_putus->put_minut()->num_rows(); 
		$data['total'] = $this->M_putus->put_minut()->num_rows(); 
		$config['per_page'] = 25;
		$this->pagination->initialize($config);
		$data['paging']     = $this->pagination->create_links();
		$halaman            = $this->uri->segment(3);
		$halaman            = $halaman ==''?0:$halaman;
		$data ['putminut']  = $this->M_putus->put_minut_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/putus/putusminut',$data);
		$this->load->view('template/footer');

	}
	
	function put_transaksi(){
		$menu['pkosong']    = $this->M_menu->tampil_pihak_kosong()->num_rows(); 
		$menu['edockosong'] = $this->M_menu->edoc_petitum_kosong()->num_rows(); 
		$menu['pmhkosong']  = $this->M_menu->tampil_pmh()->num_rows(); 
		$menu['ppkosong']   = $this->M_menu->tampil_pp()->num_rows(); 
		$menu['jskosong']   = $this->M_menu->tampil_js()->num_rows(); 
		$menu['phskosong']  = $this->M_menu->tampil_phs()->num_rows(); 
		$menu['cekputus']  	= $this->M_menu->cek_putus()->num_rows(); 
		$menu['putminut']  	= $this->M_menu->putminut()->num_rows(); 
		$menu['put_trans']  = $this->M_menu->put_trans()->num_rows(); 
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
		// sniff
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/putus/put_transaksi/';
		$config['total_rows'] = $this->M_putus->put_transaksi()->num_rows(); 
		$data['total'] = $this->M_putus->put_transaksi()->num_rows(); 
		$config['per_page'] = 25;
		$this->pagination->initialize($config);
		$data['paging']     = $this->pagination->create_links();
		$halaman            = $this->uri->segment(3);
		$halaman            = $halaman ==''?0:$halaman;
		$data ['puttrans']  = $this->M_putus->put_transaksi_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/putus/put_trans',$data);
		$this->load->view('template/footer');

	}

	function e_put(){
		$menu['pkosong']    = $this->M_menu->tampil_pihak_kosong()->num_rows(); 
		$menu['edockosong'] = $this->M_menu->edoc_petitum_kosong()->num_rows(); 
		$menu['pmhkosong']  = $this->M_menu->tampil_pmh()->num_rows(); 
		$menu['ppkosong']   = $this->M_menu->tampil_pp()->num_rows(); 
		$menu['jskosong']   = $this->M_menu->tampil_js()->num_rows(); 
		$menu['phskosong']  = $this->M_menu->tampil_phs()->num_rows(); 
		$menu['cekputus']  	= $this->M_menu->cek_putus()->num_rows(); 
		$menu['putminut']  	= $this->M_menu->putminut()->num_rows(); 
		$menu['put_trans'] 	= $this->M_menu->put_trans()->num_rows(); 
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
		// sniff
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/putus/e_put/';
		$config['total_rows'] = $this->M_putus->doc_putus()->num_rows(); 
		$data['total'] = $this->M_putus->doc_putus()->num_rows(); 
		$config['per_page'] = 25;
		$this->pagination->initialize($config);
		$data['paging']     = $this->pagination->create_links();
		$halaman            = $this->uri->segment(3);
		$halaman            = $halaman ==''?0:$halaman;
		$data ['docput']  = $this->M_putus->doc_putus_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/putus/doc_put',$data);
		$this->load->view('template/footer');

	}

	function e_anon(){
		$menu['pkosong']    = $this->M_menu->tampil_pihak_kosong()->num_rows(); 
		$menu['edockosong'] = $this->M_menu->edoc_petitum_kosong()->num_rows(); 
		$menu['pmhkosong']  = $this->M_menu->tampil_pmh()->num_rows(); 
		$menu['ppkosong']   = $this->M_menu->tampil_pp()->num_rows(); 
		$menu['jskosong']   = $this->M_menu->tampil_js()->num_rows(); 
		$menu['phskosong']  = $this->M_menu->tampil_phs()->num_rows(); 
		$menu['cekputus']  	= $this->M_menu->cek_putus()->num_rows(); 
		$menu['putminut']  	= $this->M_menu->putminut()->num_rows(); 
		$menu['put_trans']  = $this->M_menu->put_trans()->num_rows(); 
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
		// sniff
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/putus/e_anon/';
		$config['total_rows'] = $this->M_putus->doc_anon()->num_rows(); 
		$data['total'] = $this->M_putus->doc_anon()->num_rows(); 
		$config['per_page'] = 25;
		$this->pagination->initialize($config);
		$data['paging']     = $this->pagination->create_links();
		$halaman            = $this->uri->segment(3);
		$halaman            = $halaman ==''?0:$halaman;
		$data ['docanon']  = $this->M_putus->doc_anon_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/putus/doc_anon',$data);
		$this->load->view('template/footer');

	}
	
}
