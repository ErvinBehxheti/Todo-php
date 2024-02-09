<?php $connected = mysqli_connect('127.0.0.1', 'root', '', 'TODOLIST', 3306);

if(!$connected) {
    die("Deshtoj bac");
}