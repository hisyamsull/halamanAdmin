<?php
require 'koneksi.php';


// query function
function query($query)
{
    global $conn;
    $rows = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// add data function
function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT into karyawan 
    VALUES 
    ('','$nama', $nrp, '$jenis_kelamin', '$foto' )
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// upload file function
function upload()
{
    $namaFoto = $_FILES["foto"]["name"];
    $tmpName = $_FILES["foto"]["tmp_name"];
    $type = $_FILES["foto"]["type"];
    $size = $_FILES["foto"]["size"];
    $erorFoto = $_FILES["foto"]["error"];

    // cek foto di isi atau tidak
    if ($erorFoto == 4) {
        echo "<script>
            alert('foto harus di isi!!');
        </script>";
        return false;
    }

    // cek ekstemsi file
    $ekstensi = ['jpg', 'png', 'jpeg'];
    $ekstensiFoto = explode(".", $namaFoto);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if (!in_array($ekstensiFoto, $ekstensi)) {
        echo "<script>
        alert('yang anda upload bukan gambar');
    </script>";
        return false;
    }

    //cek ukuran file
    if ($size > 1000000) {
        echo "<script>
        alert('ukuran terlalu besar');
    </script>";
        return false;
    }
    //bikin nama file baru

    $namaFotoBaru = uniqid();
    $namaFotoBaru .= ".";
    $namaFotoBaru .= $ekstensiFoto;

    //upload file 
    move_uploaded_file($tmpName, 'img/' . $namaFotoBaru);

    return $namaFotoBaru;
}

// delete data function
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE From karyawan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// edit data function
function edit($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $fotolama = htmlspecialchars($data["fotolama"]);

    if ($_FILES["foto"]["error"] == 4) {
        $foto = $fotolama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE karyawan SET 
    nama = '$nama',
    nrp = '$nrp',
    jenis_kelamin = '$jenis_kelamin',
    foto = '$foto'
    WHERE id = $id
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// search function
function cari($search)
{
    $query = "SELECT * FROM karyawan WHERE 
    nama LIKE '%$search%' OR
    nrp LIKE '%$search%'";
    return query($query);
}

// fungsi registrasi 
function registrasi($data)
{
    global $conn;
    $username = stripslashes(htmlspecialchars($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $jenis_kelamin = $data["jenis_kelamin"];


    // cek duplicat username pada database
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username yang anda gunakan sudah ada');
        </script>";
        return false;
    }

    // konfirmasi password 
    if ($password != $password2) {
        echo "<script>
        alert('Konfirmasi Password Berbeda');
        </script>";
        return false;
    }

    //enskripsi pasword 

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT into users 
    VALUES 
    ('','$username', '$password', '$email', '$jenis_kelamin' )
    ");
    return mysqli_affected_rows($conn);
}
