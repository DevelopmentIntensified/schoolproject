<nav class="flex gap-2 w-full bg-primary-400 h-12 m-0 p-2 overflow-hidden">
<?php

$links = array(
    array("/week1foundations", "Module 1: Week 1 Foundations"),
    array("/week1variables","Module 1: Week 1 Variables"),
    array("/week2forms","Module 2: Week 2 Forms"),
    array("/week3arrays","Module 3: Week 3 Arrays"),
    array("/week4sessions","Module 4: Week 4 Sessions"),
    array("/week5cmssessions","Module 5: Week 5 CMS Sessions"),
    array("/week6database","Module 6: Week 6 Database"),
    array("/week8cmsdatabase","Module 8: Week 8 CMS Database"),
);
    for ($link=0;$link<=count($links);$link += 1) { 
        echo "<a class='p-2 h-full text-black' href='".$links[$link][0]."'>".explode(":", $links[$link][1])[1]."</a>";
    }
?>
</nav>
