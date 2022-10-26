<?php
//allow only auth
if(!isset($_SESSION['user'])){
    header('location:login.php');
}