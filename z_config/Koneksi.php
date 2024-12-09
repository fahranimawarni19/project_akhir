<?php
	$user = "root";
	$pass = "";
	$host = "localhost";
	$db = "db_banksampah_blm";
	
	$con = mysqli_connect($host,$user,$pass,$db);
	if(mysqli_connect_errno())
	{
		echo"Koneksi Gagal";
		mysqli_connect_error();
	}
?>