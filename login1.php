<?php
    session_start();

    if(isset($_POST["submit"]))
    {
        include('connect_db.php');
        include('user_service.php');

        $my_userService = new UserService($pdo, $_POST['email'], $_POST['password']);

        if ($user_id = $my_userService->login())
        {
            echo '<p>U bent ingelogd met user_id: ' . $user_id . '</p>';
            echo '<p>Uw emailadres is: ' . $my_userService->getEmailAddress() . '</p> ';
            // do stuff
        }
        else
        {
            echo 'Foutieve login';
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h3>Inloggen</h3>
      <form action="login.php" method="post">
          <p>Email: <input type="text" name="email" value=""></p>
          <p>Wachtwoord: <input type="text" name="password" value=""></p>
          <p><input type="submit" name="submit" value="Inloggen"></p>
      </form>
  </body>
</html>
