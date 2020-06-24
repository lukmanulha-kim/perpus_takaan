<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function create_captcha(){
		$options = array(
			'img_path' => './captcha/',
        	'img_url' => base_url('captcha/'),
			'img_width' => '200',
			'img_height' => '50',
			'word_length'   => 4,
        	'font_size'     => 32,
			'expiration' => 7200
		);

		$cap = create_captcha($options);
		$image = $cap['image'];

		$this->session->set_userdata('captchaword',$cap['word']);

		return $image;
 	}

	public function index(){
		$cek = $this->db->query("SELECT count(id_pustakawan) as jumlah from tb_pustakawan where status_pustakawan='Aktif'")->row();

		if ($cek->jumlah==0) {
			$this->load->view('signup', array('img'=>$this->create_captcha()));
		}else{
			$this->load->view('login');
		}
	}

	public function cek(){
		$username = $this->input->post("i_user");
		$password = md5($this->input->post("i_pass"));

		$this->db->where("username", $username);
		$this->db->where("password", $password);
		$query = $this->db->get("tb_pustakawan");
		$hitung = $query->num_rows();
		if ($hitung>0) {
				$datalogin = $query->row();
				$arraysession = array("id_pustakawan"=>$datalogin->id_pustakawan, "pustakawan"=>$datalogin->nama_pustakawan, "level"=>$datalogin->level);
				$this->session->set_userdata($arraysession);
			redirect('Welcome');
		}else{
			redirect('login', array('salah'=>"Username atau Password Salah !"));
		}
	}

	public function signup(){
		$field['nama_pustakawan'] = $this->input->post('i_nama');
		$field['username'] = $this->input->post('i_user');
		$field['password'] = md5($this->input->post('i_pass'));
		$field['level'] = "Admin";
		
		if ($this->input->post('i_captcha') == $this->session->userdata('captchaword')) {
 			$this->db->insert('tb_pustakawan', $field);
			redirect('login');
 		}else{
 			$this->load->view('signup', array('img'=>$this->create_captcha(),'salah'=>'Captcha Salah'));
 		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("login");
	}
}


