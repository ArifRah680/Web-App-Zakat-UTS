<?php
    require ("../penerima/connect.php");
    $data = query ("SELECT * FROM penerima");

    // AMBIL DATA DARI URL
    $id = $_GET["id"];

    // QUERY DATA DONARU BERDASARKAN ID
    $penerima = query ("SELECT * FROM penerima WHERE ID_penerima = $id")[0];

    // Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari form
    $id_penerima = $_POST["id"];
    $nama = $_POST["Nama_penerima"];
    $alamat = $_POST["Alamat"];
    $zakat_diterima = $_POST["Zakat_diterima"];
    $jumlah_diterima = $_POST["Jumlah_diterima"];
    $jumlah_jiwa = $_POST["Jumlah_jiwa"];

    // Panggil fungsi untuk melakukan edit data
    editData($id_penerima, $nama, $alamat, $zakat_diterima, $jumlah_diterima, $jumlah_jiwa);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Web Aplikasi Zakat| UCA</title>

    <!-- Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Licorice&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Licorice&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Date Picker -->
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="edit.css">
    
</head>
<body>

    <div class="container">
        <aside>
            
            <h1>Dashboard</h1>

            <div class="nav">
                <a href="../dashboard/dashboard.php"><span class="material-symbols-outlined">
                    person_add
                    </span>Donatur</a>
                    
                <a href="penerima.php"><span class="material-symbols-outlined">
                    diversity_1
                    </span>Penerima Zakat</a>

                <a href="../transaksi/transaksi.php"><span class="material-symbols-outlined">
                    payments
                    </span>Transaksi</a>
            </div>

            <button class="logout" id="logoutBtn">Log Out</button>

            <script>
                // Function to handle logout
                function handleLogout() {
                // Ask for confirmation before logout
                var confirmLogout = confirm("Apakah anda yakin ingin logout?");
                if (confirmLogout) {
                // Lakukan permintaan logout ke logout.php
                fetch("logout.php")
                .then(response => {
                if (response.ok) {
                    // Berhasil logout
                    alert("Logged out successfully!");
                    // Redirect ke halaman utama
                    window.location.href = "../homepage/index.php";
                } else {
                    // Tampilkan pesan kesalahan jika terjadi masalah saat logout
                    alert("Failed to logout. Please try again.");
                }
                })
                .catch(error => {
                console.error("Error:", error);
                // Tampilkan pesan kesalahan jika terjadi masalah saat fetch
                alert("An error occurred. Please try again.");
                });
                }
                }

                // Attach event listener to logout button
                document.getElementById("logoutBtn").addEventListener("click", handleLogout);
                </script>

            
        </aside>
        <main>


            <!-- FORM EDIT -->


            <div class="wrapperEdit">

                <div class="shape2"></div>
                <div class="shape1"></div>

                <form method="POST" class="myform">

                    <h1>Update Data Baru</h1>

                    <a href="penerima.php" class="closeBtn"><span class="material-symbols-outlined">close</span></a>
                    
                    <!-- <label class="form-input" for="ID_donatur">ID Donatur</label>
                    <input class="form-input" type="text" id="ID_donatur" name="ID_donatur" > -->
                    <input type="hidden" name="id" value="<?= $penerima["ID_penerima"];?>">

                    <label class="form-input" for="Nama_penerima">Nama</label>
                    <input class="form-input" placeholder="Nama Donatur"type="text" id="Nama_penerima" name="Nama_penerima" value="<?= $penerima["Nama_penerima"]?>" required>

                    <label class="form-input" for="Alamat">Alamat</label>
                    <input class="form-input" placeholder="Alamat" type="text" id="Alamat" name="Alamat" value="<?= $penerima["Alamat"]?>" required>
                    
                    <label class="form-input" for="Zakat_diterima">Jenis Zakat</label>
                    <input class="form-input" placeholder="Barang yang di donasi" type="text" id="Zakat_diterima" name="Zakat_diterima" value="<?= $penerima["Zakat_diterima"]?>" required>

                    <label class="form-input" for="Jumlah_diterima">Jumlah yang diterima</label>
                    <input class="form-input" placeholder="Masukkan jumlah" type="text" id="Jumlah_diterima" name="Jumlah_diterima" value="<?= $penerima["Jumlah_diterima"]?>" required>
                    
                    <label class="form-input" for="Jumlah_jiwa">Jumlah jiwa</label>
                    <input class="form-input" placeholder="Masukkan jumlah yang mengkonsumsi" type="text" id="Jumlah_jiwa" name="Jumlah_jiwa" value="<?= $penerima["Jumlah_jiwa"]?>" required>
                    
                    <button type="submit" action="edit.php" class="submit">Update</button>
                </form>
            </div>



        </main>

    </div>
    

    <script>
    $(document).ready(function() {
        // Inisialisasi date picker
        $("#Tanggal").datepicker({
            dateFormat: 'yy-mm-dd' // Format tanggal yang diinginkan (opsional)
        });
    });
    </script>

    <script src="dashboard.js"></script>
</body>
</html>
