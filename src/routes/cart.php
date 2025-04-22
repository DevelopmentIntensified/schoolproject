<?php
include "src/components/products.php";
?>

<div class='p-12'>
    <h1>Cart</h1>
    <a href='./shop'>Shop Now</a>
    <br></br>
    <a href='./checkout'>Checkout</a>

    <div class='grid grid-cols-4 gap-4'>
        <?php
        $cost = 0;
        if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) !== 0) {
            foreach ($_SESSION["cart"] as $productName => $productcount) {
                if ($productcount > 0) {
                    $cost += $products[$productName]["price"] * $productcount;
                    echo "
                        <div class='flex flex-col gap-2'>
                            <h2>" . $productName . "</h2>
                            <img class='w-full' src='./src/images/" . $products[$productName]["image"] . "' />
                            <span>" . $products[$productName]["description"] . "</span>
                            <span>Price: $" . ($products[$productName]["price"] * $productcount) . "</span>
                            <span>Count: " . $productcount . "</span>
                            <form action='./productaddedtocart' method='post'>
                                <input type='hidden' name='name' value='" . $productName . "'>
                                <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Add One</button>
                            </form>
                            <form action='./removefromcart' method='post'>
                                <input type='hidden' name='name' value='" . $productName . "'>
                                <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Remove One</button>
                            </form>
                        </div>
                        ";
                }
            };
        } else {
            echo "<h2>Cart is empty!</h2>";
        }
        ?>

    </div>
<?php
        echo "Total Cost: $". $cost;
?>
</div>
