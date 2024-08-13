<?php
session_start();
include 'config.php';

// Supprimer la session en cours
session_unset();
session_destroy();

// Supprimer le token de session
if (isset($_SESSION['session_token'])) {
    $token = $_SESSION['session_token'];
    $conn->query("DELETE FROM sessions WHERE session_token = '$token'");
}

header('Location: login.html');
exit();
?>
