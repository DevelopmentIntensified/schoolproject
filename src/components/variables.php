<?php
$Employee1FirstName = "John";
$Employee1LastName = "Doe";
$Employee1JobTitle = "Web Developer";
$Employee1FavoriteColor = "Blue";
$Employee1Webpage =  "./" . $Employee1FirstName . "-" . $Employee1LastName . ".php";
$Employee1img =  "./src/images/" . $Employee1FirstName . "-" . $Employee1LastName . ".jpg";

$Employee2FirstName = "James";
$Employee2LastName = "Fisher";
$Employee2JobTitle = "Product Manager";
$Employee2FavoriteColor = "Green";
$Employee2Webpage = "./" . $Employee2FirstName . "-" . $Employee2LastName . ".php";
$Employee2img = "./src/images/" . $Employee2FirstName . "-" . $Employee2LastName . ".jpg";

$Employee3FirstName = "Jermey";
$Employee3LastName = "Jones";
$Employee3JobTitle = "Quality Analyist";
$Employee3FavoriteColor = "Red";
$Employee3Webpage = "./" . $Employee3FirstName . "-" . $Employee3LastName . ".php";
$Employee3img = "./src/images/" . $Employee3FirstName . "-" . $Employee3LastName . ".jpeg";

$Employees = array(
    array($Employee1FirstName, $Employee1LastName, $Employee1JobTitle, $Employee1FavoriteColor, $Employee1Webpage, $Employee1img),
    array($Employee2FirstName, $Employee2LastName, $Employee2JobTitle, $Employee2FavoriteColor, $Employee2Webpage, $Employee2img),
    array($Employee3FirstName, $Employee3LastName, $Employee3JobTitle, $Employee3FavoriteColor, $Employee3Webpage, $Employee3img)
);
?>
