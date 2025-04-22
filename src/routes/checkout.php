<div class='p-12'>
    <h1>Cart</h1>
    <a href='./'>Back</a>

    <div class='grid grid-cols-4 gap-4'>
        <?php
        $cost = 0;
        if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) !== 0) {
            foreach ($_SESSION["cart"] as $productName => $productcount) {
                if ($productcount > 0) {
                    $cost += $products[$productName]["price"] * $productcount;
                }
            };
        } else {
            echo "<h2>Cart is empty!</h2>";
        }
        ?>

    </div>
<?php
        echo "<br></br>Cost: $". $cost;
        echo "<br></br>Total Tax: $". $cost * 0.05;
        echo "<br></br>Total Cost: $". $cost + $cost * 0.05;
?>
                <form action='./clearcart' method='post'>
                    <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Submit Purchase for Processing</button>
                </form>
</div>
