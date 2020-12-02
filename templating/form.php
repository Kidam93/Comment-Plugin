<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <h3>Comment Plugin</h3>
    <div class="alert">
        <div class="alert-container">
        <?php foreach($_SESSION['form'] as $i): ?>
            <p><?= $i; ?></p>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <form action="../src/Comment.php" method="POST">
            <input type="" class="" placeholder="FirstName" name="firstname">
            <input type="" class="" placeholder="LastName" name="lastname">
            <textarea placeholder="Votre messages.." name="message" id="text"></textarea>
            <button type="submit" id="button">Ok</button>
        </form>
    </div>
</body>
</html>