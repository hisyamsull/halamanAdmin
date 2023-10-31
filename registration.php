<?php
require 'function.php';
if (isset($_POST["submit"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Berhasil Melakukan Registrasi');
        document.location.href = 'index.php';
        </script>";
    }
    echo "<script>
        alert('Gagal Melakukan Registrasi');
        document.location.href = 'registration.php';
        </script>";
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Registrasi</title>
    <style>
        .container {
            margin-top: 50px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <div class="container">
        <div class="card bg-primary-subtle">
            <div class="div d-flex justify-content-start mt-2 ms-2 mb-1">
                <a href="index.php"><button name="login" class="btn btn-primary">Back</button></a>
            </div>
            <div class="card-header fs-2  d-flex justify-content-center ">
                Halaman Registrasi
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-floating mb-3 ">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password2" type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Konfirmasi Pasword</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="jenis_kelamin" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perepmuan</option>
                        </select>
                        <label for="floatingSelect">Pilih Jenis Kelamin</label>
                    </div>
                    <div class="div d-flex justify-content-end">
                        <button name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>