<?php
// FUNCTION CONNECT
$conn = mysqli_connect("localhost", "root", "", "zakat");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// DATA QUERY
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
    $jenis_zakat = htmlspecialchars($data["Jenis_zakat"]);
    $jumlah = htmlspecialchars($data["Jumlah"]);
    $tanggal = htmlspecialchars(data["Tanggal"]);

    $query = "INSERT INTO donatur VALUES ('', '$nama', '$alamat', '$jenis_zakat', '$jumlah', '$tanggal')";
    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);

    if (mysqli_query($conn, $query)) {
    
        // Output JavaScript alert
        echo "<script>function myAlert(){alert('Data berhasil ditambahkan');}</script>";
    
        // Delay the redirection using meta refresh
        echo "<meta http-equiv='refresh' content='0;url=dashboard.php'>";
    
        // You can also use JavaScript for redirection after a delay
        // echo "<script>setTimeout(function() { window.location.href = 'dashboard.php'; }, 1000);</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}


// FUNGSI HAPUS
function hapus ($id) {
    global $conn;
    mysqli_query ($conn, "DELETE FROM donatur WHERE ID_donatur = $id");

    return mysqli_affected_rows($conn);
}

// Fungsi untuk melakukan edit data
function editData($id_donatur, $nama, $alamat, $jenis_zakat, $jumlah, $tanggal) {
    global $conn;

    // Melakukan sanitasi data untuk mencegah SQL injection
    $id_donatur = $conn->real_escape_string($id_donatur);
    $nama = $conn->real_escape_string($nama);
    $alamat = $conn->real_escape_string($alamat);
    $jenis_zakat = $conn->real_escape_string($jenis_zakat);
    $jumlah = $conn->real_escape_string($jumlah);
    $tanggal = $conn->real_escape_string($tanggal);

    // Query update data
    $query = "UPDATE donatur SET Nama='$nama', Alamat='$alamat', Jenis_zakat='$jenis_zakat', Jumlah='$jumlah', Tanggal='$tanggal' WHERE ID_donatur='$id_donatur'";

    // Eksekusi query
    if ($conn->query($query) === TRUE) {

        echo "<script> alert('Data berhasil diupdate!');</script>";
        
        header ("Location:dashboard.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

?>