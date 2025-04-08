<?php
include 'src/components/variables.php';
$id = $_GET['id'];

if (isset($_GET["first-name"])) {
    $Employees[$id][0] = $_GET["first-name"];
    $Employees[$id][1] = $_GET["last-name"];
    $Employees[$id][2] = $_GET["job-title"];
    $Employees[$id][3] = $_GET["favorite-color"];
    $Employees[$id][6] = $_GET["favorite-book"];
    $Employees[$id][7] = $_GET["favorite-hobby"];
}

if (!isset($Employees[$id])) {
    echo "<h1>Employee not found</h1>";
    return;
}

echo "<h1>" . $Employees[$id][0] . " " . $Employees[$id][1] . "</h1>";
echo "<h2>Job Title: " . $Employees[$id][2] . "</h2>";
echo "<h2>Favorite Color: " . $Employees[$id][3] . "</h2>";
echo "<h2>Favorite Book: " . $Employees[$id][6] . "</h2>";
echo "<h2>Hobby: " . $Employees[$id][7] . "</h2>";
echo "<img src='" . $Employees[$id][5] . "' alt='" . $Employees[$id][0] . " " . $Employees[$id][1] . "' width='300' height='400'>";
