<?php
// Configuration des paramètres de connexion à la base de données
$host = "localhost";
$db_name = "nom_de_la_base_de_données";
$username = "nom_d_utilisateur";
$password = "mot_de_passe";

// Essayer de se connecter à la base de données
try {
    $connexion = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // Afficher un message d'erreur en cas d'échec de la connexion à la base de données
    echo "Erreur de connexion à la base de données : " . $exception->getMessage();
}
