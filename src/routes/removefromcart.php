<?php
if (isset($_POST["name"])) {
    $_SESSION["cart"][$_POST["name"]] -= 1;
    if ($_SESSION["cart"][$_POST["name"]] == 0) {
        unset($_SESSION["cart"][$_POST["name"]]);
    }
    header("Location: ./cart");
}
