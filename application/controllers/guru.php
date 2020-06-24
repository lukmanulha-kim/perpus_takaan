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

	public function upload(){
 		// if ($this->session->userdata("uname")=="") {
			// 	redirect("login");
			// }
 		$data = array();

		if (isset($_POST['preview'])) {

			$config['upload_path']          = './assets/excel';
	        $config['allowed_types']        = 'xlsx';
	        $config['file_name']        	= $this->filename;
	        $config['overwrite'] 			= true;
	        $config['remove_spaces']		= false;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('i_file')){
	            $error = array('error' => $this->upload->display_errors());
	            return $error;
	            // $this->load->view('lembaga/tbh_lembaga', $error);
	        }else{
	            $data = array('upload_data' => $this->upload->data());

	            // Load plugin PHPExcel nya
		        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		        
		        $excelreader = new PHPExcel_Reader_Excel2007();
		        $loadexcel = $excelreader->load('assets/excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
		        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		        
		        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
		        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
		        $data['sheet'] = $sheet;
	        }
	    }

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('guru/v_import',$data);
		$this->load->view('template/footer');
	}

	public function doimport(){
		// Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader = new PHPExcel_Reader_Excel2007();
	    $loadexcel = $excelreader->load('assets/excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    
	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = array();
	    
	    $numrow = 1;
	    foreach($sheet as $row){
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	      if($numrow > 1){
	        // Kita push (add) array data ke variabel data
	        array_push($data, array(
	          'nama_guru'=>$row['A'],
	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->perpus_model->insert_multiple("tb_guru",$data);
	    
	    redirect("guru"); // Redirect ke halaman awal (ke controller siswa fungsi index)
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
