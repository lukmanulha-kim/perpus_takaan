<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {
	private $filename = "import_data_siswa";
	public function index()
	{
		$data['siswa'] = $this->perpus_model->queryAll('tb_siswa');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/v_siswa', $data);
		$this->load->view('template/footer');
	}

	public function addsiswa()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/v_add');
		$this->load->view('template/footer');
	}

	public function add()
	{
		$field['nama_siswa'] = $this->input->post('i_nama');
		$field['kelas'] = $this->input->post('i_kelas');
		$field['status'] = $this->input->post('i_status');

		$this->db->insert('tb_siswa', $field);
		redirect('siswa');
	}

	public function import()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/v_import');
		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$ID = decrypt_url($id);
		$data['dataSiswa'] = $this->db->query("SELECT * FROM tb_siswa where id_siswa='$ID'")->row();
		// $this->load->view('putih/addbook');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$ID = decrypt_url($this->input->post('i_id'));
		$field['nama_siswa'] = $this->input->post('i_nama');
		$field['kelas'] = $this->input->post('i_kelas');
		$field['status'] = $this->input->post('i_status');

		$this->db->where('id_siswa', $ID);
		$this->db->update('tb_siswa', $field);
		redirect('siswa');
	}

	public function kenaikankelas()
	{
		$data['siswa'] = $this->perpus_model->queryAll('tb_siswa');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/v_naik', $data);
		$this->load->view('template/footer');
	}
}
