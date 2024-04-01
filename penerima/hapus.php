<?php
require ("../penerima/connect.php");

$id = $_GET["id"];

if(hapus($id) > 0) {

    echo "<script>function myAlert () {alert('Data berhasil dihapus');}</script>";

    // Delay the redirection using meta refresh
    echo "<meta http-equiv='refresh' content='0;url=penerima.php'>";

    // You can also use JavaScript for redirection after a delay
    // echo "<script>setTimeout(function() { window.location.href = 'dashboard.php'; }, 1000);</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>