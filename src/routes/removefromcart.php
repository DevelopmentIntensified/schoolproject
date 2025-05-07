<?php
include "./src/components/mysqlconnection.php";

$id = $_POST["id"];

$deleteSql = "DELETE FROM cart WHERE product_id = " . $id . " and user_id = " . $_SESSION["user"]["id"];
$removeSql = "UPDATE cart SET count = count - 1 WHERE product_id = " . $id . " and user_id = " . $_SESSION["user"]["id"];
$sql = "SELECT * FROM cart WHERE user_id = " . $_SESSION["user"]["id"] . " and product_id = " . $id;

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $count = $row["count"];
            if ($count == 1) {
                if (mysqli_query($conn, $deleteSql)) {
                    header("Location: ./cart");
                } else {
                    echo "Error: " . $deleteSql . "<br>" . mysqli_error($conn);
                }
            } else {
                if (mysqli_query($conn, $removeSql)) {
                    header("Location: ./cart");
                } else {
                    echo "Error: " . $removeSql . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
