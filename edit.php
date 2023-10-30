<?php
require 'function.php';
$id = $_GET["id"];
$data = query("SELECT * FROM karyawan WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (edit($_POST) > 0) {
        header("location: admin.php");
    } else {
        echo "data tidak berhasil di ganti";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <style>
        .container {
            max-width: 500px;
            margin-top: 50px;

        }

        .judul {
            text-align: center;
        }

        .input {
            max-width: 600px;
            margin-top: 30px;
            margin-left: 30px;
            margin-bottom: 30px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card bg-info">
            <h5 class="card-header bg-primary text-light ">Halaman Edit Data</h5>
            <div class="input">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $data["id"] ?>">
                        <input type="hidden" name="fotolama" value="<?= $data["foto"] ?>">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input name="nama" type="nama" class="form-control" id="nama" value="<?= $data["nama"] ?>">
                        <label for="nrp" class="form-label">NRP</label>
                        <input name="nrp" type="nrp" class="form-control" id="nrp" value="<?= $data["nrp"] ?>">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="foto" class="form-label">Foto</label>
                        <th> <img src="img/<?= $data["foto"] ?>" alt="<?= $data["foto"] ?>"></th>
                        <input name="foto" type="file" class="form-control" id="foto">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>