<?php

session_start();
    include __DIR__ . '/functions.php';

    if (getCurrentUser() == false ) {
        header('location: /login.php');
    }

$dir = __DIR__ . '/img/';

$images = scandir($dir);

foreach ($images as $image) {
    if ($image != '.' && $image != '..' && $image != '.DS_Store') {
        ?> <img src='/img/<?php echo $image; ?>' alt='' height="230" width='230'> <?php
    }
}
?>

<form action="/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="newimage">
    <button type="submit">Отправить!</button>
</form>