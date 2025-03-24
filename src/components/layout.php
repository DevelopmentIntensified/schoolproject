<!DOCTYPE html>
<html>

<head>
    <title>School Project</title>
    <link rel="stylesheet" href="./src/css/index.css" />

    <head />

<body class="m-0">
    <?php include './src/components/navbar.php'; ?>
    <?php echo $contents; ?>

    <?php include './src/components/footer.php'; ?>

    <body />
    <html />

    <?php
    if ($_ENV["DEBUG"] == "true") {
        header("refresh: 2;");
    }
    ?>
