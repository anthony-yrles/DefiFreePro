<?php

session_start();

if (isset($_POST['submitProduct'])) {
    require 'autoLoader.php';

    $idUser = $_POST['idUser'];
    $pop = isset($_POST['Pop']) ? 1 : 0;
    $delta = isset($_POST['Delta']) ? 1 : 0;
    $mini4K = isset($_POST['Mini4K']) ? 1 : 0;
    $deuxEuros = isset($_POST['deuxEuros']) ? 1 : 0;
    $centquarante = isset($_POST['centquarante']) ? 1 : 0;
    $illimite = isset($_POST['illimite']) ? 1 : 0;

    $controller = new Controller('localhost', 'root', '', 'testfreepro');
    $controller->newProduct($idUser, $pop, $delta, $mini4K, $deuxEuros, $centquarante, $illimite);

    header('Location: ../admin.php');
    exit();
    
} else {
    header('Location: ../admin.php');
    exit();
}