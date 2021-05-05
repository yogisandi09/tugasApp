<?php 
/**
 * 
 */
class modeldata extends CI_Model
{
	
	public function tabeldataasset()
	{
		return $this->db->get('tbl_asset')->result();
	}
	public function tabeldatauser()
	{
		return $this->db->get('tbl_user')->result();
	}
	public function tabeldatainvestor()
	{
		return $this->db->get('tbl_investor')->result();
	}
	public function simpan_user($nama_lengkap,$username,$password)
	{
		$isi = array('nama_lengkap' => $nama_lengkap,
					 'username' => $username,
					 'password' => $password,
		 );
		$this->db->insert('tbl_user',$isi);
	}
	public function simpan_investor($nama,$alamat,$keterangan)
	{
		$isi = array('nama' => $nama,
					 'alamat' => $alamat,
					 'keterangan' => $keterangan,
		 );
		$this->db->insert('tbl_investor',$isi);
	}
	public function simpan_asset($nama_barang,$jumlah,$kondisi,$keterangan)
	{
		$isi = array('nama_barang' => $nama_barang,
					 'jumlah' => $jumlah,
					 'kondisi' => $kondisi,
					 'keterangan' => $keterangan,
		 );
		$this->db->insert('tbl_asset',$isi);
	}
	public function getIdAsset($id)
	{
		$this->db->where('id_asset', $id);
		return $this->db->get('tbl_asset');
	}
	public function hapusDataAsset()
	{
		$hapusData = $this->input->post('id_asset');
		$this->db->where('id_asset', $hapusData);
		$this->db->delete('tbl_asset');
	}
	public function getIdUser($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('tbl_user');
	}
	public function hapusDataUser()
	{
		$hapusData = $this->input->post('id_user');
		$this->db->where('id_user', $hapusData);
		$this->db->delete('tbl_user');
	}
	public function getIdInvestor($id)
	{
		$this->db->where('id_investor', $id);
		return $this->db->get('tbl_investor');
	}
	public function hapusDataInvestor()
	{
		$hapusData = $this->input->post('id_investor');
		$this->db->where('id_investor', $hapusData);
		$this->db->delete('tbl_investor');
	}
	public function getIdDataUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('tbl_user')->result();
	}
	public function updateuser($id_user , $nama_lengkap, $username, $password)
	{
		$editData = array(
			'nama_lengkap' => $nama_lengkap,
			'username' => $username,
			'password' => $password,
		);
		$this->db->set($editData);
		$this->db->where('id_user', $id_user);
		$this->db->update('tbl_user');
	}
	public function getIdDataAsset($id_asset)
	{
		$this->db->where('id_asset', $id_asset);
		return $this->db->get('tbl_asset')->result();
	}
	public function updateasset($id_asset, $nama_barang, $jumlah, $kondisi, $keterangan)
	{
		$editData = array(
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'kondisi' => $kondisi,
			'keterangan' => $keterangan,
		);
		$this->db->set($editData);
		$this->db->where('id_asset', $id_asset);
		$this->db->update('tbl_asset');
	}
	public function getIdDataInvestor($id_investor)
	{
		$this->db->where('id_investor', $id_investor);
		return $this->db->get('tbl_investor')->result();
	}
	public function updateinvestor($id_investor , $nama, $alamat, $keterangan){
		$editData = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
		);
		$this->db->set($editData);
		$this->db->where('id_investor', $id_investor);
		$this->db->update('tbl_investor');
    }
     
}
 ?>