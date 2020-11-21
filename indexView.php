<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>blog </title>
</head>
<body>
    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>
    
<?php 
   while ($data =$posts->fetch()) {
?>
    <div class="news">
        <h3>
        <?= htmlspecialchars($data['titre'])?>
        <em> Le <?= $data['date_creation_fr'] ?> </em>        
        <h3>
        <p>
        <?= nl2br(htmlspecialchars($data['contenu'])) ?>
        </br>
        <em> <a href="post.php?id=<?= $data['id'] ?>" title="voir les commentaires">Commentaire</a> </em>
        </p>
    </div>

  <?php    
  }
  $posts->closeCursor();
?>




 


</body>
</html>