<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "siswa");


function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data)
{
	global $conn;

	$nisn = htmlspecialchars($data["nisn"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$id_agama = htmlspecialchars($data["id_agama"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "INSERT INTO siswa
				VALUES
			  ('$nisn', '$nama', '$alamat', '$tgl_lahir', '$id_agama','$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($nisn)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM siswa WHERE nisn = $nisn");
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;

	$nisn = $data["nisn"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$id_agama = htmlspecialchars($data["id_agama"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "UPDATE siswa SET
				nisn = '$nisn',
				nama = '$nama',
				alamat = '$alamat',
				tgl_lahir = '$tgl_lahir',
				id_agama = '$id_agama',
				gambar = '$gambar'
			  WHERE nisn = $nisn
			";
	// var_dump($query); die;
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
