<?php
include 'src/components/variables.php';
$routes = [
    '/' => 'src/routes/home.php',
    '/about' => 'src/routes/about.php',
    '/contactus' => './src/routes/contactus.php',
    '/info' => './src/routes/info.php',
    '/employees' => './src/routes/employees.php'
];
for ($i = 0; $i < count($Employees); $i++) {
    $routes['/employee?id=' . $i] = './src/routes/employee.php';
};

?>
