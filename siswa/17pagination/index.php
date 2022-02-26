<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Halaman Admin</title>
</head>

<body>
	<a href="logout.php">Logout</a>

	<h1>Daftar siswa</h1>

	<a href="tambah.php">Tambah</a>

	<!-- Cari data -->
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
	</form>
	<!-- Cari data -->

	<!-- Pagination -->
	<?php
	$jumlahDataPerHalaman = 10;
	$jumlahData = count(query("SELECT * FROM siswa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

	$siswa = query("SELECT * FROM siswa INNER JOIN agama
	ON siswa.id_agama = agama.id_agama ORDER BY nisn DESC LIMIT $awalData, $jumlahDataPerHalaman");
	?>
	<!-- navigasi -->
	<a href="?halaman=1">awal</a>

	<?php if ($halamanAktif > 1) : ?>
		<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
	<?php endif; ?>

	<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
		<?php if ($i == $halamanAktif) : ?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>

	<?php if ($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
	<?php endif; ?>

	<a href="?halaman=<?= $jumlahHalaman; ?>">akhir</a>
	<!-- navigasi -->
	<!-- Pagination -->

	<br>

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
		<?php
		if (isset($_POST["cari"])) {
			$siswa = cari($_POST["keyword"]);
		}
		?>
		<?php foreach ($siswa as $row) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="ubah.php?nisn=<?= $row["nisn"]; ?>">ubah</a> |
					<a href="hapus.php?nisn=<?= $row["nisn"]; ?>" onclick="return confirm('yakin?');">hapus</a>
				</td>
				<td><img src="../asset/img/profile/<?= $row["gambar"]; ?>" width="50"></td>
				<td><?= $row["nisn"]; ?></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["agama"]; ?></td>
				<td><?= $row["tgl_lahir"]; ?></td>
				<td><?= $row["alamat"]; ?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>

	</table>

</body>

</html>