<?
$userId = $_POST['id'];

include './src/components/mysqlconnection.php';

$sql = "delete from users where id = " . $userId;
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("Location: ./admin");
?>
