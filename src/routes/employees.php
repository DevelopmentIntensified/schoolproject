<?php include './src/components/variables.php'; ?>
<div class="p-12">
    <h1>Employees</h1>
    <br></br>
    <?php
    for ($i = 0; $i < count($Employees); $i++) {
        echo "<a href='" . $Employees[$i][4] . "'>" . $Employees[$i][0] . " " . $Employees[$i][1] . "</a><br>";
    }
    ?>
</div>
<?php include './src/components/comments.php'; ?>
