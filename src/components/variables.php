<?php
// $Employee1FirstName = "John";
// $Employee1LastName = "Doe";
// $Employee1JobTitle = "Web Developer";
// $Employee1FavoriteColor = "Blue";
// $Employee1Webpage =  "./employee?id=0";
// $Employee1img =  "./src/images/" . $Employee1FirstName . "-" . $Employee1LastName . ".jpg";
// $Employee1hobby = "Running";
// $Employee1favoriteBook = "The Lord of the Rings";
//
// $Employee2FirstName = "James";
// $Employee2LastName = "Fisher";
// $Employee2JobTitle = "Product Manager";
// $Employee2FavoriteColor = "Green";
// $Employee2Webpage =  "./employee?id=1";
// $Employee2img = "./src/images/" . $Employee2FirstName . "-" . $Employee2LastName . ".jpg";
// $Employee2hobby = "Gaming";
// $Employee2favoriteBook = "Hobbit";
//
// $Employee3FirstName = "Jermey";
// $Employee3LastName = "Jones";
// $Employee3JobTitle = "Quality Analyist";
// $Employee3FavoriteColor = "Red";
// $Employee3Webpage =  "./employee?id=2";
// $Employee3img = "./src/images/" . $Employee3FirstName . "-" . $Employee3LastName . ".jpeg";
// $Employee3hobby = "Sleeping";
// $Employee3favoriteBook = "The Silmarillion";

$Employees = [];

include "src/components/mysqlconnection.php";

$selectEmployeesSql = "SELECT * FROM employees";
$result = mysqli_query($conn, $selectEmployeesSql);
if(!$result) {
    echo "Error: " . $selectEmployeesSql . "<br>" . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $Employees[] = $row;
    }
}
