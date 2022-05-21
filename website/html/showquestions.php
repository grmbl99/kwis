<?php session_start(); ?>

<!DOCTYPE html>
<html>
<body>

<h1>Vragenlijst</h1>

<?php
require_once("database.php");
if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  if (authenticate($username, $password)) {
    echo "<p>Welkom, $username!</p>";
    $_SESSION["username"] = $username;
    ?>
    
    <form action="showanswers.php" method="post">

    <?php
    require_once("questions.php");

    foreach($questions as $questionid => $question) {
      echo "<h2>".$question["text"]."</h2>";
      foreach($question["answers"] as $answerid => $answer) {
        echo "<input type='radio' name='".$questionid."' value='".$answerid."'> ".$answer["text"]."<br>";
      }
    }
    ?>

    <br>
    <input type="submit" value="Submit">
    </form>

  <?php
  } else {
    echo "<p>Ongeldige gebruikersnaam of wachtwoord.</p>";
  }
} else {
  echo "<p>Gebruikersnaam en wachtwoord zijn verplicht.</p>";
}
?>

</body>
</html>