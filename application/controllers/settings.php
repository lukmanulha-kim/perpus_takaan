<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {
	private $filename = "updatelogo";
	public function aplikasi(){
		$data['aplikasi'] = $this->perpus_model->queryAll('tb_settings')->row();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('settings/v_aplikasi', $data);
		$this->load->view('template/footer');
	}

	public function updateaplikasi(){
		$ID = decrypt_url($this->input->post("i_id"));
		$field['nama_perpus'] = $this->input->post("i_nama");
		$field['ketua_perpus'] = $this->input->post("i_ketua");
    	$field['alamat_perpus'] = $this->input->post("i_alamat");
    	$field['kabupaten'] = $this->input->post("i_kab"); 
    	$field['durasi_pinjam'] = $this->input->post("i_lama");
    	$field['denda'] = $this->input->post("i_denda");

    	$this->db->where('id_setting', $ID);
    	$this->db->update('tb_settings', $field);
    	redirect('settings/aplikasi');
	}

	public function updatelogo(){
		$ID = decrypt_url($this->input->post("i_id"));

		$config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 250;
        $config['file_name']        	= $this->filename;
        $config['overwrite'] 			= true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('i_logo')){
            $data = array('error' => $this->upload->display_errors());
            $data['aplikasi'] = $this->perpus_model->queryAll('tb_settings')->row();

            $this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('settings/v_aplikasi', $data);
			$this->load->view('template/footer');
        }else{
        	$field['logo'] = $this->upload->data('file_name');

        	$this->db->where('id_setting', $ID);
	    	$this->db->update('tb_settings', $field);
	    	redirect('settings/aplikasi');
        }
	}

	public function user($id){
		$ID = decrypt_url($id);
		$data['user'] = $this->perpus_model->whereQuery('tb_pustakawan', 'id_pustakawan', $ID)->row();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('settings/v_user', $data);
		$this->load->view('template/footer');
		
	}

	public function updateuser(){
		$ID = decrypt_url($this->input->post("i_id"));
		echo $Pwd = $this->input->post('i_password');	

		if ($Pwd=="") {
			$field['nama_pustakawan'] = $this->input->post('i_nama');
			$field['username'] = $this->input->post('i_username');

			$this->db->where("id_pustakawan", $ID);
			$this->db->update("tb_pustakawan", $field);
			redirect("settings/user/".$this->input->post("i_id"));
		}else{
			$field['nama_pustakawan'] = $this->input->post('i_nama');
			$field['username'] = $this->input->post('i_username');
			$field['password'] = md5($this->input->post('i_password'));

			$this->db->where("id_pustakawan", $ID);
			$this->db->update("tb_pustakawan", $field);
			redirect("settings/user/".$this->input->post("i_id"));
		}
	}
}


