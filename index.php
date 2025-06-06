<?php
ob_start();
session_start();
include "routes.php";

// echo $_SERVER['REQUEST_URI'];
// echo "<br />";
// echo str_replace("/schoolproject", "", $_SERVER['REQUEST_URI']);
// echo "<br />";
// echo $routes[str_replace("/schoolproject", "", $_SERVER['REQUEST_URI'])];
// echo "<br />";
// echo json_encode($routes);

if (strpos(str_replace("/schoolproject", "",$_SERVER['REQUEST_URI']), "rateproduct")) {
    $pageContent = "./src/routes/rateproduct.php";
}

if (strpos(str_replace("/schoolproject", "",$_SERVER['REQUEST_URI']), "employee?")) {
    $pageContent = "./src/routes/employee.php";
}

if (array_key_exists(str_replace("/schoolproject", "", $_SERVER['REQUEST_URI']), $routes)) {
    $pageContent = $routes[str_replace("/schoolproject", "", $_SERVER['REQUEST_URI'])];
};

include "layout.php";
?>
