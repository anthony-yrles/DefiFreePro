<?php
/**
 * Login script
 * 
 * This script will handle the login process
 * 
 * @category Scripts
 * @package  Login_Script
 */

session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Include the autoloader
    require 'autoLoader.php';

    // Get the form data and store it in variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    $view = new View("localhost", "root", "", "testfreepro"); // Create a new View object
    $user = $view->getDataAndCreateUser($email, $password); // Get the user data and create a User object

    // Check if a user was found and proceed accordingly
    if ($user) {
        $_SESSION['nameFirstname'] = $user->getName() . " " . $user->getSurname(); // Store the user's name and surname in a session variable
        $_SESSION['accountValidate'] = $user->getAccountValidate(); // Store the account validation status in a session variable
        $_SESSION['id'] = $user->getId(); // Store the user's ID in a session variable
        $view->userOrAdmin($user);
    } else {
        $_SESSION['result'] = 'User not found'; // Store an error message in a session variable
        $_SESSION['alert'] = true; // Store an alert in a session variable
        header('Location: ../index.php');
        exit;
    }
} else {
    // If someone tries to access this script directly, redirect them to the login page
    header('Location: ../index.php');
    exit;
}