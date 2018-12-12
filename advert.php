<?php
    session_start();
    include_once("db.php");



    if(isset($_POST['post'])){
      $title = strip_tags($_POST['titel']);
      $content = strip_tags($_POST['omschrijving']);
      $ini_prijs = strip_tags($_POST['initieleprijs']);
      $user_id = ($_SESSION["user_id"]);

      $title = mysqli_real_escape_string($db, $title);
      $content = mysqli_real_escape_string($db, $content);

      $ini_prijs = mysqli_real_escape_string($db, $ini_prijs);


      $sql = "INSERT into advertentie (titel, omschrijving, ini_prijs, user_id) VALUES ('$title', '$content', '$ini_prijs', '$user_id')";

    if($title == "" || $content == ""|| $ini_prijs == "") {
      echo "Vul de velden in";
        return;
     }
      mysqli_query($db, $sql);


      header("Location: index.php");
    }
 ?>

 <!DOCTYPE html>
<html>
  <head>
    <?php include 'header.php';?>
    <link rel="stylesheet" type="text/css" href="blog.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Adverntie plaatsen</title>
  </head>
  <body>
    <form action ="advert.php" method="post" enctype="multipart/form-data">
      <input placeholder="Titel" name="titel" type="text" autofocussize="48>"><br /><br />
      <textarea placeholder="omschrijving" name="omschrijving" rows="20" cols="50"></textarea><br />
      <input placeholder="initiele prijs" type="number" name="initieleprijs"><br>
      <input name="post" type="submit" value="Post">
    </form>
  </body>
</html>
