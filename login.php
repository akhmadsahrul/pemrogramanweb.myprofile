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
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $_SESSION['user'] = $data;
            echo '<script>alert("Selamat datang, ' .($data['nama']) . '"); location.href="index.php";</script>';
        } else {
            echo '<script>alert("Password atau Username Salah");</script>';
        }
    }
    ?>

<div class="login-page">
  <div class="form">
    <h1>Login</h1>
    <form method="POST" class="login-form">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit">login</button>
      <p class="message">Not registered? <a href="register.php">Buat akun</a></p>
    </form>
  </div>
</div>
</body>
</html>
