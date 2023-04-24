<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Résultats</title>
  </head>
  <body>
a
a
a
a
    <?php if (isset($_POST['nom'])
&& isset($_POST['filiere'])
&& isset($_POST['tri'])
&& isset($_POST['ordre'])
    ) {
        include("connex.inc.php");
        $pdo = connexion('ec05265w');
        try {
            $tri = 'age';
            if ($_POST['tri'] === 'filiere') {
                $tri = 'filiere';
            }
            $ordre = 'ASC';
            if ($_POST['ordre'] === 'DESC') {
                $ordre = 'DESC';
            }
            
            $req = $pdo->prepare("SELECT * FROM etudiant WHERE nom LIKE :nom AND filiere LIKE :filiere ORDER BY $tri $ordre");
            $nom = '%'.$_POST['nom'].'%';
            $filiere = $_POST['filiere'];
            if ($filiere == "all") {
                $filiere = '%';
            }
            $req->bindParam(':nom', $nom);
            $req->bindParam(':filiere', $filiere);
            $req->execute();
            $etudiants = $req->fetchAll(PDO::FETCH_ASSOC);
            echo '<p>'.count($etudiants).' étudiant⋅es correspondent à votre requête :</p>';
            echo '<ul>';
            foreach($etudiants as $etudiant) {
                // echo "<li>${etudiant['nom']} ${etudiant['age']} ${etudiant['filiere']}</li>";
                echo '<li>'.$etudiant['nom'].' '.$etudiant['age'].' '.$etudiant['filiere'].' <a href="supprimer.php?id='.$etudiant['id'].'">supprimer</a> <a href="modifier.php?id='.$etudiant['id'].'">modifier</a></li>';
            }
            echo '</ul>';
            $req->closeCursor();
            $pdo = null;
        } catch(PDOException $e) {
            echo $e->getMessage();
            echo '<p>Problème avec la base</p>';
        }
    } else {
        echo '<p>Critères de recherche non spécifiés, <a href="rechercher.html">retournez sur le formulaire.</a></p>';
    } ?>
  </body>
</html>