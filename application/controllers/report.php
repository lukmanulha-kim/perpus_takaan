<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report extends CI_Controller {

	public function __construct()
        {   
            parent::__construct();
            $this->load->library('Pdf');
        }

    public static function TglIndo($date){
		$str = explode('-', $date);

		$bulan = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember');

		return $str[0]." ".$bulan[$str[1]]." ".$str[2];
	}

	public static function TglIndo1($date){
		$str = explode('-', $date);

		return $str[2]."/".$str[1]."/".$str[0];
	}

	public static function BulanIndo($Bulan){

		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember');

		return $bulanIndo[$Bulan];
	}

	public function index(){
		$data['TotalPeminjam'] = $this->db->query("SELECT count(id_peminjam) as totalPeminjam from tb_peminjam")->row();
		$data['SesuaiTempo'] = $this->db->query("SELECT count(id_peminjam) as sesuaiTempo from tb_peminjam where status_pengembalian='Sesuai Tempo'")->row();
		$data['JatuhTempo'] = $this->db->query("SELECT count(id_peminjam) as jatuhTempo from tb_peminjam where status_pengembalian='Jatuh Tempo'")->row();
		$data['MasihDipinjam'] = $this->db->query("SELECT count(id_peminjam) as masihDipinjam from tb_peminjam where status_peminjaman='Masih Dipinjam'")->row();
		$data['Dikembalikan'] = $this->db->query("SELECT count(id_peminjam) as dikembalikan from tb_peminjam where status_peminjaman='Dikembalikan'")->row();
		$data['Hilang'] = $this->db->query("SELECT count(id_peminjam) as hilang from tb_peminjam where status_peminjaman='Hilang'")->row();

		$data['LunasSiswa'] = $this->db->query("SELECT tb_denda.status_denda, Count(tb_peminjam.kd_siswa) AS lunasSiswa, tb_siswa.nama_siswa FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa WHERE tb_peminjam.kd_siswa >  '0' AND tb_denda.status_denda =  'Lunas'")->row();
		$data['TidakLunasSiswa'] = $this->db->query("SELECT tb_denda.status_denda, Count(tb_peminjam.kd_siswa) AS tidaklunasSiswa, tb_siswa.nama_siswa FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa WHERE tb_peminjam.kd_siswa >  '0' AND tb_denda.status_denda =   'Belum Bayar'")->row();

		$data['LunasGuru'] = $this->db->query("SELECT tb_denda.status_denda, Count(tb_peminjam.kd_guru) AS lunasGuru, tb_guru.nama_guru FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru WHERE tb_peminjam.kd_guru >  '0' AND tb_denda.status_denda =  'Lunas'")->row();
		$data['TidakLunasGuru'] = $this->db->query("SELECT tb_denda.status_denda, Count(tb_peminjam.kd_guru) AS tidaklunasGuru, tb_guru.nama_guru FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru WHERE tb_peminjam.kd_guru >  '0' AND tb_denda.status_denda = 'Belum Bayar'")->row();

		$data['TotalBuku'] = $this->db->query("SELECT count(id_buku) as totalBuku from tb_buku")->row();
		$data['BukuBaik'] = $this->db->query("SELECT count(id_buku) as bukuBaik from tb_buku where kondisi='Baik'")->row();
		$data['BukuRusak'] = $this->db->query("SELECT count(id_buku) as bukuRusak from tb_buku where kondisi='Rusak'")->row();
		$data['BukuHilang'] = $this->db->query("SELECT count(id_buku) as bukuHilang from tb_buku where kondisi='Hilang'")->row();

		$data['TotalSiswa'] = $this->db->query("SELECT count(id_siswa) as totalSiswa from tb_siswa")->row();
		$data['SiswaAktif'] = $this->db->query("SELECT count(id_siswa) as siswaAktif from tb_siswa where status='Aktif'")->row();
		$data['SiswaTakAktif'] = $this->db->query("SELECT count(id_siswa) as siswaTakAktif from tb_siswa where status='Tidak Aktif'")->row();

		$data['TotalGuru'] = $this->db->query("SELECT count(id_guru) as totalGuru from tb_guru")->row();
		$data['GuruAktif'] = $this->db->query("SELECT count(id_guru) as guruAktif from tb_guru where status='Aktif'")->row();
		$data['GuruTakAktif'] = $this->db->query("SELECT count(id_guru) as guruTakAktif from tb_guru where status='Tidak Aktif'")->row();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('report/v_report', $data);
		$this->load->view('template/footer');
	}

	public function laporan(){
		$Peminjam = $this->input->post("i_peminjam");
		$Bulan = $this->input->post("i_bulan");
		$Tahun = $this->input->post("i_tahun");
		$Pinjaman = $this->input->post("i_pinjaman");
		$Pengembalian = $this->input->post("i_pengembalian");

		if ($Peminjam=="siswa") {
			if ($Pinjaman=="Semua" && $Pengembalian=="Semua") {
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_siswa.nama_siswa, tb_siswa.kelas, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun'");
				$this->load->view('pdf/laporansiswa', $data);
			}elseif ($Pengembalian=="Semua") {
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_siswa.nama_siswa, tb_siswa.kelas, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun' and tb_peminjam.status_peminjaman='$Pinjaman'");
				$this->load->view('pdf/laporansiswa', $data);
			}elseif ($Pinjaman=="Semua") {
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_siswa.nama_siswa, tb_siswa.kelas, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun' and tb_peminjam.status_pengembalian='$Pengembalian'");
				$this->load->view('pdf/laporansiswa', $data);
			}else{
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_siswa.nama_siswa, tb_siswa.kelas, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun' and tb_peminjam.status_peminjaman='$Pinjaman' and tb_peminjam.status_pengembalian='$Pengembalian'");
				$this->load->view('pdf/laporansiswa', $data);
			}
		}else{
			if ($Pinjaman=="Semua" && $Pengembalian=="Semua") {
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_guru.nama_guru, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun'");
				$this->load->view('pdf/laporanguru', $data);
			}elseif ($Pengembalian=="Semua") {
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_guru.nama_guru, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun' and tb_peminjam.status_peminjaman='$Pinjaman'");
				$this->load->view('pdf/laporanguru', $data);
			}elseif ($Pinjaman=="Semua") {
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_guru.nama_guru, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun' and tb_peminjam.status_pengembalian='$Pengembalian'");
				$this->load->view('pdf/laporanguru', $data);
			}else{
				$data = array('bulan' => $Bulan, 'tahun'=>$Tahun, 's_peminjaman'=>$Pinjaman, 's_pengembalian'=>$Pengembalian);
				$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
				$data['laporan']=$this->db->query("SELECT tb_guru.nama_guru, tb_buku.judul_buku, tb_peminjam.status_peminjaman, tb_peminjam.status_pengembalian, tb_peminjam.denda, tb_pustakawan.nama_pustakawan, tb_peminjam.tgl_dikembalikan FROM tb_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_pustakawan ON tb_pustakawan.id_pustakawan = tb_peminjam.kd_pustakawan Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru where month(tb_peminjam.tgl_pinjam)='$Bulan' and year(tb_peminjam.tgl_pinjam)='$Tahun' and tb_peminjam.status_pengembalian='$Pengembalian' and tb_peminjam.status_peminjaman='$Pinjaman'");
				$this->load->view('pdf/laporanguru', $data);
			}
		}

	}

	public function dendasiswalunas(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['dendaSiswa'] = $this->db->query("SELECT * FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa INNER JOIN tb_pustakawan ON tb_denda.kd_pustakawan = tb_pustakawan.id_pustakawan where tb_denda.status_denda='Lunas'");
		$this->load->view('pdf/dendasiswalunas', $data);
	}

	public function dendasiswataklunas(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['dendaSiswa'] = $this->db->query("SELECT * FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_siswa ON tb_siswa.id_siswa = tb_peminjam.kd_siswa where tb_denda.status_denda='Tidak Lunas'");
		$this->load->view('pdf/dendasiswataklunas', $data);
	}

	public function dendagurulunas(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['dendaGuru'] = $this->db->query("SELECT * FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru INNER JOIN tb_pustakawan ON tb_denda.kd_pustakawan = tb_pustakawan.id_pustakawan where tb_denda.status_denda='Lunas'");
		$this->load->view('pdf/dendagurulunas', $data);
	}

	public function dendagurutaklunas(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['dendaGuru'] = $this->db->query("SELECT * FROM tb_denda Inner Join tb_peminjam ON tb_peminjam.id_peminjam = tb_denda.kd_peminjam Inner Join tb_buku ON tb_buku.id_buku = tb_peminjam.kd_buku Inner Join tb_guru ON tb_guru.id_guru = tb_peminjam.kd_guru where tb_denda.status_denda='Tidak Lunas'");
		$this->load->view('pdf/dendagurutaklunas', $data);
	}

	public function buku(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['buku'] = $this->perpus_model->queryAll("tb_buku"); 
		$this->load->view('pdf/rekapbuku', $data);
	}

	public function bukubaik(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
		$data['buku']=$this->db->query("SELECT * FROM tb_buku where kondisi='Baik'");
		$this->load->view('pdf/rekapbukubaik', $data);
	}

	public function bukurusak(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
		$data['buku']=$this->db->query("SELECT * FROM tb_buku where kondisi='Rusak'");
		$this->load->view('pdf/rekapbukurusak', $data);
	}

	public function bukuhilang(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row();
		$data['buku']=$this->db->query("SELECT * FROM tb_buku where kondisi='Hilang'");
		$this->load->view('pdf/rekapbukuhilang', $data);
	}

	public function semuasiswa(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['siswa'] = $this->perpus_model->queryAll("tb_siswa"); 
		$this->load->view('pdf/rekapsiswa', $data);
	}

	public function siswaaktif(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['siswa'] = $this->perpus_model->whereQuery("tb_siswa", "status", "Aktif"); 
		$this->load->view('pdf/rekapsiswaaktif', $data);
	}

	public function siswatakaktif(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['siswa'] = $this->perpus_model->whereQuery("tb_siswa", "status", "Tidak Aktif"); 
		$this->load->view('pdf/rekapsiswatakaktif', $data);
	}

	public function semuaguru(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['guru'] = $this->perpus_model->queryAll("tb_guru"); 
		$this->load->view('pdf/rekapguru', $data);
	}

	public function guruaktif(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['guru'] = $this->perpus_model->whereQuery("tb_guru", "status", "Aktif"); 
		$this->load->view('pdf/rekapguruaktif', $data);
	}

	public function gurutakaktif(){
		$data['settings'] = $this->perpus_model->queryAll("tb_settings")->row(); 
		$data['guru'] = $this->perpus_model->whereQuery("tb_guru", "status", "Tidak Aktif"); 
		$this->load->view('pdf/rekapgurutakaktif', $data);
	}
}
