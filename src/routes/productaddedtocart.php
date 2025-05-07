<?php
include "src/components/mysqlconnection.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    echo $id;
    $insertSql = "INSERT INTO cart (product_id, user_id, count) VALUES ('" . $id . "', '" . $_SESSION["user"]["id"] . "', 1)";
    $updateSql = "UPDATE cart SET count = count + 1 WHERE product_id = '" . $id . "'";
    $userCart = "SELECT * FROM cart WHERE user_id = " . $_SESSION["user"]["id"] . " and product_id = " . $id;

    if (mysqli_query($conn, $userCart)) {
        $result = mysqli_query($conn, $userCart);
        if (mysqli_num_rows($result) == 0) {
            if (mysqli_query($conn, $insertSql)) {
                header("Location: ./cart");
            } else {
                echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
            }
        } else {
            if (mysqli_query($conn, $updateSql)) {
                header("Location: ./cart");
            } else {
                echo "Error: " . $updateSql . "<br>" . mysqli_error($conn);
            }
        }
    }
}
