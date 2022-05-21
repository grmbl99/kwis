<?php
function authenticate($username,$password) {
  $servername = "database";
  $dbuser = "test_user";
  $dbpasswd = "test123!";
  $dbname = "testdb";

  $authenticated = false;

  $conn = new mysqli($servername, $dbuser, $dbpasswd, $dbname);
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