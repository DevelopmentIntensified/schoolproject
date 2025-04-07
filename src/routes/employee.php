        <?php
        include 'src/components/variables.php';
        $id = $_GET['id'];
        echo "<h1>" . $Employees[$id][0] . " " . $Employees[$id][1] . "</h1>";
        echo "<h2>Job Title: " . $Employees[$id][2] . "</h2>";
        echo "<h2>Favorite Color: " . $Employees[$id][3] . "</h2>";
        echo "<h2>Favorite Book: " . $Employees[$id][6] . "</h2>";
        echo "<h2>Hobby: " . $Employees[$id][7] . "</h2>";
        echo "<img src='" . $Employees[$id][5] . "' alt='" . $Employees[$id][0] . " " . $Employees[$id][1] . "' width='300' height='400'>";
        ?>
