<?php
session_start();
include 'config.php';

// Vérifier la session et rediriger si nécessaire
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.html');
    exit();
}

// Vérifier l'inactivité
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 60) {
    // Déconnexion après 1 minute d'inactivité
    session_unset();
    session_destroy();
    header('Location: login.html');
    exit();
}
$_SESSION['last_activity'] = time();

// Afficher le tableau de bord basé sur le rôle
if ($_SESSION['role'] === 'super_admin') {
    // Afficher les boutons pour les étudiants et les administrateurs
    echo '<a href="students_dashboard.php">Tableau de Bord Étudiants</a>';
    echo '<a href="admins_dashboard.php">Tableau de Bord Administrateurs</a>';
} else {
    // Autres actions pour les admins normaux
}
?>
