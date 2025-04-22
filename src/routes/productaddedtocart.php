<?php
if (isset($_POST["name"])) {
    if (!isset($_SESSION["cart"])) $_SESSION["cart"] = [];
    $sessionCart = $_SESSION["cart"];
    if (array_key_exists($_POST["name"], $sessionCart)) {
        $sessionCart[$_POST["name"]]++;
        $_SESSION["cart"] = $sessionCart;
    } else {
        $_SESSION["cart"][$_POST["name"]] = 1;
    }
    // echo "<script>alert(' Product " . $_POST["name"] . " Added to cart!'); window.location.href='./cart';</script>";
    header("Location: ./cart");
}
