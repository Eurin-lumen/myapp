<?php
class User {
    // déclarer les propriétés pour stocker les informations de l'utilisateur
    public $username;
    public $email;
    public $password;

    // constructeur pour initialiser les propriétés lors de la création d'un objet Utilisateur
    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // méthode pour enregistrer un utilisateur en base de données
     // code pour enregistrer un utilisateur en base de données
     public function register($username, $email, $password) {
        // Vérification de la longueur du nom d'utilisateur
        if (strlen($username) < 5 || strlen($username) > 20) {
            throw new Exception("Le nom d'utilisateur doit avoir entre 5 et 20 caractères.");
        }
        
        // Vérification de la validité de l'adresse email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse email non valide.");
        }
        
        // Vérification de la longueur du mot de passe
        if (strlen($password) < 8) {
            throw new Exception("Le mot de passe doit avoir au moins 8 caractères.");
        }
        
        // Hachage du mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // Préparation de la requête d'insertion
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $username, $email, $password);
        
        // Exécution de la requête
        if (!$stmt->execute()) {
            throw new Exception("Erreur lors de l'enregistrement de l'utilisateur en base de données.");
        }
        
        // Fermeture de la requête préparée
        $stmt->close();
        
        return true;
    }

    // méthode pour vérifier les informations de connexion d'un utilisateur
   
    public function login() {
        // Récupérer les données de l'utilisateur
        $email = $this->email;
        $password = $this->password;
    
        // Vérifier si l'adresse email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse email non valide");
        }
    
        // Vérifier si le mot de passe est vide
        if (empty($password)) {
            throw new Exception("Le mot de passe ne peut pas être vide");
        }
    
        // Hacher le mot de passe pour le stocker en sécurité
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        // Préparer la requête SQL pour vérifier les informations de connexion de l'utilisateur
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";
        $stmt = $this->conn->prepare($sql);
    
        // Lier les données à la requête
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
    
        // Exécuter la requête
        $stmt->execute();
    
        // Récupérer le nombre de résultats
        $num = $stmt->rowCount();
    
        // Vérifier si les informations de connexion sont correctes
        if ($num > 0) {
            // Initialiser les données de session pour l'utilisateur
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
    
            // Retourner vrai pour indiquer la réussite de la connexion
            return true;
        } else {
            // Retourner faux pour indiquer l'échec de la connexion
            return false;
        }
    }
    
}