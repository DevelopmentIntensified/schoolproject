<?php
    include './src/components/mysqlconnection.php';

    $username = $_POST['username'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (username, title, comment) VALUES ('$username', '$title', '$comment')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    header("Location: ./ourteam");
    exit();

?>
