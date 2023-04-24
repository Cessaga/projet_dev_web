<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Insertion</title>
  </head>
  <body>
      <?php 
       if (isset($_POST['nom'])
       && isset($_POST['filiere'])
                && isset($_POST['age'])) {
          $nom = $_POST['nom'];
          $filiere = $_POST['filiere'];
          $age = intval($_POST['age']);

          include('connex.inc.php');
	  include('create.php');
          $pdo = connexion('ec05265w');
	  create($pdo);
          try {
              $stmt = $pdo->prepare('INSERT INTO etudiant (nom, filiere, age) VALUES (:nom, :filiere, :age)');
              $stmt->bindParam(':nom', $nom);
              $stmt->bindParam(':filiere', $filiere);
              $stmt->bindParam(':age', $age);

              $stmt->execute();

              if ($stmt->rowCount() == 1) {
                  echo '<p>Ajout effectué</p>';
              } else {
                  echo '<p>Erreur</p>';
              }
          } catch(PDOException $e) {
              echo '<p>Problème PDO</p>';
              echo $e->getMessage();
          }
          $stmt->closeCursor();
          $pdo = null;
      } else {
          echo "<p>Mauvais paramètres</p>";
      }?>
  </body>
</html>
