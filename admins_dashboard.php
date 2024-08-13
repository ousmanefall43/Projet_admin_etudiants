<?php
include 'config.php';
session_start();

// Vérifier la session
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.html');
    exit();
}

// Afficher les actions pour les administrateurs
echo '<a href="create_admin.php">Créer un administrateur</a>';
echo '<a href="list_admins.php">Lister les administrateurs</a>';
?>
