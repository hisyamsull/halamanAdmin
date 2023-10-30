<?php
require 'function.php';
//menampilkan semua data
$karyawan = query("SELECT * FROM karyawan");

if (isset($_POST["searchsubmit"])) {
    $karyawan = cari($_POST["search"]);
}




//tombol add data
if (isset($_POST["submit"])) {
    tambah($_POST);
    header("location: admin.php");
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
    <!-- modal -->
    <!-- addmodal -->
    <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data </h1>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <label for="nama">Nama </label>
                        <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="addon-wrapping">
                        <label for="nrp">NRP</label>
                        <input id="nrp" type="text" name="nrp" class="form-control" placeholder="NRP" aria-label="NRP" aria-describedby="addon-wrapping">
                        <label for="jenis_kelamin">Jenis Kelamin</label><br>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="from-select">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select><br>
                        <label for="foto">Foto</label>
                        <input id="foto" type="text" name="foto" class="form-control" placeholder="Foto" aria-label="Foto" aria-describedby="addon-wrapping">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button name="submit" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir addmodal -->
    <!-- Akhir modal -->
    <div class="container">
        <!-- awal card -->
        <div class="card">
            <h5 class="card-header bg-secondary text-light">Halaman Admin</h5>
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
                                <!-- modal box -->
                                <!-- Button trigger modal -->
                                <th> <a href="edit.php?id=<?= $data["id"]; ?>"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editmodal">
                                            Edit </button></a></th>
                                <th> <a href="hapus.php?id=<?= $data["id"]; ?> "><button type="button" class="btn btn-danger" data-bs-toggle="modal" onclick="return confirm('apakah anda yakin?') ">
                                            Hapus</button></a></th>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">
                Tambah</button>
        </div>
    </div>
    <!-- akhir card -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>