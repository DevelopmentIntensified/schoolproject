<?php
    include './src/components/mysqlconnection.php';

    $comment = $_POST['comment'];
    $id = $_POST['id'];

    $sql = "UPDATE comments SET comment = '$comment' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    header("Location: ./ourteam");
    exit();

?>
