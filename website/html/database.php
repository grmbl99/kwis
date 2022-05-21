<?php
function dbconnect() {
  $servername = "database";
  $dbuser = "test_user";
  $dbpasswd = "test123!";
  $dbname = "testdb";

  $conn = new mysqli($servername, $dbuser, $dbpasswd, $dbname);

  return $conn;
}

function authenticate($username,$password) {
  $authenticated = false;

  $conn = dbconnect();
  if (!$conn->connect_error) {
    $sql = "SELECT username FROM leden WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $authenticated=true;
    }
    $conn->close();      
  }

  return $authenticated;
}
?>