<?php
include 'config.php';

$email = $_POST['email'];
$mot_de_passe = $_POST['password'];

// Rechercher l'administrateur
$result = $conn->query("SELECT * FROM admins WHERE email = '$email'");
$admin = $result->fetch_assoc();

if ($admin && password_verify($mot_de_passe, $admin['mot_de_passe'])) {
    session_start();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['role'] = $admin['role'];

    // Créer une session pour la déconnexion automatique
    $token = bin2hex(random_bytes(16));
    $conn->query("INSERT INTO sessions (admin_id, session_token) VALUES ({$admin['id']}, '$token')");
    $_SESSION['session_token'] = $token;

    echo json_encode(['success' => true, 'message' => 'Connexion réussie !']);
} else {
    echo json_encode(['success' => false, 'message' => 'Email ou mot de passe incorrect.']);
}

$conn->close();
?>
