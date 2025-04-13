
<?php
$error = "";
$users = [
    "customer" => "customer",
];

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $password;
    echo $username;

    if (array_key_exists($username, $users) && $users[$username] == $password) {
        $_SESSION['username'] = $username;
        header("Location: ./");
    } else {
        $error = "Invalid username or password";
    }
}
?>

<h2>Login</h2>

<div class="w-full text-center">
    <h5 class="text-center text-red"><?php echo $error; ?></h5>
    <form action="./login" method="post">
        <label for="username">Username:</label>
        <input class="bg-primary rounded text-white p-2" type="text" name="username" id="username" required>

        <label for="password">Password:</label>
        <input class="bg-primary rounded text-white p-2" type="password" name="password" id="password" required>

        <input class="bg-primary rounded text-white p-2" type="submit" value="Login">
    </form>
</div>
