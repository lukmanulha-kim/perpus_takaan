<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class denda extends CI_Controller {
	public function index(){
		$data['dendaSiswa'] = $this->db->query("SELECT * FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa");
		$data['dendaGuru'] = $this->db->query("SELECT * FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru");
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('denda/v_denda', $data);
		$this->load->view('template/footer');
	}

	public function lunas($id){
		$ID = decrypt_url($id);
		$field['status_denda']="Lunas";
		$field['kd_pustakawan']=$this->session->userdata['id_pustakawan'];

		$this->db->where('id_denda', $ID);
		$this->db->update('tb_denda', $field);
		redirect('denda');
	}
}


