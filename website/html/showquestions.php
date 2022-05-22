<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Vragenlijst</h1>

<?php
require_once("includes/database.php");

function tablerow($row, $isheader) {
  echo "<tr>";
  foreach ($row as $key => $value) {
    if ($isheader) { 
      echo "<th>$key</th>"; } 
    else {
      echo "<td>$value</td>";
    }
  }
  echo "</tr>";
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  if (authenticate($username, $password)) {
    echo "<p>Welkom, $username!</p>";
    $_SESSION["username"] = $username;

    $conn = dbconnect();

    if (!$conn->connect_error) {
      $sql = "SELECT * FROM leden";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table>";
        $rownr = 0;
        while($row = $result->fetch_assoc()) {
          if ($rownr++ == 0) {
            tablerow($row, isheader: true);
          }
          tablerow($row, isheader: false);
        }
        echo "</table>";
      }
      $conn->close();      
    }
    ?>
    
    <form action="showanswers.php" method="post">

    <?php
    require_once("includes/questions.php");

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