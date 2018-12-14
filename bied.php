<?php
    session_start();
    include_once("db.php");

      $adid = $_GET['id'];
      $sql = "SELECT * from advertentie INNER JOIN users on advertentie.user_id= users.user_id WHERE advertentie_id = $adid";
      $res = mysqli_query($db,$sql);



      if(mysqli_num_rows($res) > 0) {
      while($row = mysqli_fetch_assoc($res)) {

        $id = $row['advertentie_id'];
        $uid = $row['username'];
        $usid= $row['user_id'];

        $title = $row['titel'];
        $omschrijving = $row['omschrijving'];
        $date = $row['plaatsingstijd'];
        $prijs = $row['ini_prijs'];
      }
    }



        if (isset($_POST['enter'])){
                if (!empty ($_POST['bied'])){
                    $bied = $_POST['bied'];
                    $userid = ($_SESSION['user_id']);
                    $advid =  $_GET['id'];
                    $sql2 = "INSERT INTO biedingen (user_id, huidig_bod, advertentie_id) VALUES ('$userid', '$bied', '$advid')";
var_dump($sql2);
die();






                }
                mysqli_query($db, $sql2);
          //     header("Location: index.php");
                }


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
      <div class='container-fluid text-center'>
        <div class='row content'>
          <div class='col-sm-2 sidenav'>
            <p><a href='#'></a></p>
            <p><a href='#'></a></p>
            <p><a href='#'></a></p>
          </div>
          <div class='col-sm-8 text-left'>
            <h1> <?php echo $id ?> </h1>
            <h1> <?php echo $uid ?> </h1>
            <h2> <?php echo $title ?> </h2>
            <h3> <?php echo $omschrijving ?> </h3>
            <h2> <?php echo $date ?> </h2>
            <form action="bied.php" enctype="multipart/form-data" method="post" name="myForm" />
            <table>
            <tr>
              <td><b>bied</b></td>
              <td><input type="number" size="10" maxlength="10" name="bied" ></td>
              <input name="enter" type="submit" value="bied">





          </div>

            </div>
          </div>
        </div>






    </body>
    </html>
