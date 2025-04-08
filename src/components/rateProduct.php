<h3>Product: <?php echo $productName; ?></h3>
<input type="hidden" name="id" value="<?php echo $productName; ?>">
<?php
foreach ($products[$productName]["questions"] as $question => $details) {
    $name = $productName . "_" . $details["name"];
    echo '
        <div class="m-2 p-2">
            <label>' . $question . ' (rank 1-5 with 1 being stronly disagree and 5 being strongly agree):</label>
            <br></br>
            <input type="radio" name="' . $name . '" value="1" required>
            <label>1</label>
            <input type="radio" name="' . $name . '" value="2" required>
            <label>2</label>
            <input type="radio" name="' . $name . '" value="3" required>
            <label>3</label>
            <input type="radio" name="' . $name . '" value="4" required>
            <label>4</label>
            <input type="radio" name="' . $name . '" value="5" required>
            <label>5</label>
        </div>
        ';
};
?>
