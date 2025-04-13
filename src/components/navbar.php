<script>
    let menuOpen = false;

    function openMenu() {
        menuOpen = !menuOpen

        if (menuOpen) {
            document.getElementById("menu").style.display = "flex";
        } else {
            document.getElementById("menu").style.display = "none";
        }
    }

    document.addEventListener("click", (e) => {
        if (menuOpen && e.target.id !== "menu" && e.target.id !== "menu-button") {
            openMenu()
        }
    })
</script>

<nav class="flex gap-2 w-full bg-primary-400 h-8 m-0 p-2 overflow-hidden font-serif">
    <div class="flex-1">
        <a class="p-2 h-full text-black font-12" href="./">Home</a>
        <a class="p-2 h-full text-black font-12" href="./about">About</a>
        <a class="p-2 h-full text-black font-12" href="./info">Info</a>
        <a class="p-2 h-full text-black font-12" href="./contactus">Contact Us</a>
        <div class="p-2 inline">
            <button onclick="openMenu()" id="menu-button" class="font-serif font-12 bg-primary-400 border-none p-2 h-full text-black font-inherit">
                Weekly Exercises <span class="font-bold">V</span>
            </button>
            <div id="menu" class="hidden absolute top-12 left-32 w-12 flex-col">
                <?php
                if (isset($_SESSION['username'])) {
                    $links = array(
                        array("./employmentchart", "Module 1:Week 1 Employees"),
                        array("./productrating", "Module 2:Week 2 Product Rating"),
                        array("./editemployees", "Module 3: Week 3 Edit Employees"),
                        array("./week5cmssessions.php", "Module 5: Week 5 CMS Sessions"),
                        array("./week6database.php", "Module 6: Week 6 Database"),
                        array("./week8cmsdatabase.php", "Module 8: Week 8 CMS Database"),
                    );
                } else {
                    $links = array(
                        array("./productrating", "Module 2:Week 2 Product Rating"),
                        array("./week5cmssessions.php", "Module 5: Week 5 CMS Sessions"),
                        array("./week6database.php", "Module 6: Week 6 Database"),
                        array("./week8cmsdatabase.php", "Module 8: Week 8 CMS Database"),
                    );
                }

                for ($link = 0; $link <= count($links) - 1; $link += 1) {
                    echo "<a class='p-2 flex-1 bg-primary-400 w-full h-6 text-black font-inherit' href='" . $links[$link][0] . "'>" . explode(":", $links[$link][1])[1] . "</a>";
                }
                ?>
            </div>
        </div>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a class='p-2 h-full text-black font-12 absolute right-0' href='./logout'>Logout</a>";
        } else {
            echo "<a class='p-2 h-full text-black font-12 absolute right-0' href='./login'>Login</a>";
        }
        ?>
    </div>
</nav>
