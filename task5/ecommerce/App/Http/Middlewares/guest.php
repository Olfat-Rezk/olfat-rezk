<?php
//allow only guest
if(isset($_SESSION['user'])){
    header('location:index.php');die;
}