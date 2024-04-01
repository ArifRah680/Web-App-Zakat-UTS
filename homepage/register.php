<?php
require ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Check if passwords match
    if ($password != $confirm_password) {
        echo "<script>alert ('Password tidak cocok!'); </script>";;
    } else {
        // Prepare SQL statement to insert data into the "user" table
        $sql = "INSERT INTO user (Username, Password, Level) VALUES ('$username', '$password', 'user')";
        
        if ($conn->query($sql) === TRUE) {
        // Output JavaScript alert
        echo "<script>alert ('Berhasil mendaftar!')</script>";

        // Delay the redirection using meta refresh
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";

        // You can also use JavaScript for redirection after a delay
        // echo "<script>setTimeout(function() { window.location.href = 'dashboard.php'; }, 1000);</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Zakat | UCA</title>

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

    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="wrapper">

        <div class="form-box">

            <img src="../img/logo.png" alt="">

            <p style="text-align: center; font-style: italic; padding: 0 0 20px;">Halo, ini halaman daftar<br>
            こんにちは、これは登録ページです。</p>

            <form class="forms" action="" method="POST"> 
                <!-- <h3>Register Here!</h3> -->
            
                <input type="text" placeholder="ID or Username" id="username" name="username" autocomplete=off required>

                <input type="text" placeholder="Password" id="password" name="password" autocomplete=off required>
            
                <input type="confirm_password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required> 
            
                <button type="submit">Register</button>
                
            </form>

        </div>

    </div>