<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
      <?php 
       if (isset($_POST['prenom'])
       && isset($_POST['nom'])
                && isset($_POST['email'])
                && isset($_POST['passeword'])
                && isset($_POST['date_n'])) {
          $prenom = $_POST['prenom'];
          $nom = $_POST['nom'];
          $email = $_POST['email'];
          $passeword= $_POST['passeword'];
          $date_n= $_POST['date_n'];
          $date_n= date("d-m-Y",strtotime($date_n));

          include('connex.inc.php');
	  include('creation.php');
          $pdo = connexion('ec05265w');
	  create_membre($pdo);
          try {
              $stmt = $pdo->prepare('INSERT INTO etudiant (prenom, nom, email, passeword, date_naissance) VALUES (:prenom, :nom, :email, :passeword, :date_naissance)');
              $stmt->bindParam(':prenom', $prenom);
              $stmt->bindParam(':nom', $nom);
              $stmt->bindParam(':email', $email);
              $stmt->bindParam(':passeword', $passeword);
              $stmt->bindParam('date_naissance', $date_n);

              $stmt->execute();

              if ($stmt->rowCount() == 1) {
                  echo '<p> BIENVENUE $prenom! </p>';
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
