<?php 
session_start();
unset ($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Login</h1>

<form action="showquestions.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username"><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>