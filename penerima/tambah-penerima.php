<?php
// Hubungkan ke database
require ("../penerima/connect.php");

// Ambil data yang dikirimkan dari formulir tambah data
$nama = htmlspecialchars($_POST['Nama_penerima']);
$alamat = htmlspecialchars($_POST['Alamat']);
$zakat_diterima = htmlspecialchars($_POST['Zakat_diterima']);
$jumlah_diterima = htmlspecialchars($_POST['Jumlah_diterima']);
$jumlah_jiwa = htmlspecialchars($_POST['Jumlah_jiwa']);
// Buat dan jalankan query untuk menambahkan data ke dalam database
$query = "INSERT INTO penerima (Nama_penerima, Alamat, Zakat_diterima, Jumlah_diterima, Jumlah_jiwa) VALUES ('$nama', '$alamat', '$zakat_diterima', '$jumlah_diterima', '$jumlah_jiwa')";
if (mysqli_query($conn, $query)) {
    
    // Output JavaScript alert
    echo "<script>function myAlert () {alert('Data berhasil ditambahkan');}</script>";

    // Delay the redirection using meta refresh
    echo "<meta http-equiv='refresh' content='0;url=penerima.php'>";

    // You can also use JavaScript for redirection after a delay
    // echo "<script>setTimeout(function() { window.location.href = 'dashboard.php'; }, 1000);</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
