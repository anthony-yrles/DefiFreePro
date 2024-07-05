<?php

session_start();

if (isset($_POST['submitSend'])) {
    require 'autoLoader.php';

    $controller = new Controller('localhost', 'root', '', 'testfreepro');
    $controller->newNotification($_SESSION['id']);
    
}
