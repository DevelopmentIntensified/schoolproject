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
                <img class='w-full' width='50' height='50' src='./src/images/" . $product["image"] . "' />
                <span>" . $product["description"] . "</span>
                <span>Price: $" . $product["price"] . "</span>
                <span>Time Required: " . $product["time required"] . " days</span>
                <form action='./productaddedtocart' method='post'>
                    <input type='hidden' name='name' value='" . $productName . "'>
                    <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Add to Cart</button>
                </form>
            </div>
            ";
        };
        ?>

    </div>
</div>
