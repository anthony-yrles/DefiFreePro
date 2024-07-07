<?php

session_start();

if (isset($_POST['profilSend'])){
    require 'autoLoader.php';

    $view = new View('localhost', 'root', '', 'testfreepro');
    $productList = $view->returnProduct();

    foreach ($productList as $product) {
        if ((int)$product->getIdUser() === (int)$_SESSION['id']) {
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

    header('Location: ../user.php');
    exit();
    
} else {
    header('Location: ../user.php');
    exit();
}