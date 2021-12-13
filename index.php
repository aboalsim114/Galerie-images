<?php

require "./database/db.php";
$db = new dbObj();
$connection =  $db->getConnstring();



$galery = "SELECT * FROM galery";
$run = mysqli_query($connection,$galery);





?>


<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h2>ImagesGalery</h2>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Add_image.php">Add Image</a></li>

        </ul>
    </nav>

    <div class="imagesDisplay">
   

    <?php while($data = mysqli_fetch_assoc($run)): ?>
    <div class="card mb-3">
  <img src="<?= $data["image"] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title"><?=  $data["titre"] ?></h3>
    <a href="Fiche_Article.php?id=<?= $data["id"]?>" class="btn btn-primary">Voir Plus</a>

  </div>
</div>

<?php endwhile  ?>




    </div>

</body>
</html>