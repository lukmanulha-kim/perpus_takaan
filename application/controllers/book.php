<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class book extends CI_Controller {
	private $filename = "import_data_buku";
	public function index()
	{
		$data['buku'] = $this->perpus_model->queryAll('tb_buku');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('buku/v_buku', $data);
		$this->load->view('template/footer');

	}

	public function addbook()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('buku/v_add');
		$this->load->view('template/footer');
	}

	public function add()
	{
		$field['no_referensi'] = $this->input->post('i_noref');
		$field['judul_buku'] = $this->input->post('i_judul');
		$field['pengarang'] = $this->input->post('i_pengarang');
		$field['volume_jilid'] = $this->input->post('i_volume');
		$field['jumlah'] = $this->input->post('i_jumlah');
		$field['harga'] = $this->input->post('i_harga');
		$field['kondisi'] = $this->input->post('i_kondisi');

		$this->db->insert('tb_buku', $field);
		redirect('book');
	}

	public function import()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('buku/v_import');
		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$ID = decrypt_url($id);
		$data['dataBuku'] = $this->db->query("SELECT * FROM tb_buku where id_buku='$ID'")->row();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('buku/v_edit', $data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$ID = decrypt_url($this->input->post('i_id'));
		$field['no_referensi'] = $this->input->post('i_noref');
		$field['judul_buku'] = $this->input->post('i_judul');
		$field['pengarang'] = $this->input->post('i_pengarang');
		$field['volume_jilid'] = $this->input->post('i_volume');
		$field['jumlah'] = $this->input->post('i_jumlah');
		$field['harga'] = $this->input->post('i_harga');
		$field['kondisi'] = $this->input->post('i_kondisi');

		$this->db->where('id_buku', $ID);
		$this->db->update('tb_buku', $field);
		redirect('book');
	}

	public function barcode(){
		$data['buku']= $this->perpus_model->queryAll('tb_buku');
		$data['total'] = $this->db->query("SELECT count(no_referensi) as totalBuku from tb_buku")->row();
		$this->load->view("putih/barcode", $data);
	}

	public function set_barcode($code){
		$No_Ref = decrypt_url($code);
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$No_Ref), array());
	}
}
