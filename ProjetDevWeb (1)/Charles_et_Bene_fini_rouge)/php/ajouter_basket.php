<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Insertion</title>
  </head>
  <body>
      <?php 
       if (isset($_POST['nom'])
       && isset($_POST['descriptif'])) {
          $nom = $_POST['nom'];
          $descriptif = $_POST['descriptif'];

          include('connex.inc.php');
	  include('creation.php');
          $pdo = connexion('ec05265w');
	  create_basket($pdo);
          try {
              $stmt = $pdo->prepare('INSERT INTO etudiant (id, nom, descriptif) VALUES (DEFAULT, :nom, :descriptif)');
              $stmt->bindParam(':nom', $nom);
              $stmt->bindParam(':descriptif', $descriptif);

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
