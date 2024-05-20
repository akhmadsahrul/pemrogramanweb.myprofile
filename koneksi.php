<?php
$koneksi = new mysqli("localhost", "root", "", "pemrogramanweb");

if ($koneksi->connect_error) {
    die('tidak terhubung database: ' . $koneksi->connect_error);
}
?>
