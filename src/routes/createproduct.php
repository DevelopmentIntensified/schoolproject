<?php
include './src/components/mysqlconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["timeRequired"])) {
    $rand = rand(1, 100000);
    $insertSql = "INSERT INTO products (name, description, price, timeRequired, image)
    VALUES (
    '" . $_POST["name"] . "',
    '" . $_POST["description"] . "',
    '" . $_POST["price"] . "',
    '" . $_POST["timeRequired"] . "',
        '" . $_POST["name"] . $rand . basename($_FILES["image"]["name"]) . "'
    )";

    $allGood = 1;
    $target_dir = $upload_dir;
    $file = $target_dir . $_POST["name"] . $rand . basename($_FILES["image"]["name"]);
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
        header("Location: ./shop");
    } else {
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }
}
?>
<div class="p-4">
    <h1>Create Product</h1>

    <div id="product-info">
        <form action="./createproduct" method="post" class="flex flex-col" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input class="m-2 p-2 rounded" type="text" name="name" id="name" placeholder="Name" required>
            <label for="description">Description:</label>
            <input class="m-2 p-2 rounded" type="text" name="description" id="description" placeholder="Description" required>
            <label for="price">Price:</label>
            <input class="m-2 p-2 rounded" type="number" name="price" id="price" placeholder="Price" required>
            <label for="timeRequired">Time Required:</label>
            <input class="m-2 p-2 rounded" type="number" name="timeRequired" id="timeRequired" placeholder="Time Required" required>
            <label for="image">Image:</label>
            <input class="m-2 p-2 rounded" type="file" name="image" id="image" required>
            <button class="m-2 p-2 rounded bg-primary-400 block" type="submit">Submit</button>
        </form>
    </div>
</div>
