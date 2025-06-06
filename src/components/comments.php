<div class="p-2 w-full">
    <h1>Comments</h1>
    <div class="w-full <?php if (!isset($_SESSION['user'])) {
                            echo "hidden";
                        } ?>">
        <form class="flex w-56 flex-col" action="./createcomment" method="post">
            <input type="text" hidden value="<?php echo $_SESSION['user']['username']; ?>" name="username" placeholder="Username">
            <input type="text" required name="title" placeholder="Title">
            <input type="text" required name="comment" placeholder="Comment">
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php
    include './src/components/mysqlconnection.php';

    $sql = "SELECT * FROM comments ORDER BY creation_date DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
    <div class='p-2 flex-1 flex w-full'>
   <span class='flex-1'>" . $row["creation_date"] . ", " . $row["username"] . " said:  <br></br><b>" . $row["title"] . "</b> <br></br>" . $row["comment"];
            if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin") {
                echo "<form class='inline' action='./deletecomment' method='post'>
                <input type='hidden' name='id' value='" . $row["id"] . "'>
                <button class='inline rounded bg-primary-400' type='submit'>Delete Comment</button>
                </form>";
            }
            echo "</span></div>";
        }
    } else {
        echo "There have been no comments yet.";
    }
    ?>
</div>
