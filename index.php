<?php
include "routes.php";
echo str_replace("/schoolproject", "", $_SERVER['REQUEST_URI']);
echo $routes[str_replace("/schoolproject", "", $_SERVER['REQUEST_URI'])];

if (array_key_exists(str_replace("/schoolproject", "", $_SERVER['REQUEST_URI']), $routes)) {
    $pageContent = $routes[str_replace("/schoolproject", "", $_SERVER['REQUEST_URI'])];
    echo $pageContent;
};

include "layout.php";
?>
