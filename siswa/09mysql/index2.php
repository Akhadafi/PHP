<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "siswa");

// ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM siswa
INNER JOIN agama
ON siswa.id_agama = agama.id_agama");

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object()

// while( $mhs = mysqli_fetch_assoc($result) ) {
// 	var_dump($mhs);
// }


?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Admin</title>
</head>

<body>

	<h1>Daftar Mahasiswa</h1>

	<table border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NISN</th>
			<th>Nama</th>
			<th>Agama</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
		</tr>

		<?php $i = 1; ?>
		<?php while ($row = mysqli_fetch_assoc($result)) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="">ubah</a> |
					<a href="">hapus</a>
				</td>
				<td><img src="../asset/img/<?= $row["gambar"]; ?>" width="50"></td>
				<td><?= $row["nisn"]; ?></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["agama"]; ?></td>
				<td><?= $row["tgl_lahir"]; ?></td>
				<td><?= $row["alamat"]; ?></td>
			</tr>
			<?php $i++; ?>
		<?php endwhile; ?>

	</table>

</body>

</html>