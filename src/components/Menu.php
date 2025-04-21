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

<div class="p-2 inline">
    <button onclick="openMenu()" id="menu-button" class="font-serif font-12 bg-primary-400 border-none p-2 h-full text-black font-inherit">
        Weekly Exercises <span class="font-bold">V</span>
    </button>
    <div id="menu" class="hidden absolute top-12 left-32 w-12 flex-col">
        <?php
        if (isset($_SESSION['username'])) {
            $links = array(
                array("./ourteam", "Our Team"),
                array("./productrating", "Product Rating"),
                array("./editemployees", "Edit Our Team"),
            );
        } else {
            $links = array(
                array("./ourteam", "Our Team"),
                array("./productrating", "Product Rating"),
            );
        }

        for ($link = 0; $link <= count($links) - 1; $link += 1) {
            echo "<a class='p-2 flex-1 bg-primary-400 w-full h-6 text-black font-inherit' href='" . $links[$link][0] . "'>" . explode(":", $links[$link][1])[1] . "</a>";
        }
        ?>
    </div>
</div>
