<?php
include 'config.php';
session_start();

// Vérifier la session
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.html');
    exit();
}

// Afficher les actions pour les étudiants
echo '<a href="list_archived_students.php">Lister les étudiants archivés</a>';
echo '<a href="list_non_archived_students.php">Lister les étudiants non archivés</a>';
?>
