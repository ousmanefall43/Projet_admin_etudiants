<?php
include 'config.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$niveau = $_POST['niveau'];

// Générer un matricule unique
$matricule = 'ETU-' . strtoupper(substr(md5(time()), 0, 8));

$conn->query("INSERT INTO etudiants (nom, prenom, dob, email, telephone, niveau, matricule) VALUES ('$nom', '$prenom', '$dob', '$email', '$phone', '$niveau', '$matricule')");

if ($conn->affected_rows > 0) {
    echo json_encode(['success' => true, 'matricule' => $matricule, 'message' => 'Inscription réussie !']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'inscription.']);
}

$conn->close();
?>
