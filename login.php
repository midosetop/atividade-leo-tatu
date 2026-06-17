<?php
session_start();
include("config.php");

if($users[$_POST['username']]['senha'] == $_POST['password']){
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['tipo'] = $users[$_POST['username']]['tipo'];
}
header("Location: index.php");