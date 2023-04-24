<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>connexion</title>
  </head>
  <body>
      <?php if (isset($_GET['id'])) {
          $id = intval($_GET['id']);

          include('connex.inc.php');
          $pdo = connexion('ec05265w');
          try {
              $stmt = $pdo->prepare('SELECT nom,passeword FROM membre WHERE id = :id AND passeword = :passeword');
              $stmt->bindParam(':id :passeword', $id, $passeword);
              $stmt->execute();
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              if (count($results) > 0) {
                  $result = $results[0];
                  echo '<p> BONJOUR'.$id!'</p>';
?>
<form action="enregistrer.php" method="POST">
    <label>email : <input type="text" name="nom" value="<?php echo $result['email']; ?>"></label>
    <label>Passeword : <intput type="text" name="passeword" value=
    <label>Âge : <input type="text" name="age" value="<?php echo $result['age']; ?>"></label>
     <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
     <button type="submit">connexion</button>
</form>
<?php
              } else {
                  echo '<p>Étudiant⋅e non trouvé⋅e</p>';
              }
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