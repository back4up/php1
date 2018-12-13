<?php

    function getUsersList()
    {
        $users = [
            ['login' => 'Vasya', 'password' => '$2y$10$B4liK8FDhUOH9vCnVDw21.pAya7AgvLvbZqll9eZ.tsXyod5RTPUK'], //123456
            ['login' => 'Misha', 'password' => '$2y$10$tvoDBC/4FtiLEYX8STnTc.CHwD9.F6U9p0RmYNEqBqakobILngrPK'], //123457
            ['login' => 'Gena', 'password' => '$2y$10$iSBIzrqoeTmLZYViNcvBC.7HlDn1bQNuzC1uCZ1YB.B65x5SHGnga'], //123459
            ['login' => 'Max', 'password' => '$2y$10$etCJMs7KwFpCImEOOfeLA.jMbqh2IA58HcOfTSjUwyvEXpKW4qlTy'] //123452
        ];

        return $users;
    }

    function existsUser($login)
    {

        $users = getUsersList();

        if (in_array($login, array_column($users, 'login') ) ) {
            return true;
        } else {
            return false;
        }
    }

    function checkPassword($login, $password)
    {
        $users = getUsersList();
        $index = array_search($login, array_column($users, 'login'));

         if(
             existsUser($login)
             &&
             password_verify( $password, $users[$index]['password'] )
         ) {
             return true;
         } else {
             return false;
         }
    }

    function getCurrentUser()
    {
        if(isset($_SESSION['login'])) {
            return $_SESSION['login'];
        } else {
            return null;
        }
    }