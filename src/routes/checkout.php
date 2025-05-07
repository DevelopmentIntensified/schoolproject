<div class='p-12'>
    <h1>Cart</h1>
    <a href='./'>Back</a>

    <div class='grid grid-cols-4 gap-4'>
        <?php
        $sql = "SELECT * FROM cart WHERE user_id = " . $_SESSION["user"]["id"];
        $cart = [];
        $cost = 0;
        $result = mysqli_query($conn, $sql);

        if (!$result) {
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

                if (!$result) {
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
                }
            }
        } else {
            echo "<h2>Cart is empty!</h2>";
        }
        ?>

    </div>
    <?php
    echo "<br></br>Cost: $" . $cost;
    echo "<br></br>Total Tax: $" . $cost * 0.05;
    echo "<br></br>Total Cost: $" . $cost + $cost * 0.05;
    ?>
    <form action='./clearcart' method='post'>
        <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Submit Purchase for Processing</button>
    </form>
</div>
