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
	private $filename = "logo";
	public function index(){
		$Tahun1 = date('Y');
		$Tahun2 = $Tahun1-1;
		$data['totalBuku'] = $this->db->query("SELECT count(*) as totalBuku FROM tb_buku")->row();
		$data['totalSiswa'] = $this->db->query("SELECT count(*) as totalSiswa FROM tb_siswa")->row();
		$data['totalGuru'] = $this->db->query("SELECT count(*) as totalGuru FROM tb_guru")->row();
		$data['totalPeminjam'] = $this->db->query("SELECT count(*) as totalPeminjam FROM tb_peminjam")->row();

		$data['januari1'] = $this->db->query("SELECT count(id_peminjam) as januari1 from tb_peminjam where month(tgl_pinjam) = 01 and year(tgl_pinjam)=$Tahun1")->row();
		$data['februari1'] = $this->db->query("SELECT count(id_peminjam) as februari1 from tb_peminjam where month(tgl_pinjam) = 02 and year(tgl_pinjam)=$Tahun1")->row();
		$data['maret1'] = $this->db->query("SELECT count(id_peminjam) as maret1 from tb_peminjam where month(tgl_pinjam) = 03 and year(tgl_pinjam)=$Tahun1")->row();
		$data['april1'] = $this->db->query("SELECT count(id_peminjam) as april1 from tb_peminjam where month(tgl_pinjam) = 04 and year(tgl_pinjam)=$Tahun1")->row();
		$data['mei1'] = $this->db->query("SELECT count(id_peminjam) as mei1 from tb_peminjam where month(tgl_pinjam) = 05 and year(tgl_pinjam)=$Tahun1")->row();
		$data['juni1'] = $this->db->query("SELECT count(id_peminjam) as juni1 from tb_peminjam where month(tgl_pinjam) = 06 and year(tgl_pinjam)=$Tahun1")->row();
		$data['juli1'] = $this->db->query("SELECT count(id_peminjam) as juli1 from tb_peminjam where month(tgl_pinjam) = 07 and year(tgl_pinjam)=$Tahun1")->row();
		$data['agustus1'] = $this->db->query("SELECT count(id_peminjam) as agustus1 from tb_peminjam where month(tgl_pinjam) = 08 and year(tgl_pinjam)=$Tahun1")->row();
		$data['september1'] = $this->db->query("SELECT count(id_peminjam) as september1 from tb_peminjam where month(tgl_pinjam) = 09 and year(tgl_pinjam)=$Tahun1")->row();
		$data['oktober1'] = $this->db->query("SELECT count(id_peminjam) as oktober1 from tb_peminjam where month(tgl_pinjam) = 10 and year(tgl_pinjam)=$Tahun1")->row();
		$data['november1'] = $this->db->query("SELECT count(id_peminjam) as november1 from tb_peminjam where month(tgl_pinjam) = 11 and year(tgl_pinjam)=$Tahun1")->row();
		$data['desember1'] = $this->db->query("SELECT count(id_peminjam) as desember1 from tb_peminjam where month(tgl_pinjam) = 12 and year(tgl_pinjam)=$Tahun1")->row();

		$data['januari2'] = $this->db->query("SELECT count(id_peminjam) as januari2 from tb_peminjam where month(tgl_pinjam) = 01 and year(tgl_pinjam)=$Tahun2")->row();
		$data['februari2'] = $this->db->query("SELECT count(id_peminjam) as februari2 from tb_peminjam where month(tgl_pinjam) = 02 and year(tgl_pinjam)=$Tahun2")->row();
		$data['maret2'] = $this->db->query("SELECT count(id_peminjam) as maret2 from tb_peminjam where month(tgl_pinjam) = 03 and year(tgl_pinjam)=$Tahun2")->row();
		$data['april2'] = $this->db->query("SELECT count(id_peminjam) as april2 from tb_peminjam where month(tgl_pinjam) = 04 and year(tgl_pinjam)=$Tahun2")->row();
		$data['mei2'] = $this->db->query("SELECT count(id_peminjam) as mei2 from tb_peminjam where month(tgl_pinjam) = 05 and year(tgl_pinjam)=$Tahun2")->row();
		$data['juni2'] = $this->db->query("SELECT count(id_peminjam) as juni2 from tb_peminjam where month(tgl_pinjam) = 06 and year(tgl_pinjam)=$Tahun2")->row();
		$data['juli2'] = $this->db->query("SELECT count(id_peminjam) as juli2 from tb_peminjam where month(tgl_pinjam) = 07 and year(tgl_pinjam)=$Tahun2")->row();
		$data['agustus2'] = $this->db->query("SELECT count(id_peminjam) as agustus2 from tb_peminjam where month(tgl_pinjam) = 08 and year(tgl_pinjam)=$Tahun2")->row();
		$data['september2'] = $this->db->query("SELECT count(id_peminjam) as september2 from tb_peminjam where month(tgl_pinjam) = 09 and year(tgl_pinjam)=$Tahun2")->row();
		$data['oktober2'] = $this->db->query("SELECT count(id_peminjam) as oktober2 from tb_peminjam where month(tgl_pinjam) = 10 and year(tgl_pinjam)=$Tahun2")->row();
		$data['november2'] = $this->db->query("SELECT count(id_peminjam) as november2 from tb_peminjam where month(tgl_pinjam) = 11 and year(tgl_pinjam)=$Tahun2")->row();
		$data['desember2'] = $this->db->query("SELECT count(id_peminjam) as desember2 from tb_peminjam where month(tgl_pinjam) = 12 and year(tgl_pinjam)=$Tahun2")->row();

		if ($this->session->userdata("id_pustakawan")=="") {
				redirect("login");
			}
		$cek = $this->db->query("SELECT count(*) as pengaturan FROM tb_settings")->row();
		if ($cek->pengaturan==0) {
			$this->load->view('settings');
		}else{
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/content', $data);
			$this->load->view('template/footer');
		}
	}

	public function settings(){
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 250;
        $config['file_name']        	= $this->filename;
        $config['overwrite'] 			= true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('i_logo')){
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('settings', $error);
        }else{
        	$field['nama_perpus'] = $this->input->post("i_nama");
        	$field['ketua_perpus'] = $this->input->post("i_ketua");
        	$field['alamat_perpus'] = $this->input->post("i_alamat");
        	$field['kabupaten'] = $this->input->post("i_kab");
        	$field['logo'] = $this->upload->data('file_name'); 
        	$field['durasi_pinjam'] = $this->input->post("i_lama");
        	$field['denda'] = $this->input->post("i_denda");

        	$this->db->insert("tb_settings", $field);
        	redirect('Welcome');
        }
    }
}
