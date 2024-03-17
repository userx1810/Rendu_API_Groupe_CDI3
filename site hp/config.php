<?php
// Informations de connexion à la base de données
$host = "localhost"; // Nom d'hôte de la base de données (généralement localhost)
$user = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL (vide par défaut)
$database = "cdiprojet"; // Nom de la base de données  créée dans phpMyAdmin

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
} else {
   // echo "Connexion réussie à la base de données";
}
?>

