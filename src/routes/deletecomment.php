<?php
    include './src/components/mysqlconnection.php';

    $id = $_POST['id'];

    $sql = "Delete FROM comments WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    header("Location: ./ourteam");
    exit();

?>
