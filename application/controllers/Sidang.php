<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_penerimaan');
		$this->load->model('M_menu');
		$this->load->model('M_dashboard');
		$this->load->model('M_sidang');
	}

	public function index()
	{   
		if(isset($_POST['submit'])){
			$tanggal           = $this->input->post('tanggal');
			$majelis           = $this->input->post('majelis');
			$data['sidang']   = $this->M_sidang->sidang_periode($tanggal, $majelis);
			$this->load->view('admin/sidang/sd_f_list',$data); //perlu perbaikan tampilan
		}else{
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
			// sniff
			$data ['majelis'] = $this->M_sidang->dropdown();
			$data ['datasid'] = $this->M_sidang->tampilkan_j_sidang();
			$this->load->view('template/header',$menu);
			$this->load->view ('admin/sidang/jadwal_sidang',$data);
			$this->load->view('template/footer');

	  }
	}

	public function jadwal_sidang(){
		if(isset($_POST['submit'])){
			$tanggal           = $this->input->post('tanggal');
			$majelis           = $this->input->post('majelis');
			$data['sidang']   = $this->M_sidang->sidang_periode($tanggal, $majelis);
			$this->load->view('admin/sidang/sd_f_list',$data);
		  }else{
				$data ['majelis'] = $this->M_sidang->dropdown();
				$data ['datasid'] = $this->M_sidang->tampilkan_j_sidang();
				$this->load->view('template/headerf');
				// $this->load->view ('admin/sidang/j_sidang',$data);
				$this->load->view ('admin/sidang/jadwal_sidang',$data);
				$this->load->view('template/footer');
		}
	}

	public function drop_majelis(){
		$data ['majelis'] = $this->M_sidang->dropdown();
		$data ['datasid'] = $this->M_sidang->tampilkan_j_sidang();
		$this->load->view('template/headerf');
		$this->load->view ('admin/sidang/j_sidang',$data);
		// $this->load->view ('admin/sidang/jadwal_sidang',$data);
		$this->load->view('template/footer');
	}

	public function cetak_xls()
	{
    if(isset($_POST['submit'])){
		$tanggal           = $this->input->post('tanggal');
		$majelis           = $this->input->post('majelis');
		$data['sidang']    = $this->M_sidang->sidang_periode($tanggal, $majelis);
     	$this->load->view('admin/sidang/sd_xls',$data);
    }else{
      echo "Tidak Ada Data Terseleksi";
    }
  }
}
