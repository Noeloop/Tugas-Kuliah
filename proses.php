<?php

// echo '<pre>';
// print_r($_POST);


// GERBANG LOGIKA
// AND && --> kondisinya harus semua benar
// OR || --> salah satu kodisi benar = benar

// PREVENTIF
if($_POST['tanggal'] == '-Pilih Tanggal-' || $_POST['bulan'] == '-Pilih Bulan-'  || $_POST['tahun'] == '-Pilih Tahun-') {
	
	echo 'Tanggal lahir tidak valid <br>';
	echo '<a href=index.php>Kembali</a>';

} else {

	// cek nim 123456.txt
	$nama_file = 'data/'.$_POST['nimTxt'].'.txt';


	if(file_exists($nama_file)) { // file_exists = melakukan pengecekan terhadap file
		echo 'Data Sudah ada <br>';
		echo '<a href=index.php>Kembali</a>';
	} else {
		
		$filenya = fopen($nama_file, "w");

		// \n = enter / br
		$datanya = "NIM = ".$_POST['nimTxt']."\n";
		$datanya .= "NAMA = ".$_POST['namaTxt']."\n";
		$datanya .= "ALAMAT = ".$_POST['alamatTxt']."\n";
		$datanya .= "TANGGAL LAHIR = ".$_POST['tanggal']."\n";
		$datanya .= "BULAN LAHIR = ".$_POST['bulan']."\n";
		$datanya .= "TAHUN LAHIR = ".$_POST['tahun']."\n";

		fwrite($filenya, $datanya);

		fclose($filenya);

		echo 'Data berhasil disimpan <br>';
		echo '<a href=index.php>Kembali</a>';
	}
}

?>