<?php
include "src/components/products.php";
?>

<div class='p-12'>
    <h1>Products</h1>
    <a href='./rateproduct?method=get'>Rate Products Now With Get</a>
<br></br>
    <a href='./rateproduct?method=post'>Rate Products Now With Post</a>

    <div class='grid grid-cols-4 gap-4'>
        <?php
        foreach ($products as $productName => $product) {
            echo "
            <div class='flex flex-col gap-2'>
                <h2>" . $productName . "</h2>
                <img class='w-full' src='./src/images/" . $product["image"] . "' />
                <span>" . $product["description"] . "</span>
                <span>Price: $" . $product["price"] . "</span>
                <span>Time Required: " . $product["time required"] . " days</span>
            </div>
            ";
        };
        ?>

    </div>
</div>
