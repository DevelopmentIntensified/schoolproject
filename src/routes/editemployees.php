<?php
include './src/components/variables.php';
include './src/components/mysqlconnection.php';
?>
<div class="p-4">
    <h1>Edit Employees</h1>
    <script>
        <?php
        echo "var Employees = " . json_encode($Employees) . ";";
        ?>
        console.log(Employees);

        function loadEmployeeInfo(id) {
            var employee = Employees[id - 1];
            document.getElementById("first-name").value = employee["firstName"];
            document.getElementById("last-name").value = employee["lastName"];
            document.getElementById("job-title").value = employee["jobTitle"];
            document.getElementById("favorite-color").value = employee["favoriteColor"];
            document.getElementById("favorite-book").value = employee["favoritebook"];
            document.getElementById("favorite-hobby").value = employee["hobby"];
        }
    </script>


    <div id="employee-info">
        <form action="./employee" method="get" class="flex flex-col">
            <select class="m-2 p-2 rounded" name="id" id="id" onchange="loadEmployeeInfo(this.value)" required>
                <option value="">Select Employee</option>
                <?php
                foreach ($Employees as $id => $employee) {
                    echo "<option value='" . $employee["id"] . "'>" . $employee["firstName"] . " " . $employee["lastName"] . "</option>";
                };
                ?>
            </select>
            <label for="first-name">First Name:</label>
            <input class="m-2 p-2 rounded" type="text" name="first-name" id="first-name" placeholder="First Name" required>
            <label for="last-name">Last Name:</label>
            <input class="m-2 p-2 rounded" type="text" name="last-name" id="last-name" placeholder="Last Name" required>
            <label for="job-title">Job Title:</label>
            <input class="m-2 p-2 rounded" type="text" name="job-title" id="job-title" placeholder="Job Title" required>
            <label for="favorite-color">Favorite Color:</label>
            <input class="m-2 p-2 rounded" type="text" name="favorite-color" id="favorite-color" placeholder="Favorite Color" required>
            <label for="favorite-book">Favorite Book:</label>
            <input class="m-2 p-2 rounded" type="text" name="favorite-book" id="favorite-book" placeholder="Favorite Book" required>
            <label for="favorite-hobby">Favorite Hobby:</label>
            <input class="m-2 p-2 rounded" type="text" name="favorite-hobby" id="favorite-hobby" placeholder="Favorite Hobby" required>
            <button class="m-2 p-2 rounded bg-primary-400 block" type="submit">Submit</button>
        </form>
    </div>
</div>
