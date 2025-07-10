<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo '<script>
            alert("Debes iniciar sesión");
            window.location.href = "../../views/login.html";
          </script>';
    exit;
}
?>
