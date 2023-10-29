<?php
require 'function.php';
$id = $_GET["id"];


if (hapus($id) > 0) {
    header("location: admin.php");
} else {
    header("location: admin.php");
}
