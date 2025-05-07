<?php
include './src/components/mysqlconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["timeRequired"])) {
    $rand = rand(1, 100000);

    echo $_POST["id"];
    $insertSql = "update products
    set name = '" . $_POST["name"] . "',
    description = '" . $_POST["description"] . "',
    price = " . $_POST["price"] . ",
    timeRequired = " . $_POST["timeRequired"] . "
    where id = " . $_POST["id"]. ";";

    $allGood = 1;
    $target_dir = $upload_dir;
    $file = $target_dir . $_POST["name"] . $rand . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if ($_FILES["image"]["size"] > 0) {
        $insertSql = "update products
    set name = '" . $_POST["name"] . "',
    description = '" . $_POST["description"] . "',
    price = '" . $_POST["price"] . "',
    timeRequired = '" . $_POST["timeRequired"] . "',
    image = '" . $_POST["name"] . $rand . basename($_FILES["image"]["name"]) . "'
    where id = " . $_POST["id"];
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
    }

    if (mysqli_query($conn, $insertSql) && $allGood == 1) {
        echo "Product edited successfully";
        header("Location: ./shop");
    } else {
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }
} else if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "select * from products where id = " . $id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        $description = $row["description"];
        $price = $row["price"];
        $timeRequired = $row["timeRequired"];
        $image = $row["image"];
    }
}

?>
<div class="p-4">
    <h1>Edit Product</h1>

    <div id="product-info">
        <form action="./editproduct" method="post" class="flex flex-col" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="name">Name:</label>
            <input class="m-2 p-2 rounded" value="<?= $name ?>" type="text" name="name" id="name" placeholder="Name" required>
            <label for="description">Description:</label>
            <input class="m-2 p-2 rounded" type="text" value="<?= $description ?>" name="description" id="description" placeholder="Description" required>
            <label for="price">Price:</label>
            <input class="m-2 p-2 rounded" type="number" name="price" id="price" value="<?= $price ?>" min="0" max="1100000000000" placeholder="Price" required>
            <label for="timeRequired">Time Required:</label>
            <input class="m-2 p-2 rounded" type="number" name="timeRequired" id="timeRequired" value="<?= $timeRequired ?>" min="0" max="1000000" placeholder="Time Required" required>
            <label for="image">Image:</label>
            <input class="m-2 p-2 rounded" type="file" name="image" id="image">
            <button class="m-2 p-2 rounded bg-primary-400 block" type="submit">Submit</button>
        </form>
    </div>
</div>
