<?php
    session_start();
    if(!isset($_SESSION['session'])){
        //header('Location: ../users/user-init.html');
        echo 'destroyed';
    }else{
            session_destroy();
            header('Location:../index.php');
        }
?>