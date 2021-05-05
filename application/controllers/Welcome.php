<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$username =$this->input->post('username');
		$password = $this->input->post('password');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$login_sukses = $this->db->get('tbl_user')->row_array();
		if ($login_sukses>0) {
			redirect('Welcome/beranda');
		}else{
			redirect('Welcome');
		}
	}
	public function beranda()
	{
		$this->load->view('beranda');
	}
	public function user()
	{
		$this->load->model('modeldata');
		$data['tabeluser']=$this->modeldata->tabeldatauser();
		$this->load->view('beranda', $data);
	}
	public function investor()
	{
		$this->load->model('modeldata');
		$data['tabelinvestor']=$this->modeldata->tabeldatainvestor();
		$this->load->view('beranda', $data);
	}
	public function asset()
	{
		$this->load->model('modeldata');
		$data['tabelasset']=$this->modeldata->tabeldataasset();
		$this->load->view('beranda', $data);
	}
	public function tambah_data_user()
	{
		$this->load->view('beranda');
	}
	public function edit_data_user($id_user = null)
	{
		$this->load->model('modeldata');
		$data['GETid_data_user'] = $this->modeldata->getIdDataUser($id_user);
		$this->load->view('beranda', $data);
	}
	public function update_user()
	{
		$this->load->model('modeldata');
		$id_user = $this->input->post('id_user');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password= $this->input->post('password');
		$this->modeldata->updateuser($id_user , $nama_lengkap, $username, $password);
		redirect('Welcome/user');
	}
	public function tambah_data_investor()
	{
		$this->load->view('beranda');
	}
	public function tambah_data_asset()
	{
		$this->load->view('beranda');
	}
	public function edit_data_investor($id_investor = null)
	{
		$this->load->model('modeldata');
		$data['GETid_data_investor'] = $this->modeldata->getIdDataInvestor($id_investor);
		$this->load->view('beranda', $data);
	}
	public function update_investor()
	{
		$this->load->model('modeldata');
		$id_investor = $this->input->post('id_investor');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$keterangan= $this->input->post('keterangan');
		$this->modeldata->updateinvestor($id_investor , $nama, $alamat, $keterangan);
		redirect('Welcome/investor');
	}
	public function edit_data_asset($id_asset = null)
	{
		$this->load->model('modeldata');
		$data['GETid_data_asset'] = $this->modeldata->getIdDataAsset($id_asset);
		$this->load->view('beranda', $data);
	}
	public function update_asset()
	{
		$this->load->model('modeldata');
		$id_asset = $this->input->post('id_asset');
		$nama_barang = $this->input->post('nama_barang');
		$jumlah = $this->input->post('jumlah');
		$kondisi= $this->input->post('kondisi');
		$keterangan= $this->input->post('keterangan');
		$this->modeldata->updateasset($id_asset , $nama_barang, $jumlah, $kondisi, $keterangan);
		redirect('Welcome/asset');
	}
	public function simpan_investor()
	{
		$this->load->model('modeldata');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$keterangan=$this->input->post('keterangan');
		$this->modeldata->simpan_investor($nama,$alamat,$keterangan);
		redirect('Welcome/investor');
	}
	public function simpan_asset()
	{
		$this->load->model('modeldata');
		$nama_barang=$this->input->post('nama_barang');
		$jumlah=$this->input->post('jumlah');
		$kondisi=$this->input->post('kondisi');
		$keterangan=$this->input->post('keterangan');
		$this->modeldata->simpan_asset($nama_barang,$jumlah,$kondisi,$keterangan);
		redirect('Welcome/asset');
	}
	public function getIdAsset($id)
	{
		$this->load->model('modeldata');
		$data = $this->modeldata->getIdAsset($id)->row();
		echo json_encode($data);
	}
	public function hapusDataAsset()
	{
		$this->load->model('modeldata');
		$this->modeldata->hapusDataAsset();
		redirect('Welcome/asset');
	}
	public function getIdInvestor($id)
	{
		$this->load->model('modeldata');
		$data = $this->modeldata->getIdInvestor($id)->row();
		echo json_encode($data);
	}
	public function hapusDataInvestor()
	{
		$this->load->model('modeldata');
		$this->modeldata->hapusDataInvestor();
		redirect('Welcome/investor');
	}
	public function getIdUser($id)
	{
		$this->load->model('modeldata');
		$data = $this->modeldata->getIdUser($id)->row();
		echo json_encode($data);
	}
	public function hapusDataUser()
	{
		$this->load->model('modeldata');
		$this->modeldata->hapusDataUser();
		redirect('Welcome/user');
	}
}
