<?php
$Employee1FirstName = "John";
$Employee1LastName = "Doe";
$Employee1JobTitle = "Web Developer";
$Employee1FavoriteColor = "Blue";
$Employee1Webpage =  "./employee?id=0";
$Employee1img =  "./src/images/" . $Employee1FirstName . "-" . $Employee1LastName . ".jpg";
$Employee1hobby = "Running";
$Employee1favoriteBook = "The Lord of the Rings";

$Employee2FirstName = "James";
$Employee2LastName = "Fisher";
$Employee2JobTitle = "Product Manager";
$Employee2FavoriteColor = "Green";
$Employee2Webpage =  "./employee?id=1";
$Employee2img = "./src/images/" . $Employee2FirstName . "-" . $Employee2LastName . ".jpg";
$Employee2hobby = "Gaming";
$Employee2favoriteBook = "Hobbit";

$Employee3FirstName = "Jermey";
$Employee3LastName = "Jones";
$Employee3JobTitle = "Quality Analyist";
$Employee3FavoriteColor = "Red";
$Employee3Webpage =  "./employee?id=2";
$Employee3img = "./src/images/" . $Employee3FirstName . "-" . $Employee3LastName . ".jpeg";
$Employee3hobby = "Sleeping";
$Employee3favoriteBook = "The Silmarillion";

$Employees = array(
    array($Employee1FirstName, $Employee1LastName, $Employee1JobTitle, $Employee1FavoriteColor, $Employee1Webpage, $Employee1img, $Employee1favoriteBook, $Employee3hobby),
    array($Employee2FirstName, $Employee2LastName, $Employee2JobTitle, $Employee2FavoriteColor, $Employee2Webpage, $Employee2img, $Employee2favoriteBook, $Employee2hobby),
    array($Employee3FirstName, $Employee3LastName, $Employee3JobTitle, $Employee3FavoriteColor, $Employee3Webpage, $Employee3img, $Employee3favoriteBook, $Employee3hobby)
);
?>
