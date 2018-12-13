<?php

include __DIR__ . '/functions.php';
session_start();

if (getCurrentUser() == false ) {
    header('location: /login.php');
}

if (!empty($_FILES)) {
    if (isset($_FILES['newimage'])) {
        if (0 == $_FILES['newimage']['error']) {
            if ( $_FILES['newimage']['type'] == 'image/jpeg' ||
                $_FILES['newimage']['type'] == 'image/png' ) {

                $time = time() + 3 * 3600;
                $date = date('Y-m-d H:i:s', $time);
                $user = getCurrentUser();
                $imagename = $_FILES['newimage']['name'];

                $logfile = __DIR__ . '/logFile.txt';
                $log = $date . ' - ' . $user . ' - ' . $imagename . "\n";
                file_put_contents($logfile, $log, FILE_APPEND);

                move_uploaded_file($_FILES['newimage']['tmp_name'],
                    __DIR__ . '/img/' . $imagename);

                header('Location: /index.php');

            }
        }
    }
}