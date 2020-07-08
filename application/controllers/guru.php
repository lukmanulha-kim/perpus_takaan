<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guru extends CI_Controller {
	private $filename = "import_data_guru";
	public function index()
	{
		$data['guru'] = $this->perpus_model->queryAll('tb_guru');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('guru/v_guru', $data);
		$this->load->view('template/footer');
	}

	public function addguru()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('guru/v_add');
		$this->load->view('template/footer');
	}

	public function add()
	{
		$field['nama_guru'] = $this->input->post('i_nama');
		$field['status'] = 'Aktif';

		$this->db->insert('tb_guru', $field);
		redirect('guru');
	}

	public function import()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('guru/v_import');
		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$ID = decrypt_url($id);
		$data['dataGuru'] = $this->db->query("SELECT * FROM tb_guru where id_guru='$ID'")->row();
		// $this->load->view('putih/addbook');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('guru/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$ID = decrypt_url($this->input->post('i_id'));
		$field['nama_guru'] = $this->input->post('i_nama');
		$field['status'] = $this->input->post('i_status');

		$this->db->where('id_guru', $ID);
		$this->db->update('tb_guru', $field);
		redirect('guru');
	}
}
