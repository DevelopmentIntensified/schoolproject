<?php
include './src/components/mysqlconnection.php';

$userId = $_POST['id'];
$role = $_POST['role'];

$sql = "update users set role = '" . $role . "' where id = " . $userId;
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("Location: ./admin");
?>
