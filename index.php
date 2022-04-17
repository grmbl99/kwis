<!DOCTYPE html>
<html>
<body>

<h1>Vragenlijst</h1>

<form action="showanswers.php" method="post">

<?php
require_once("questions.php");

foreach($questions as $qkey => $qval) {
  echo "<h2>".$qval["text"]."</h2>";
  foreach($qval["answers"] as $akey => $aval) {
    echo "<input type='radio' name='".$qkey."' value='".$akey."'> ".$aval["text"]."<br>";
  }
}

?>

<br>
<input type="submit" value="Submit">
</form>
</body>
</html>

