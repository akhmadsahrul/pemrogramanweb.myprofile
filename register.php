<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php
    if (isset($_POST['username'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = mysqli_query($koneksi, "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')");

        if ($query) {
            echo '<script>alert("Selamat, pendaftaran sudah berhasil. Silakan login."); location.href="login.php";</script>';
        } else {
            echo '<script>alert("Pendaftaran gagal, silakan coba lagi.");</script>';
        }
    }
    ?>

    <div class="login-page">
        <div class="form">
            <h1>Daftar</h1>
            <form method="POST" class="login-form">
                <input type="text" name="nama" placeholder="nama" />
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="password" />
                <button type="submit">Daftar</button>
                <p class="message">Not registered? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>