<?php
$error = "";

$users = [];

if (isset($_POST['username']) && isset($_POST['password'])) {
    include "./src/components/mysqlconnection.php";
    $usersql = "SELECT * FROM users where username = '" . $_POST['username'] . "'";
    $result = mysqli_query($conn, $usersql);

    if (!$result) {
        echo "Error: " . $usersql . "<br>" . mysqli_error($conn);
    }

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$row["username"]] = $row;
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    if (array_key_exists($username, $users) && password_verify($password, $users[$username]['password'])) {
        $_SESSION['user'] = $users[$username];
        header("Location: ./");
    }

    if (array_key_exists($username, $users) && password_verify($password, $users[$username]['password'])) {
        $_SESSION['user'] = $users[$username];
        header("Location: ./");
    } else {
        $error = "Invalid username or email or password";
    }
}
?>

<h2>Login</h2>

<div class="w-full text-center">
    <h5 class="text-center text-red"><?php echo $error; ?></h5>
    <form action="./login" method="post">
        <label for="username">Username:</label>
        <br></br>
        <input class="bg-primary rounded text-white p-2" type="text" name="username" id="username" required>
        <br></br>

        <label for="password">Password:</label>
        <br></br>
        <input class="bg-primary rounded text-white p-2" type="password" name="password" id="password" required>
        <br></br>

        <input class="bg-primary rounded text-white p-2" type="submit" value="Login">
    </form>
</div>
