<?php
require 'database/DB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Blackshot</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views/css/style.css">
</head>
<body>

<?php require_once 'views/layouts/sign-in.php'; ?>

<?php require_once 'views/layouts/sign-up.php'; ?>

<div class="container">
    <?php require_once 'views/layouts/header.php'; ?>

    <main class="content">

        <?php require_once 'views/layouts/first_cards.php' ?>

    </main>

    <?php require_once 'views/layouts/footer.php'; ?>
</div>

<script src="views/js/script.js"></script>
<script src="views/js/more_cards.js"></script>
</body>
</html>