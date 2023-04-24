<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Modification</title>
  </head>
  <body>
a
a
a
      <?php if (isset($_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['passeword'])) {
          $id = $_POST['prenom'];
          $nom = $_POST['nom'];
          $filiere = $_POST['email'];
          $age = intval($_POST['passeword']);

          include('connex.inc.php');
          $pdo = connexion('ec05265w');
          try {
              $stmt = $pdo->prepare('UPDATE etudiant SET nom=:nom, filiere=:filiere, age=:age WHERE id=:id');
              $stmt->bindParam(':id', $id);
              $stmt->bindParam(':nom', $nom);
              $stmt->bindParam(':filiere', $filiere);
              $stmt->bindParam(':age', $age);

              $stmt->execute();

              if ($stmt->rowCount() == 1) {
                  echo '<p>Modification effectuée</p>';
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