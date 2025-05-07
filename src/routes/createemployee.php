<?php
include './src/components/mysqlconnection.php';

if (isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["job-title"]) && isset($_POST["favorite-color"]) && isset($_POST["favorite-book"]) && isset($_POST["favorite-hobby"])) {
    $rand = rand(1, 100000);
    $insertSql = "INSERT INTO employees (firstName, lastName, jobTitle, favoriteColor, favoriteBook, hobby, image)
    VALUES (
        '" . $_POST["first-name"] . "',
        '" . $_POST["last-name"] . "',
        '" . $_POST["job-title"] . "',
        '" . $_POST["favorite-color"] . "',
        '" . $_POST["favorite-book"] . "',
        '" . $_POST["favorite-hobby"] . "',
        '" . $_POST["first-name"] . $_POST["last-name"] . $rand . basename($_FILES["image"]["name"]) . "'
    )";

    $allGood = 1;
    $target_dir = $upload_dir;
    $file = $target_dir . $_POST["first-name"] . $_POST["last-name"] . $rand . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    echo $file;
    echo "<br>";
    echo $imageFileType;
    echo "<br>";
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "webp"
    ) {
        echo "Sorry, only WEBP, JPG, JPEG, PNG & GIF files are allowed.";
        $allGood = 0;
    }

    if ($allGood == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            $allGood = 0;
        }
    }

    if (mysqli_query($conn, $insertSql) && $allGood == 1) {
        header("Location: ./ourteam");
    } else {
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }
}
?>
<div class="p-4">
    <h1>Create Employee</h1>
    <script>
    </script>


    <div id="employee-info">
        <form action="./createemployee" method="post" class="flex flex-col" enctype="multipart/form-data">
            <label for="first-name">First Name:</label>
            <input class="m-2 p-2 rounded" type="text" name="first-name" id="first-name" placeholder="First Name" required>
            <label for="last-name">Last Name:</label>
            <input class="m-2 p-2 rounded" type="text" name="last-name" id="last-name" placeholder="Last Name" required>
            <label for="job-title">Job Title:</label>
            <input class="m-2 p-2 rounded" type="text" name="job-title" id="job-title" placeholder="Job Title" required>
            <label for="favorite-color">Favorite Color:</label>
            <input class="m-2 p-2 rounded" type="text" name="favorite-color" id="favorite-color" placeholder="Favorite Color" required>
            <label for="favorite-book">Favorite Book:</label>
            <input class="m-2 p-2 rounded" type="text" name="favorite-book" id="favorite-book" placeholder="Favorite Book" required>
            <label for="favorite-hobby">Favorite Hobby:</label>
            <input class="m-2 p-2 rounded" type="text" name="favorite-hobby" id="favorite-hobby" placeholder="Favorite Hobby" required>
            <label for="image">Image:</label>
            <input class="m-2 p-2 rounded" type="file" name="image" id="image" required>
            <button class="m-2 p-2 rounded bg-primary-400 block" type="submit">Submit</button>
        </form>
    </div>
</div>
