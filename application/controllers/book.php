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
		$this->load->view('buku/v_import',$data);
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
	          'no_referensi'=>$row['A'],
	          'judul_buku'=>$row['B'], // Insert data nis dari kolom A di excel
	          'pengarang'=>$row['C'], // Insert data nama dari kolom B di excel
	          'volume_jilid'=>$row['D'], // Insert data jenis kelamin dari kolom C di excel
	          'jumlah'=>$row['E'], // Insert data jenis kelamin dari kolom C di excel
	          'harga'=>$row['F'], // Insert data jenis kelamin dari kolom C di excel
	          'kondisi'=>$row['G'], // Insert data alamat dari kolom D di excel
	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->perpus_model->insert_multiple("tb_buku",$data);
	    
	    redirect("book"); // Redirect ke halaman awal (ke controller siswa fungsi index)
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
