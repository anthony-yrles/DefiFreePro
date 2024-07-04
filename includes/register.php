<?php

/**
 * Register script
 * 
 * This script handles the registration process
 * 
 * @category Scripts
 * @package  Register_Script
 */

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

    // Create a new Controller object
    $controller = new Controller("localhost", "root", "", "testfreepro"); 
    // Call the createUser method to save the user in the database
    $result = $controller->testUser($name, $surname, $email, $password, $passwordRepeat); 
} else {
    // If someone tries to access this script directly, redirect them to the login page
    header('Location: ../index.php');
    exit();
}