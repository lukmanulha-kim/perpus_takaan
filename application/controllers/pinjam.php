<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class pinjam extends CI_Controller {
	public function index(){
		$data['settings'] = $this->perpus_model->queryAll('tb_settings')->row();
		$data['siswa'] = $this->perpus_model->whereQuery('tb_siswa','status','Aktif');
		$data['guru'] = $this->perpus_model->whereQuery('tb_guru','status','Aktif');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pinjam/v_pinjam', $data);
		$this->load->view('template/footer');
	}

	public static function TglIndo($date){
		$str = explode('-', $date);

		$bulan = array(
			'01' => 'Jan',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'Mei',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Agu',
			'09' => 'Sep',
			'10' => 'Okt',
			'11' => 'Nov',
			'12' => 'Des');

		return $str[2]." ".$bulan[$str[1]]." ".$str[0];
	}

	public function cek_buku($referensi){
		$Ref = $referensi;
		// $TotalBuku = $this->db->query("SELECT count(kd_buku) as total FROM tb_peminjam where kd_buku = '$Ref'")->row();
		
		$DataBuku = $this->db->query("SELECT * FROM tb_buku where no_referensi = '$Ref'")->row();

		if (is_null($DataBuku)) {
			$data = array(
				'judul_buku'=>"Tidak Ada Data",
				'pengarang'=>"Tidak Ada Data"
			);
			echo json_encode($data);
		}else if($DataBuku->kondisi=="Hilang"){
			$data = array(
				'judul_buku'=>"Buku Hilang",
				'pengarang'=>"Buku Hilang"
			);
			echo json_encode($data);
		}else{
			$TotalBuku = $this->db->query("SELECT count(*) as total from tb_peminjam where kd_buku='$Ref' and status_peminjaman='Masih Dipinjam'")->row();
			$Sisa = $DataBuku->jumlah-$TotalBuku->total;
			if ($Sisa==0) {
				$data = array(
				'judul_buku'=>"Stok Buku Sedang Dipinjam Semua",
				'pengarang'=>"Stok Buku Sedang Dipinjam Semua"
			);
			echo json_encode($data);
			}else{
				$data = json_encode($DataBuku);
				echo $data;
			}
		}

	}

	public function addpeminjam(){
		$field['kd_pustakawan']= decrypt_url($this->input->post('i_pustakawan'));
		$field['kd_buku']= $this->input->post('i_referensi');
		$field['kd_siswa']= $this->input->post('i_siswa');
		$field['kd_guru']= $this->input->post('i_guru');
		$field['tgl_pinjam']= $this->input->post('i_tglpinjam');
		$field['tgl_kembali']= $this->input->post('i_tglkembali');

		$this->db->insert("tb_peminjam", $field);
		redirect('pinjam/peminjam');
	}

	public function peminjam(){
		$data['peminjamGuru'] = $this->db->query("SELECT * FROM tb_peminjam inner join tb_buku on tb_peminjam.kd_buku = tb_buku.id_buku inner join tb_guru on tb_peminjam.kd_guru = tb_guru.id_guru");
		$data['peminjamSiswa'] = $this->db->query("SELECT * FROM tb_peminjam inner join tb_buku on tb_peminjam.kd_buku = tb_buku.id_buku inner join tb_siswa on tb_peminjam.kd_siswa = tb_siswa.id_siswa");

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pinjam/v_peminjam', $data);
		$this->load->view('template/footer');
	}

	public function kembali($id){
		$ID = decrypt_url($id);
		$dateNow = date('Y-m-d');

		$Settings = $this->db->query("SELECT * FROM tb_settings")->row();
		$Peminjam = $this->db->query("SELECT * FROM tb_peminjam where id_peminjam='$ID'")->row();

		$tglKembali = $Peminjam->tgl_kembali;
		$tglKembali = new Datetime($tglKembali); 

		$tglSekarang = new Datetime();

		$perbedaan = $tglKembali->diff($tglSekarang);

		//gabungkan
		echo $Telat = $perbedaan->d*$Settings->denda;

		if ($Peminjam->tgl_kembali<$dateNow) {
			$statusPengembalian = "Jatuh Tempo";
		}else{
			$statusPengembalian = "Sesuai Tempo";
		}
		echo $statusPengembalian;

		if ($statusPengembalian=="Sesuai Tempo") {
			$updateData = $this->db->query("UPDATE tb_peminjam SET status_peminjaman='Dikembalikan', tgl_dikembalikan='$dateNow', status_pengembalian='$statusPengembalian' where id_peminjam='$ID'");

			redirect('pinjam/peminjam');
		}else{
			$updateData = $this->db->query("UPDATE tb_peminjam SET status_peminjaman='Dikembalikan', tgl_dikembalikan='$dateNow', status_pengembalian='$statusPengembalian', denda='$Telat' where id_peminjam='$ID'");

			$tambahDenda = $this->db->query("INSERT INTO tb_denda VALUES('','$ID','Belum Bayar')");

			redirect('denda');//redirect('pinjam/peminjam');
			
		}

	}

	public function hilang($id){
		$ID = decrypt_url($id);
		$Pustakawan = $this->session->userdata['id_pustakawan'];

		$Peminjam = $this->db->query("SELECT * FROM tb_peminjam where id_peminjam='$ID'")->row();

		$KD_buku = $Peminjam->kd_buku;
		
		$Buku = $this->db->query("SELECT * FROM tb_buku where id_buku='$KD_buku'")->row();

		$HargaBuku = $Buku->harga;

		$JumlahBuku = $Buku->jumlah-1;

		if ($JumlahBuku!=0) {
			$UpdateBuku = $this->db->query("UPDATE tb_buku SET jumlah='$JumlahBuku' where id_buku='$KD_buku'");

			$updateData = $this->db->query("UPDATE tb_peminjam SET status_peminjaman='Hilang', denda='$HargaBuku' where id_peminjam='$ID'");

			$tambahDenda = $this->db->query("INSERT INTO tb_denda VALUES('','$ID','Belum Bayar', '')");
			redirect('denda');
		}else{
			$UpdateBuku = $this->db->query("UPDATE tb_buku SET kondisi='Hilang' where id_buku='$KD_buku'");

			$tambahDenda = $this->db->query("INSERT INTO tb_denda VALUES('','$ID','Belum Bayar', '')");
			
			$updateData = $this->db->query("UPDATE tb_peminjam SET status_peminjaman='Hilang', denda='$HargaBuku' where id_peminjam='$ID'");
			redirect('denda');
		}
		
	}
}


?>