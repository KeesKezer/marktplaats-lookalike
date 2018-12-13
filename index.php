<?php
session_start();
include_once("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Marktplaats lite</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href= "style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php require_once "header.php" ?>

</head>
<body>

</head>
<body>
  <?php

    $sql = "SELECT * from advertentie";
    $res = mysqli_query($db,$sql);
    $posts = "";

    if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {

      $id = $row['advertentie_id'];
      $title = $row['titel'];
      $omschrijving = $row['omschrijving'];
      $date = $row['plaatsingstijd'];

      $posts .= "<div class='container-fluid text-center'>
                  <div class='row content'>
                    <div class='col-sm-2 sidenav'>
                      <p><a href='#'></a></p>
                      <p><a href='#'></a></p>
                      <p><a href='#'></a></p>
                    </div>
                    <div class='col-sm-8 text-left'>
                      <h1>$id</h1>
                      <h2>$title</h2>
                      <p>$omschrijving.</p>
                      <hr>
                      <h3>$date</h3>
                      <p>Lorem ipsum...</p>
                    </div>

                    </div>
                  </div>
                </div>";


              }

      echo $posts  ;
    } else {
      echo "Er zijn geen posts";
    }

    ?>





</body>
</html>
