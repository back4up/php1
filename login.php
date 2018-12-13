<?php

session_start();
include __DIR__ . '/functions.php';


    if ( !empty ( $_POST['login'] ) && !empty ( $_POST['password'] ) ) {
        if ( checkPassword ( $_POST['login'], $_POST['password'] ) ) {
            $_SESSION['login'] = $_POST['login'];
            header('Location: /index.php');
        }
    }

?>

<form action="/login.php" method="post">
    <table>
        <tr>
            <td align="right">Введите login:</td>
            <td><input type="text" name="login" value=""></td>
        <tr>
            <td>Введите password:</td>
            <td><input type="password" name="password"  value=""></td>
        </tr>
        <tr>
            <td><button type="submit" >Submit</button></td>
        </tr>
    </table>

</form>