<?php
include "src/components/products.php";
?>

<div class='p-8 mb-12'>
    <h1>Products</h1>

    <div class='grid grid-cols-4 gap-4'>
        <?php
        foreach ($products as $productName => $product) {
            echo "
            <div class='flex flex-col gap-2'>
                <h2>" . $productName . "</h2>
                <img class='w-full' width='200' height='200' src='./src/images/" . $product["image"] . "' />
                <span>" . $product["description"] . "</span>
                <span>Price: $" . $product["price"] . "</span>
                <span>Time Required: " . $product["timeRequired"] . " days</span>
                <form action='./productaddedtocart' method='post'>
                    <input type='hidden' name='id' value='" . $product["id"] . "'>
                    <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Add to Cart</button>
                </form>
            ";
            if (isset($_SESSION["user"]) && ($_SESSION["user"]["role"] == "publisher" || $_SESSION["user"]["role"] == "admin")) {
                echo "<form action='./editproduct' method='get'>
                    <input type='hidden' name='id' value='" . $product["id"] . "'>
                    <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Edit Product</button>
                </form>";
            }
            if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] == "admin") {
                echo "<form action='./deleteproduct' method='post'>
                    <input type='hidden' name='id' value='" . $product["id"] . "'>
                    <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Delete Product</button>
                </form>";
            }
            echo "</div>";
        };
        ?>

    </div>
</div>
