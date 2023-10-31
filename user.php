<?php
require 'function.php';
//menampilkan semua data
$karyawan = query("SELECT * FROM karyawan");

// tombol search
if (isset($_POST["searchsubmit"])) {
    $karyawan = cari($_POST["search"]);
}
//tombol add data
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        header("location: admin.php");
    } else {
        echo "<script>
        alert('Tambah Data Gagal Silahkan Ulangi Lagi Dengan Benar');
    </script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <a class="btn btn-warning" href="index.php" role="button">LogOut</a>
        </div>
    </div>

    <div class="container">
        <!-- awal card -->
        <div class="card">
            <h5 class="card-header bg-secondary text-light">Halaman User </h5>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" name="searchsubmit" type="search" id="button-addon2">Search</button>
                </div>
            </form>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($karyawan as $data) : ?>
                            <tr>
                                <th scope="row"> <?= $no; ?> </th>
                                <th scope="row"> <?= $data["nama"]; ?> </th>
                                <th scope="row"> <?= $data["nrp"]; ?> </th>
                                <th scope="row"> <?= $data["jenis_kelamin"]; ?> </th>
                                <th> <img src="img/<?= $data["foto"] ?>" alt="<?= $data["foto"] ?>"></th>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- akhir card -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>