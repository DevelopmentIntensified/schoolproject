    <?php
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        $servername = "localhost";
        $database = "schoolproject";
        $username = "user";
        $password = "password";
    } else {
        $servername = "fdb1027.runhosting.com:3306";
        $database = "4606679_schoolproject";
        $username = "4606679_schoolproject";
        $password = "4jJ_@}l?6M:#DBnK";
    }

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);


    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
