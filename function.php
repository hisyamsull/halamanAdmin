<?php
require 'koneksi.php';


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

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $foto = htmlspecialchars($data["foto"]);

    $query = "INSERT into karyawan 
    VALUES 
    ('','$nama', $nrp, '$jenis_kelamin', '$foto' )
    ";
    mysqli_query($conn, $query);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE From karyawan WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function edit($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $foto = htmlspecialchars($data["foto"]);

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

function cari($search)
{
    $query = "SELECT * FROM karyawan WHERE 
    nama LIKE '%$search%' OR
    nrp LIKE '%$search%'";
    return query($query);
}
