<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function index(){
		$data['user'] = $this->perpus_model->queryAll('tb_pustakawan');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/v_user', $data);
		$this->load->view('template/footer');
	}

	public function adduser()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/v_add');
		$this->load->view('template/footer');
	}

	public function add()
	{
		$field['nama_pustakawan'] = $this->input->post('i_nama');
		$field['username'] = $this->input->post('i_username');
		$field['password'] = md5($this->input->post('i_password'));
		$field['level'] = 'Pustakawan';
		$field['status_pustakawan'] = 'Aktif';

		$this->db->insert('tb_pustakawan', $field);
		redirect('user');
	}

	public function edit($id)
	{
		$ID = decrypt_url($id);
		$data['datauser'] = $this->db->query("SELECT * FROM tb_pustakawan where id_pustakawan='$ID'")->row();
		// $this->load->view('putih/addbook');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$ID = decrypt_url($this->input->post('i_id'));
		$field['nama_user'] = $this->input->post('i_nama');
		$field['status'] = $this->input->post('i_status');

		$this->db->where('id_pustakawan', $ID);
		$this->db->update('tb_pustakawan', $field);
		redirect('user');
	}
}
