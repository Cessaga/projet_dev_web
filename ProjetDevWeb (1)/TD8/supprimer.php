<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Suppression</title>
  </head>
  <body>
a
a
      <?php if (isset($_GET['id'])) {
          $id = intval($_GET['id']);

          include('connex.inc.php');
          $pdo = connexion('ec05265w');
          try {
              $stmt = $pdo->prepare('DELETE FROM etudiant WHERE id = :id');
              $stmt->bindParam(':id', $id);
              $stmt->execute();
              echo '<p>'.($stmt->rowCount()).' étudiant⋅e(s) supprimé⋅e(s)</p>';
              $stmt->closeCursor();
              $pdo = null;
          } catch(PDOException $e) {
              echo '<p>Problème PDO</p>';
              echo $e->getMessage();
          }
      } else {
          echo "<p>Mauvais paramètres</p>";
      }?>
  </body>
</html>