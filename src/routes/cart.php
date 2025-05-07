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
        include "src/components/mysqlconnection.php";
        $cost = 0;
        $sql = "SELECT * FROM cart WHERE user_id = " . $_SESSION["user"]["id"];
        $cart = [];
        $result = mysqli_query($conn, $sql);

        if(!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cart[$row["product_id"]] = $row;
            }
        }

        if (count($cart) > 0) {
            foreach ($cart as $productId => $productData) {
                $productSql = "SELECT * FROM products WHERE id = " . $productId;
                $result = mysqli_query($conn, $productSql);

                if(!$result) {
                    echo "Error: " . $productSql . "<br>" . mysqli_error($conn);
                }
                
                $product = [];
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $product = $row;
                    }
                }
                $productName = $product["name"];
                $productcount = $productData["count"];
                $productcost = $product["price"];
                
                if ($productcount > 0) {
                    $cost += $productcost * $productcount;
                    echo "
                        <div class='flex flex-col gap-2'>
                            <h2>" . $productName . "</h2>
                            <img class='w-full' src='./src/images/" . $product["image"] . "' />
                            <span>" . $product["description"] . "</span>
                            <span>Price: $" . ($productcost * $productcount) . "</span>
                            <span>Count: " . $productcount . "</span>
                            <form action='./productaddedtocart' method='post'>
                                <input type='hidden' name='id' value='" . $product["id"] . "'>
                                <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Add One</button>
                            </form>
                            <form action='./removefromcart' method='post'>
                                <input type='hidden' name='id' value='" . $product["id"] . "'>
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
