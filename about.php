<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>School Project</title>
    <meta name="description" content="This is the website for a company that create websites for small buisnesses">
    <meta name="keywords" content="School, Website, Developer, small, business">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="author" content="Development Intensified">
    <link rel="stylesheet" href="./src/css/index.css">
</head>

<body class="m-0">
    <?php include './src/components/navbar.php'; ?>

    <div class="p-12">
        <h1>
            About Us
        </h1>
        <p>
            <?php
            echo "We are a small company based in Lynchburg Virginia that creates software for local businesses.
                    We originally started creating software in 2022, and have created software for small buisnesses since then.";

            ?>
            <br></br>
            <?php

            echo "If you want to work with us, there are a few things you should know. We are firm Christians and will not create software that goes against our beliefs. We are looking forward to work with you.";
            ?>
        </p>

    </div>

    <?php include './src/components/footer.php'; ?>

</body>

</html>
