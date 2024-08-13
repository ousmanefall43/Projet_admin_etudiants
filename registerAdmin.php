<?php
include 'config.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = $_POST['role'];

// Créez un super admin par défaut si la table est vide
if ($role == 'super_admin') {
    $conn->query("INSERT INTO admins (nom, prenom, email, mot_de_passe, role) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', 'super_admin')");
} else {
    $conn->query("INSERT INTO admins (nom, prenom, email, mot_de_passe, role) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', 'admin')");
}

if ($conn->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Inscription réussie !']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'inscription.']);
}

$conn->close();
?>
