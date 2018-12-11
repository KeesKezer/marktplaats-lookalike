<?php
  /**
    * database connectie
    */

    $db_name = "test";
    $db_user = "root";
    $db_password = "mysql";

    $pdo = new PDO('mysql:dbname='.$db_name, $db_user, $db_password);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
?>
