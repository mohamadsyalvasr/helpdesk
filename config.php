<?php

	define('NAMA_HOST', 'localhost');
	define('USER_DB', 'root');
	define('PASS_DB', '');
	define('NAMA_DB', 'helpdesk');

	$conn = new mysqli(NAMA_HOST,USER_DB,PASS_DB,NAMA_DB);

	if (mysqli_connect_errno())
	{
		echo "KONEKSI GAGAL :" .mysqli_connect_error();
	}else {
		// echo "KONEKSI BERHASIL";
	}

?>
