<?php

/**
 * This script handles the submission of a new product form.
 * 
 * It starts a session, checks if the form was submitted, and if so, processes the form data.
 * If the form was not submitted, it redirects to the admin page.
 */

session_start();

if (isset($_POST['submitProduct'])) {
    require 'autoLoader.php';

    // Retrieve form data and set values based on checkboxes
    $idUser = $_POST['idUser'];
    $pop = isset($_POST['Pop']) ? 1 : 0;
    $delta = isset($_POST['Delta']) ? 1 : 0;
    $mini4K = isset($_POST['Mini4K']) ? 1 : 0;
    $deuxEuros = isset($_POST['deuxEuros']) ? 1 : 0;
    $centquarante = isset($_POST['centquarante']) ? 1 : 0;
    $illimite = isset($_POST['illimite']) ? 1 : 0;

    // Create a new Controller object and use it to add the product and validate the account
    $controller = new Controller('localhost', 'root', '', 'testfreepro');
    $controller->newProduct($idUser, $pop, $delta, $mini4K, $deuxEuros, $centquarante, $illimite);
    $controller->accountValidate($idUser);

    // Redirect to the admin page after processing
    header('Location: ../admin.php');
    exit();
    
} else {
    // Redirect to the admin page if the form was not submitted
    header('Location: ../admin.php');
    exit();
}