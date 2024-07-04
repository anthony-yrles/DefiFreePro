<?php

if (isset($_POST['submit'])) {
    require 'autoLoader.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];

} else {
    header('Location: ../index.php');
}