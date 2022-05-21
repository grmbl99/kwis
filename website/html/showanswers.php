<html>
<body>

<h1>Overzicht</h1>

<?php 
require_once("questions.php");

$scores=array("politie"=>0,"kapper"=>0,"slager"=>0,"kok"=>0);

foreach($_POST as $questionid => $answerid) {
  echo "<h2>".$questions[$questionid]["text"]."</h2>";
  echo "<p>".$questions[$questionid]["answers"][$answerid]["text"]."</p>";

  foreach($scores as $jobid => $score) {
    $scores[$jobid] += $questions[$questionid]["answers"][$answerid]["ranking"][$jobid];
  }
}

echo "<h2>Uw score:</h2>";
arsort($scores);
foreach($scores as $jobid => $score) {
  echo $jobid.": ".$score."<br>";
}
?>

</body>
</html>