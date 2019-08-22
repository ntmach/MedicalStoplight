<!DOCTYPE html>
<?php
include ('./cookie.php');
include ('../Header/navbar.php');
?>
<html>
    <head>
        <title>Log in | Medical Stoplight</title>
        <link rel="stylesheet" href="./login.css">
    </head>
    <body>
      <div class="outer-table">
        <div class="form-login">
          <h1>Sign in</h1>
          <div class='container'>
              <form method='POST' action="./login_add.php">
              <div><b>Username</b></div>
              <input type='text' name='username'/>
              <div><b>Password</b></div>
              <input type='password' name='password'/><br>
              <input class='submit-button' type="submit" value="submit">
            </form>
          </div>
        </div>
      </div>
        <?php include('../Footer/footer.php');?>
    </body>
</html>
<?php