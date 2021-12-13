<?php

require "./database/db.php";
$db = new dbObj();
$connection =  $db->getConnstring();

if(isset($_POST["Add_image"])){

    $var1 = rand(1111,9999);  
    $var2 = rand(1111,9999);  
	
    $var3 = $var1.$var2;  
    $var3 = md5($var3);   
    $fnm = $_FILES["image"]["name"];    
    $dst = "./all_images/".$var3.$fnm;  
    $dst_db = "all_images/".$var3.$fnm; 

    $titre = htmlspecialchars($_POST["titre"]);
   $author = htmlspecialchars($_POST["author"]);
    

    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  
    $check = mysqli_query($connection,"insert into galery(titre,image,author) values('$titre','$dst_db','$author')");  


    if($check)
    {
    	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>'; 
        header("lcation:index.php");
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

}



?>

<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
<form  method="post" enctype="multipart/form-data">
      <h1>Add Your Image</h1>
      <input name="name" type="text" class="feedback-input" placeholder="titre" />   
      <input name="author" type="text" class="feedback-input" placeholder="author" />   
        <input class="feedback-input" type="file" name="image">
      <input type="submit" name="Add_image" value="Publier">
    </form>

</body>
</html>