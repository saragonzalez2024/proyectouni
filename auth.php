<?php
// Incluir este archivo al INICIO de toda página que solo puede ver el administrador
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
?>
