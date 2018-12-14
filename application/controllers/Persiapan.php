<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persiapan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_penerimaan');
		$this->load->model('M_persiapan');
		$this->load->model('M_menu');
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
        $config['base_url'] = base_url().'/persiapan/';
        // sniff
		$config['total_rows'] = $this->M_persiapan->tampil_pmh()->num_rows(); 
		$data['total'] = $this->M_persiapan->tampil_pmh()->num_rows(); 
		$config['per_page'] = 25;
		$this->pagination->initialize($config);
		$data['paging']     = $this->pagination->create_links();
		$halaman            = $this->uri->segment(3);
		$halaman            = $halaman ==''?0:$halaman;
		$data ['pmh_kosong']  = $this->M_persiapan->tampil_pmh_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/persiapan/pmh',$data);
		$this->load->view('template/footer');
	
    }
    // pmh
    function pmh(){
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
        $config['base_url'] = base_url().'/persiapan/pmh/';
        $config['total_rows'] = $this->M_persiapan->tampil_pmh()->num_rows(); 
        $data['total'] = $this->M_persiapan->tampil_pmh()->num_rows(); 
        $config['per_page'] = 25;
        $this->pagination->initialize($config);
        $data['paging']     = $this->pagination->create_links();
        $halaman            = $this->uri->segment(3);
        $halaman            = $halaman ==''?0:$halaman;
        $data ['cekpmh']  = $this->M_persiapan->tampil_pmh_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/persiapan/pmh',$data);
		$this->load->view('template/footer');
    }
    // pp
    function pp(){
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
        $config['base_url'] = base_url().'/persiapan/pp/';
        $config['total_rows'] = $this->M_persiapan->tampil_pp()->num_rows(); 
        $data['total'] = $this->M_persiapan->tampil_pp()->num_rows(); 
        $config['per_page'] = 25;
        $this->pagination->initialize($config);
        $data['paging']     = $this->pagination->create_links();
        $halaman            = $this->uri->segment(3);
        $halaman            = $halaman ==''?0:$halaman;
        $data ['cekpp']  = $this->M_persiapan->tampil_pp_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/persiapan/pp',$data);
		$this->load->view('template/footer');
    }
    // js
    function js(){
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
        $config['base_url'] = base_url().'/persiapan/js/';
        $config['total_rows'] = $this->M_persiapan->tampil_js()->num_rows(); 
        $data['total'] = $this->M_persiapan->tampil_js()->num_rows(); 
        $config['per_page'] = 25;
        $this->pagination->initialize($config);
        $data['paging']     = $this->pagination->create_links();
        $halaman            = $this->uri->segment(3);
        $halaman            = $halaman ==''?0:$halaman;
        $data ['cekjs']  = $this->M_persiapan->tampil_js_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/persiapan/js',$data);
		$this->load->view('template/footer');
    }
    // PHS
    function phs(){
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
        $config['base_url'] = base_url().'/persiapan/phs/';
        $config['total_rows'] = $this->M_persiapan->tampil_phs()->num_rows(); 
        $data['total'] = $this->M_persiapan->tampil_phs()->num_rows(); 
        $config['per_page'] = 25;
        $this->pagination->initialize($config);
        $data['paging']     = $this->pagination->create_links();
        $halaman            = $this->uri->segment(3);
        $halaman            = $halaman ==''?0:$halaman;
        $data ['cekphs']  = $this->M_persiapan->tampil_phs_paging($halaman,  $config['per_page']);
		$this->load->view('template/header', $menu);
		$this->load->view('admin/persiapan/phs',$data);
		$this->load->view('template/footer');
    }

}
