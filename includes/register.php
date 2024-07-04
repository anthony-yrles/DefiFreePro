<?php

/**
 * Register script
 * 
 * This script handles the registration process
 * 
 * @category Scripts
 * @package  Register_Script
 */

 session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Include the autoloader
    require 'autoLoader.php';

    // Get the form data and store it in variables
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';

    if ($terms !== '1') {
        $_SESSION['result'] = 'You need to accept the terms and conditions';
        header('Location: ../index.php');
        exit();
    }

    // Create a new Controller object and a View object
    $controller = new Controller("localhost", "root", "", "testfreepro");
    // Call the testUser from controller method to check if the data are good and call the createUser method from Model
    $controller->testUser($name, $surname, $email, $password, $passwordRepeat);
    // Store the result in a session variable
    $_SESSION['result'] = $controller->getResult();

    // Redirect to the index page
    header('Location: ../index.php');
    exit();

} else {
    // If someone tries to access this script directly, redirect them to the login page
    header('Location: ../index.php');
    exit();
}