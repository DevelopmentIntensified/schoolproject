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
    '/ourteam' => './src/routes/employees.php',
];

for ($i = 0; $i < count($Employees); $i++) {
    $routes['/employee?id=' . $i] = './src/routes/employee.php';
};

if (isset($_SESSION['user'])) {
    $routes['/productaddedtocart'] = './src/routes/productaddedtocart.php';
    $routes['/cart'] = './src/routes/cart.php';
    $routes['/shop'] = './src/routes/shop.php';
    $routes['/checkout'] = './src/routes/checkout.php';
    $routes['/removefromcart'] = './src/routes/removefromcart.php';
    $routes['/clearcart'] = './src/routes/clearcart.php';
    $routes['/createcomment'] = './src/routes/createcomment.php';
    $routes['/editcomment'] = './src/routes/editcomment.php';
    foreach ($products as $productName => $product) {
        $routes['/rateproduct?id=' . rawurlencode($product["id"])] = './src/routes/rateproduct.php';
    };
}

if (isset($_SESSION['user'])) {
    if ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "publisher") {
        $routes['/editemployees'] = './src/routes/editemployees.php';
        $routes['/createproduct'] = './src/routes/createproduct.php';
        $routes['/createemployee'] = './src/routes/createemployee.php';
        $routes['/editproduct'] = './src/routes/editproduct.php';
        foreach ($products as $productName => $product) {
            $routes['/editproduct?id=' . rawurlencode($product["id"])] = './src/routes/editproduct.php';
        };
    }

    if ($_SESSION["user"]["role"] == "admin") {
        $routes['/admin'] = './src/routes/adminpage.php';
        $routes['/deleteuser'] = './src/routes/deleteuser.php';
        $routes['/changeuserrole'] = './src/routes/changeuserrole.php';
        $routes['/adduser'] = './src/routes/adduser.php';
        $routes['/deletecomment'] = './src/routes/deletecomment.php';
        $routes['/deleteemployee'] = './src/routes/deleteemployee.php';
        $routes['/deleteproduct'] = './src/routes/deleteproduct.php';
    }
}
