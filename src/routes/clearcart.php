<?php
include "./src/components/mysqlconnection.php";
$deleteSql = "DELETE FROM cart WHERE user_id = " . $_SESSION["user"]["id"];
mysqli_query($conn, $deleteSql);
header("Location: ./cart");
