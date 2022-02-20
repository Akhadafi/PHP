<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./asset/datatabels/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="./asset/datatabels/jquery.dataTables.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

  <title>Hello, world!</title>
</head>

<body>
  <div class="container-fluid mt-3">
    <!-- tabel -->
    <div class="card table-responsive border-primary p-3">
      <table id="example" class="table table-striped table-hover border-primary" style="width:100%">
        <thead class="bg-dark nowrap text-light">
          <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $angka = 1;
          $conn = mysqli_connect('localhost', 'root', '', 'siswa');
          $result_siswa = mysqli_query(
            $conn,
            "SELECT * FROM siswa
              INNER JOIN agama
              ON siswa.id_agama = agama.id_agama"
          );
          while ($siswa = mysqli_fetch_assoc($result_siswa)) : ?>
            <tr>
              <td><?= $angka++; ?>.</td>
              <td><?= $siswa['nisn']; ?></td>
              <td><?= $siswa['nama']; ?></td>
              <td><?= $siswa['agama']; ?></td>
              <td><?= $siswa['tgl_lahir']; ?></td>
              <td><?= $siswa['alamat']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <!-- tabel -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>