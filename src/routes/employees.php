<?php include './src/components/variables.php'; ?>
<div class="p-12">
    <h1>Employees</h1>
    <br></br>
    <?php
    for ($i = 0; $i < count($Employees); $i++) {
        echo "<a href='./employee?id=" . $Employees[$i]["id"]  . "'>" . $Employees[$i]["firstName"] . " "
            . $Employees[$i]["lastName"] . "</a>";
        if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] == "admin") {
            echo "<form class='inline' action='./deleteemployee' method='post'>
                <input type='hidden' name='id' value='" . $Employees[$i]["id"] . "'>
                <button class='inline rounded bg-primary-400' type='submit'>Delete Employee</button>
                </form>";
        }
        echo "<br>";
    }
    if (isset($_SESSION["user"])) {
        if ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "publisher") {
            echo "<br></br><br></br>";
            echo "<a class='m-2 p-2 rounded bg-primary-400 text-black' href='./editemployees'>Edit Employees</a><br></br>";
            echo "<a class='m-2 p-2 rounded bg-primary-400 text-black' href='./createemployee'>New Employee</a>";
        }
    }
    ?>

</div>
<?php include './src/components/comments.php'; ?>
