<?php
include 'src/components/mysqlconnection.php';
$id = $_GET['id'];
if (isset($_SESSION["user"])) {
    if (isset($_GET["first-name"]) && $_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "publisher") {
        $updateEmployeeSql = "update employees 
    set firstName = '" . $_GET["first-name"] . "',
    lastName = '" . $_GET["last-name"] . "',
    jobTitle = '" . $_GET["job-title"] . "',
    favoriteColor = '" . $_GET["favorite-color"] . "',
    favoriteBook = '" . $_GET["favorite-book"] . "',
    hobby = '" . $_GET["favorite-hobby"] . "'
    where id = " . $id;

        if (mysqli_query($conn, $updateEmployeeSql)) {
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$sql = "SELECT * FROM employees where id = " . $id;
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "<h1>Employee not found</h1>";
    return;
}

$Employees = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($Employees, $row);
    }
}

echo "<h1>" . $Employees[0]["firstName"] . " " . $Employees[0]["lastName"] . "</h1>";
echo "<h2>Job Title: " . $Employees[0]["jobTitle"] . "</h2>";
echo "<h2>Favorite Color: " . $Employees[0]["favoriteColor"] . "</h2>";
echo "<h2>Favorite Book: " . $Employees[0]["favoritebook"] . "</h2>";
echo "<h2>Hobby: " . $Employees[0]["hobby"] . "</h2>";
echo "<img src='./src/images/" . $Employees[0]["image"] . "' alt='" . $Employees[0]["firstName"] . " " . $Employees[0]["lastName"] . "' width='300' height='400'>";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["role"] == "admin") {
        echo "<form action='./deleteemployee' method='post'>
    <input type='hidden' name='id' value='" . $Employees[0]["id"] . "'>
    <button class='m-2 p-2 rounded bg-primary-400 block' type='submit'>Delete Employee</button>
    </form>";
    }
}
