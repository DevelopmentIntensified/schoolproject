<?php
include 'src/components/variables.php';
include 'src/components/products.php';
$routes = [
    '/' => 'src/routes/home.php',
    '/about' => 'src/routes/about.php',
    '/contactus' => './src/routes/contactus.php',
    '/info' => './src/routes/info.php',
    '/productrating' => './src/routes/productRatings.php',
    '/logout' => './src/routes/logout.php',
    '/login' => './src/routes/login.php',
    '/mission' => './src/routes/mission.php',
    '/ourteam' => './src/routes/employees.php'
];


if (isset($_SESSION['username'])) {
    $routes['/editemployees'] = './src/routes/editemployees.php';
    for ($i = 0; $i < count($Employees); $i++) {
        $routes['/employee?id=' . $i] = './src/routes/employee.php';
    };
}


foreach ($products as $productName => $product) {
    $routes['/rateproduct?id=' . rawurlencode($productName)] = './src/routes/rateproduct.php';
};
