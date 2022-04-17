<!DOCTYPE html>
<html>
<body>

<h1>Vragenlijst</h1>

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
</body>
</html>

