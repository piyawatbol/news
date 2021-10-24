<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="style_log.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>

      <form  action="login.php" method="POST">
        <div class="txt_field">
          <input type="text" name="username" required>      
          <label>Username</label>

        </div>
        <div class="txt_field">
          <input type="password" name="password"required>
          <label>Password</label>

        </div>
        <input type="submit" value="Login">

        <div class="signup_link">
          Not a member? <a href="../frm_register.php">Signup</a><br>
          <a href="../index.php">Home Menu</a>
        </div>
        
      </form>
    </div>
  </body>
</html>