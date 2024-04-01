<?php
// FUNCTION CONNECT
$conn = mysqli_connect("localhost", "root", "", "zakat");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query ( $query ) {

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ( $row = mysqli_fetch_assoc( $result) ) {
        $rows[] = $row;
    }
    return $rows;
}


// FUNGSI TAMBAH
function tambah($data) {
    global $conn;
    $nama = htmlspecialchars($data["Nama"]);
    $alamat = htmlspecialchars($data["Alamat"]);
    $jenis_zakat = htmlspecialchars($data["Zakat_diterima"]);
    $jumlah = htmlspecialchars($data["Jumlah_diterima"]);
    $tanggal = htmlspecialchars(data["Jumlah_jiwa"]);

    $query = "INSERT INTO donatur VALUES ('', '$nama', '$alamat', '$jenis_zakat', '$jumlah', '$tanggal')";
    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);

    if (mysqli_query($conn, $query)) {
    
        // Output JavaScript alert
        echo "<script>function myAlert(){alert('Data berhasil ditambahkan');}</script>";
    
        // Delay the redirection using meta refresh
        echo "<meta http-equiv='refresh' content='0;url=penerima.php'>";
    
        // You can also use JavaScript for redirection after a delay
        // echo "<script>setTimeout(function() { window.location.href = 'dashboard.php'; }, 1000);</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}


// FUNCTION HAPUS
function hapus ($id) {
    global $conn;
    mysqli_query ($conn, "DELETE FROM penerima WHERE ID_penerima = $id");

    return mysqli_affected_rows($conn);
}
?>