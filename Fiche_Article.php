<?php


require "./database/db.php";
$db = new dbObj();
$connection =  $db->getConnstring();

$id = $_GET["id"]; 

$galery = "SELECT * FROM galery WHERE id=".$id;
$run = mysqli_query($connection,$galery);



?>

<?php while ($data = mysqli_fetch_assoc($run)): ?>
<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=  $data["titre"] ?></title>
    <link rel="shortcut icon" href="<?= $data["image"]  ?>" type="image/x-icon">

</head>
<body>

<style>
 
    body{
        margin: 0;
    padding: 0;
    box-sizing: border-box;
    overflow-x: hidden;
    background-color: #2e2a24;
    font-size: 150%;
    line-height: 1.4;
    color: #f9d094;

    }

 nav{

width: 100%;
height: 3rem;
display: flex;
justify-content: space-between;
padding-left : 20px
}

nav > ul,li{
display : inline-block;
padding-right: 30px;
}

a,a:hover{
    text-decoration: none;
    color: #f9d094;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.u-clearfix:before,
.u-clearfix:after {
  content: " ";
  display: table;
}

.u-clearfix:after {
  clear: both;
}

.u-clearfix {
  *zoom: 1;
}

.subtle {
  color: #aaa;
}

.card-container {
  margin: 25px auto 0;
  position: relative;
  width: 692px;
  margin-top: 150px;
}

.card {

  padding: 30px;
  position: relative;
  box-shadow: 0 0 5px rgba(75, 75, 75, .07);
  z-index: 1;
  height: 30rem;
  background : none
}

.card-body {
  display: inline-block;
  float: left;
  width: 310px;
}

.card-number {
  margin-top: 15px;
}

.card-circle {
  border: 1px solid #aaa;
  border-radius: 50%;
  display: inline-block;
  line-height: 22px;
  font-size: 12px;
  height: 25px;
  text-align: center;
  width: 25px;
}

.card-author {
  display: block;
  font-size: 12px;
  letter-spacing: .5px;
  margin: 15px 0 0;
  text-transform: uppercase;
}

.card-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 60px;
  font-weight: 300;
  line-height: 60px;
  margin: 10px 0;
}

.card-description {
  display: inline-block;
  font-weight: 300;
  line-height: 22px;
  margin: 10px 0;
}

.card-read {
  cursor: pointer;
  font-size: 14px;
  font-weight: 700;
  letter-spacing: 6px;
  margin: 5px 0 20px;
  position: relative;
  text-align: right;
  text-transform: uppercase;
}

.card-read:after {
  background-color: #b8bddd;
  content: "";
  display: block;
  height: 1px;
  position: absolute;
  top: 9px;
  width: 75%;
}

.card-tag {
  float: right;
  margin: 5px 0 0;
}

.card-media {
  float: right;
  max-width: 100%;
  min-width: 100%;
  max-height: 100%;
  min-height:100%
}

.card-shadow {
  background-color: #fff;
  box-shadow: 0 2px 25px 2px rgba(0, 0, 0, 1), 0 2px 50px 2px rgba(0, 0, 0, 1), 0 0 100px 3px rgba(0, 0, 0, .25);
  height: 1px;
  margin: -1px auto 0;
  width: 80%;
  z-index: -1;
}
</style>


<nav>
        <h2>ImagesGalery</h2>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Add_image.php">Add Image</a></li>

        </ul>
    </nav>


    

<div class="card-container">
  <div class="card u-clearfix">
    <div class="card-body">
      <span class="card-number card-circle subtle"><?=  $data["id"] ?></span>
      <span class="card-author subtle"><?= "Publier par : " . $data["author"] ?></span>
      <h2 class="card-title"><?=  $data["titre"] ?></h2>


    </div>
    <img src="<?=  $data["image"] ?>" alt="" class="card-media" />
  </div>
  <div class="card-shadow"></div>
</div>
</body>
</html>
<?php endwhile ; ?>