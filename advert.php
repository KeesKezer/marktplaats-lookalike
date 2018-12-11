<?php
    session_start();
    include_once("db.php");


    if(isset($_POST['post'])){
      $title = strip_tags($_POST['title']);
      $content = strip_tags($_POST['content']);
      $category= strip_tags($_POST['categories']);

      $title = mysqli_real_escape_string($db, $title);
      $content = mysqli_real_escape_string($db, $content);
      $date = date('l jS \of F Y h:i:s A');
      $category = mysqli_real_escape_string($db, $category);

      $sql = "INSERT into posts (title, content, date, category_id) VALUES ('$title', '$content', '$date', '$category')";

    if($title == "" || $content == ""|| $category == "") {
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
  <title>Blog Post</title>
  </head>
  <body>
    <form action ="post.php" method="post" enctype="multipart/form-data">
      <input placeholder="Title" name="title" type="text" autofocussize="48>"><br /><br />

      

      <textarea placeholder="Content" name="content" rows="20" cols="50"></textarea><br />
      <input name="post" type="submit" value="Post">
    </form>
  </body>
</html>
