<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>School Project</title>
    <meta name="description" content="This is the website for a company that create websites for small buisnesses">
    <meta name="keywords" content="School, Website, Developer, small, business">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="author" content="Development Intensified">
    <link rel="stylesheet" href="./src/css/index.css">
</head>

<body class="m-0">
    <?php include './src/components/navbar.php'; ?>
    <div class="p-12">
        <?php
            include './src/components/variables.php';
            echo "<h1>" . $Employees[0][0] . " " . $Employees[0][1] . "</h1>";
            echo "<h2>Job Title: " . $Employees[0][2] . "</h2>";
            echo "<h2>Favorite Color: " . $Employees[0][3] . "</h2>";
            echo "<h2>Favorite Book: " . $Employees[0][6] . "</h2>";
            echo "<h2>Hobby: " . $Employees[0][7] . "</h2>";
            echo "<img src='" . $Employees[0][5] . "' alt='" . $Employees[0][0] . " " . $Employees[0][1] . "' width='300' height='400'>";
        ?>
    </div>

    <?php include './src/components/footer.php'; ?>

</body>

</html>
