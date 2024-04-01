<?php
// FUNCTION CONNECT
$conn = mysqli_connect("localhost", "root", "", "zakat");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>