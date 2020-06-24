<?php

// create new PDF document
$pdf = new TCPDF('Landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Library Management System');
$pdf->SetTitle('Laporan Bulan '.$bulan.' | Tahun '.$tahun.' | Status Peminjaman '.$s_peminjaman.' | Status Pengembalian '.$s_pengembalian);
$pdf->SetSubject('Laporan Bulan '.$bulan.' | Tahun '.$tahun.' | Status Peminjaman '.$s_peminjaman.' | Status Pengembalian '.$s_pengembalian);
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins('10', '5', '10');
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 11);

// add a page
$pdf->AddPage();

$html ='<table>
	<tbody>
		<tr>
			<td width="110" style="text-align: center; "><img src="assets/img/'.$settings->logo.'" alt="logo" width="90px"></td>
			<td>
				<p style="line-height: 1px;"> </p>
				<p style="line-height: 4px;">
					<b style="font-size: 32px;">Perpustakaan</b>
				</p>
				<p style="line-height: 5px;"><b style="font-size: 24px;">'.$settings->nama_perpus.'</b></p>
				<p style="line-height: 5px;"><b style="font-size: 18px">'.$settings->alamat_perpus.' '.$settings->kabupaten.'</b></p>
			</td>
		</tr>
	</tbody>
</table><hr>';

// $pdf->SetLineWidth(1);
// $pdf->Line(10,34,286.5,34);
// $pdf->SetLineWidth(0);
// $pdf->Line(9.9,32.5,287,32.5);

$html.='<hr><table>
	<tbody>
		<tr>
			<td style="text-align: center; line-height=20px"><h2>Laporan</h2></td>
		</tr>
		<tr>
			<td style="text-align: center; line-height=30px">Bulan : <b>'.report::BulanIndo($bulan).'</b> | Tahun : <b>'.$tahun.'</b> | Status Peminjaman : <b>'.$s_peminjaman.'</b> | Status Pengembalian : <b>'.$s_pengembalian.'</b></td>
		</tr>
	</tbody>
</table>
<table border="1" cellspacing="0" cellpadding="3">
	<thead>
		<tr>
			<th style="text-align: center; width:30;"><b>No</b></th>
			<th style="text-align: center; " width="190"><b>Nama Siswa</b></th>
			<th style="text-align: center; " width="70"><b>Kelas</b></th>
			<th style="text-align: center;" width="240"><b>Judul Buku</b></th>
			<th style="text-align: center;" width="90"><b>Status Peminjaman</b></th>
			<th style="text-align: center;" width="90"><b>Tanggal Dikembalikan</b></th>
			<th style="text-align: center;" width="90"><b>Status Pengembalian</b></th>
			<th style="text-align: center;" width="90"><b>Denda</b></th>
			<th style="text-align: center;" width="91"><b>Pustakawan</b></th>
		</tr>
	</thead>
	<tbody>';
	foreach ($laporan->result() as $dataLaporan) {
		@$no++;
		$html .='<tr>
			<td style="text-align: center; width:30;">'.$no.'</td>
			<td width="190">'.$dataLaporan->nama_siswa.'</td>
			<td style="text-align: center;" width="70">'.$dataLaporan->kelas.'</td>
			<td style="text-align: center;" width="240">'.$dataLaporan->judul_buku.'</td>
			<td style="text-align: center;" width="90">'.$dataLaporan->status_peminjaman.'</td>
			<td style="text-align: center;" width="90">'.report::TglIndo1($dataLaporan->tgl_dikembalikan).'</td>
			<td width="90">'.$dataLaporan->status_pengembalian.'</td>
			<td width="90">Rp. '.$dataLaporan->denda.'</td>
			<td style="text-align: center;" width="91">'.$dataLaporan->nama_pustakawan.'</td>
		</tr>';
	}
	$html .='</tbody>
</table>';

$html .= '<table>
	<thead>
		<tr>
			<th width="710"></th>
			<th width="271"></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="710"></td>
			<td width="271">'.$settings->kabupaten.', '.report::TglIndo(date('d-m-Y')).'</td>
		</tr>
		<tr>
			<td width="710"></td>
			<td width="271">Ketua Perpustakaan</td>
		</tr>
		<tr>
			<td width="710"></td>
			<td width="271" height="50"></td>
		</tr>
		<tr>
			<td width="710"></td>
			<td width="271">'.$settings->ketua_perpus.'</td>
		</tr>
	</tbody>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



//Close and output PDF document
$pdf->Output('Laporan Bulan '.$bulan.' Tahun '.$tahun.' Status Peminjaman '.$s_peminjaman.' Status Pengembalian '.$s_pengembalian.'.pdf', 'I');

?>