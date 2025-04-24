<?php
$servername = "fdb1027.runhosting.com:3306";
$username = "4606679_schoolproject";
$password = "4jJ_@}l?6M:#DBnK";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

echo "test";

// Check connection
if (!$conn) {
    echo "Connection Failed";
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected succehssfully";
?>
