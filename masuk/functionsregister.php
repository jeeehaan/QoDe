<?php
//koneksi ke database

$conn = mysqli_connect("localhost", "root", "", "qode");


function daftar($data)
{
	global $conn;

	$name = strtolower(stripcslashes($data["name"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$no_telepon = strtolower(stripcslashes($data["no_telepon"]));

	// cek user name sudah ada atau belum
	$result = mysqli_query($conn, "SELECT name FROM users WHERE name = '$name'");

	if( mysqli_fetch_assoc($result) ) 
	{
		echo "<script>
			alert('Nama SUDAH TERDAFTAR!! masukan nama lain..')
		</script>";
		return false;
	}

	//cek konfirmasi password
	if ( $password !== $password2) 
	{
		echo "<script>
			alert('Konfirmasi Password Tidak Sesuai!!');
		</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	//tambah user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$name', '$password', '$no_telepon')");

	return mysqli_affected_rows($conn);
}