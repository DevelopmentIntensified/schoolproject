
<nav class="flex gap-2 w-full bg-primary-400 h-8 m-0 p-2 overflow-hidden font-serif">
    <div class="flex-1">
        <a class="p-2 h-full text-black font-12" href="./">Home</a>
        <a class="p-2 h-full text-black font-12" href="./about">About Us</a>
        <a class="p-2 h-full text-black font-12" href="./mission">Mission</a>
        <a class="p-2 h-full text-black font-12" href="./info">Site Info</a>
        <a class="p-2 h-full text-black font-12" href="./contactus">Contact Us</a>
        <?php
        include "src/components/Menu.php";
        if (isset($_SESSION['username'])) {
            echo "<a class='p-2 h-full text-black font-12 absolute right-0' href='./logout'>Logout</a>";
        } else {
            echo "<a class='p-2 h-full text-black font-12 absolute right-0' href='./login'>Login</a>";
        }
        ?>
    </div>
</nav>
