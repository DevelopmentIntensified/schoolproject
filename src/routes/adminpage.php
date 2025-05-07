<?php
include './src/components/mysqlconnection.php';

$sql = "select * from users order by username desc";

$result = mysqli_query($conn, $sql);

$users = [];

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $users[$row["id"]] = $row;
    }
}

?>

<h1>Admin Page</h1>

<table class="table-auto">
    <thead>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Change Role</th>
            <th>Delete User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user["username"] ?></td>
                <td><?= $user["firstname"] ?></td>
                <td><?= $user["lastname"] ?></td>
                <td><?= $user["emailAddress"] ?></td>
                <td><?= $user["role"] ?></td>
                <td>
                    <form action="./changeuserrole" method="post">
                        <input type="hidden" name="id" value="<?= $user["id"] ?>">
                        <select name="role">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="admin">Admin</option>
                            <option value="publisher">Publisher</option>
                            <option value="customer">Customer</option>
                        </select>
                        <button type="submit">Change Role</button>
                    </form>
                </td>
                <td>
                    <form action="./deleteuser" method="post">
                        <input type="hidden" name="id" value="<?= $user["id"] ?>">
                        <button type="submit">Delete User</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

    <a class="m- p-2 rounded bg-primary-400" href="./adduser">Add User</a>
    <br>
    </br>
</table>
