<html>
<body>

<h1>Overzicht</h1>

<?php 
require_once("questions.php");

$score=array("politie"=>0,"kapper"=>0,"slager"=>0,"kok"=>0);

foreach($_POST as $qkey => $akey) {
  echo "<h2>".$questions[$qkey]["text"]."</h2>";
  echo "<p>".$questions[$qkey]["answers"][$akey]["text"]."</p>";

  foreach($score as $job => $jobscore) {
    $score[$job] += $questions[$qkey]["answers"][$akey][$job];
  }
}

echo "<h2>Uw score:</h2>";
arsort($score);
foreach($score as $job => $jobscore) {
  echo $job.": ".$jobscore."<br>";
}
?>

</body>
</html>