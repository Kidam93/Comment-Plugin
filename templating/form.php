<?php 
namespace View;

use App\Comment;

define('DS', DIRECTORY_SEPARATOR);
require dirname(__DIR__) .DS.'vendor'.DS.'autoload.php';

$comment = new Comment($_REQUEST);
$isValid = $comment->isValid();
if(empty($isValid)){
    $comment->registerData();
}
if(empty($selectAll)){
    $selectAll = NULL;
}
$selectAll = $comment->selectAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div id="plugin">
    <h3>Comment Plugin</h3>
    <div class="alert">
        <div class="alert-container">
        <?php if($isValid !== NULL): ?>
        <?php foreach($isValid as $i): ?>
            <p><?= $i; ?></p>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <form action="../templating/form.php" method="POST" id="form">
            <input type="" class="" placeholder="FirstName" name="firstname">
            <input type="" class="" placeholder="LastName" name="lastname">
            <textarea placeholder="Votre messages.." name="message" id="text"></textarea>
            <button type="submit" id="button">Ok</button>
        </form>
    </div>
    <div class="data">
        <!-- <div class=""> -->
        <?php if($selectAll !== NULL): ?>
        <?php foreach($selectAll as $i): ?>
            <div class="comment">
                <div>
                <strong><?= $i['FirstName']; ?> <?= $i['LastName']; ?></strong> 
                <small><?= $i['created_at']; ?></small>
                </div>
                <?= $i['Comment'] ?>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <!-- </div> -->
    </div>
    </div>
</body>
</html>