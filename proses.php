<?php
session_start();
include "koneksi.php";

// Pastikan pengguna sudah login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username']; // Mendapatkan username dari input hidden
    $foto = $_FILES['foto'];

    // Proses pengunggahan foto jika ada file yang diunggah
    if ($foto['error'] === UPLOAD_ERR_OK) {
        $fotoName = basename($foto['name']);
        $fotoTmpName = $foto['tmp_name'];
        $fotoPath = 'assets/' . $fotoName;

        // Pindahkan file yang diunggah ke folder tujuan
        if (move_uploaded_file($fotoTmpName, $fotoPath)) {
            // Query untuk memperbarui data termasuk foto
            $query = "UPDATE user SET nama='$nama', foto='$fotoName' WHERE username='$username'";
        } else {
            echo '<script>alert("Gagal mengunggah foto.");</script>';
            exit();
        }
    } else {
        // Query untuk memperbarui data tanpa foto
        $query = "UPDATE user SET nama='$nama' WHERE username='$username'";
    }

    // Jalankan query
    if (mysqli_query($koneksi, $query)) {
        // Perbarui data sesi
        $_SESSION['user']['nama'] = $nama;
        if ($foto['error'] === UPLOAD_ERR_OK) {
            $_SESSION['user']['foto'] = $fotoName;
        }

        echo '<script>
                alert("Profil Anda telah diubah.");
                window.location.href = "profile.php";
            </script>';
    } else {
        echo '<script>alert("Pembaruan gagal, silakan coba lagi.");</script>';
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>