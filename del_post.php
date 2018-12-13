<?php
  session_start();
  include_once("db.php");


  if(!isset($_GET['id'])) {
   header("Location: index.php");
  }else {
    $aid = $_GET['id'];

    $sql = "DELETE  FROM advertentie WHERE advertentie_id=$aid";
    mysqli_query($db, $sql);
    header("Location: index.php");
  }

 ?>
