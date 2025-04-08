<?php
if (isset($_GET["method"])) {
    $method = $_GET["method"];
    if ($method != "get" && $method != "post") {
        $method = "get";
    }
}
include "./src/components/products.php";
?>

<div class='p-1 m-8 overflow-y-scroll h-80vh <?php if (isset($_POST["name"]) || isset($_GET["name"])) {
                                                    echo "hidden";
                                                } else {
                                                    echo "block";
                                                } ?>'>
    <h1>Rate Product</h1>
    <form action="./rateproduct" method=<?php echo $method; ?>>
        <label for="name">Name:</label>
        <input class="m-2 p-2 rounded" type="text" name="name" id="name" placeholder="Name" required>
        <?php
        foreach ($products as $productName => $details) {
            include "./src/components/rateProduct.php";
        }
        ?>
        <textarea class="m-2 p-2 rounded" name="comment" id="comment" placeholder="Enter your comment" required></textarea>
        <button class="m-2 p-2 rounded bg-primary-400 block" type="submit">Submit</button>
    </form>
</div>

<div class='p-8 <?php if (isset($_POST["name"]) || isset($_GET["name"])) {
                    echo "block";
                } else echo "hidden"; ?>'>
    <h1>Thank You <?php if (isset($_POST["name"])) echo $_POST["name"];
                    else echo $_GET["name"]; ?> For Your Feedback!</h1>
    <h3>Comment: <?php if (isset($_POST["comment"])) echo $_POST["comment"];
                    else echo $_GET["comment"];
                    ?></h3>

    <table class="m-2 p-2 rounded">
        <tr>
            <th>Product</th>
            <?php
            foreach ($products["Simple Website"]["questions"] as $question => $details) {
                echo "<th>" . $question . "</th>";
            }
            ?>
            <th>Total Score</th>
        </tr>
        <?php

        $productRanks = [];

        foreach ($products as $productName => $details) {
            $productCount = 0;
            foreach ($products[$productName]["questions"] as $question => $details) {
                $name = str_replace(" ", "_", $productName) . "_" . $details["name"];
                if (isset($_POST[$name])) {
                    $productCount += $_POST[$name];
                } else {
                    $productCount += $_GET[$name];
                }
            }
            $productRanks[$productName] = $productCount;
        }

        arsort($productRanks);

        foreach ($productRanks as $productName => $totalScore) {
            echo "<tr><td>" . $productName . "</td>";
            foreach ($products[$productName]["questions"] as $question => $details) {
                $name = str_replace(" ", "_", $productName) . "_" . $details["name"];

                if (isset($_POST[$name])) {
                    echo "<td class='text-center'>" . $_POST[$name] . "</td>";
                } else {
                    echo "<td class='text-center'>" . $_GET[$name] . "</td>";
                }
            }
            echo "<td class='text-center'>" . $totalScore . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
