<?php

function create($pdo) {
    $table= "CREATE TABLE IF NOT EXISTS etudiant (
	    nom VARCHAR(255) NOT NULL,
	 filiere ENUM('L1','L2','L3'),
	 age INT NOT NULL
)";
$pdo->exec($table);
}
?>
