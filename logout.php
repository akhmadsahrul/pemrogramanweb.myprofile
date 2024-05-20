<?php
session_start();
session_destroy();
?>

<script type="text/javascript">
    alert("Selamat, Anda sudah berhasil logout.");
    location.href = "login.php";
</script>
