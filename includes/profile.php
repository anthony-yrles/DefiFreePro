<?php

/**
 * This script handles the submission of a profile form.
 * 
 * It starts a session, checks if the form was submitted, and if so, processes the form data.
 * If the form was not submitted, it redirects to the user page.
 */

session_start();

if (isset($_POST['profilSend'])){
    require 'autoLoader.php';

    // Create a new View object
    $view = new View('localhost', 'root', '', 'testfreepro');
    // Retrieve the list of products
    $productList = $view->returnProduct();

    // Loop through the product list to find the product matching the user's ID
    foreach ($productList as $product) {
        if ((int)$product->getIdUser() === (int)$_SESSION['id']) {
            // Create a new Product object and store it in the session
            $product = new Product(
                $product->getId(),
                $product->getIdUser(),
                $product->getPop(),
                $product->getDelta(),
                $product->getMini4k(),
                $product->getDeuxEuros(),
                $product->getCentquarante(),
                $product->getIllimite()
            );
            $_SESSION['product'] = $product;
        }
    }

    // Redirect to the user page after processing
    header('Location: ../user.php');
    exit();
    
} else {
    // Redirect to the user page if the form was not submitted
    header('Location: ../user.php');
    exit();
}