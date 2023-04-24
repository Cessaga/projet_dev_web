<?php

$mysqli = new mysqli("webetu.univ-st-etienne.fr", "ec05265w", "4HM2I5P1", "ec05265w");

// Vérifier la connexion
if ($mysqli->connect_errno) {
    echo "Échec de la connexion à la base de données : " .$mysqli->connect_error;
    exit();
}

$sql= "SELECT nom FROM basket";
$resultat = $mysqli->query($sql);

if (!$resultat) {
    echo "Erreur lors de l'exécution de la requête, la paire n'a pas pu être récupéré : " .$mysqli->error;
    exit();
}

$tableau_resultats = array();

while($ligne = $resultat->fetch_assoc()){
    $tableau_resultats[] = $ligne;
}

$resultat->close();

echo"<table>";

?>