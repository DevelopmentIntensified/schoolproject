<?php
$error = "";
$users = [];

if (isset($_POST['username']) || isset($_POST['password']) || isset($_POST['email']) || isset($_POST['firstname']) || isset($_POST['lastname'])) {
    if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email']) || !isset($_POST['firstname']) || !isset($_POST['lastname'])) {
        $error = "Please fill out all fields";
    } else {
        include "./src/components/mysqlconnection.php";
        $usersql = "SELECT * FROM users";
        $result = mysqli_query($conn, $usersql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $users[$row["username"]] = $row;
            }
        }

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if (array_key_exists($username, $users) || array_search($email, array_column($users, 'email')) !== false) {
            $error = "Username or email already exists";
            echo "test";
        } else {
                $insertUserSql = "INSERT INTO users (username, password, firstname, lastname, emailAddress, role) VALUES ('$username', '$hashedPassword', '$firstname', '$lastname', '$email', 'customer')";
            if (mysqli_query($conn, $insertUserSql)) {
                $last_id = mysqli_insert_id($conn);
                $sql = "SELECT * FROM users WHERE id = $last_id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['user'] = $row;
                  }
                }

                header("Location: ./");
            } else {
                $error = "Unable to create user: " . mysqli_error($conn);
            }
        }
    }
}
?>

<h2>Register</h2>


<div class="w-full text-center">
    <h5>Already have an account? <a href="./login">Login</a></h5>
    <h5 class="text-center text-red"><?php echo $error; ?></h5>
    <form class="flex flex-col w-56 mx-auto" action="./register" method="post">
        <label for="username">Username:</label>
        <br></br>
        <input class="bg-primary rounded text-white p-2" type="text" name="username" id="username" required>
        <br></br>

        <label for="firstname">First Name:</label>
        <br></br>
        <input class="bg-primary rounded text-white p-2" type="text" name="firstname" id="firstname" required>
        <br></br>

        <label for="lastname">Last Name:</label>
        <br></br>
        <input class="bg-primary rounded text-white p-2" type="text" name="lastname" id="lastname" required>
        <br></br>

        <label for="email">Email:</label>
        <br></br>
        <input class="bg-primary rounded text-white p-2" type="email" name="email" id="email" required>
        <br></br>

        <label for="password">Password:</label>
        <br></br>
        <input class="bg-primary rounded text-white p-2" type="password" name="password" id="password" required>
        <br></br>

        <input class="bg-primary rounded text-white p-2" type="submit" value="Register">
    </form>
</div>
