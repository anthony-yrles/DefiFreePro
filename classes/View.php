<?php

/**
 * Class View for Model operations
 * allows to use the MVC pattern to:
 * - get user data and create a User object
 * - return the User object
 */

class View extends Controller
{

    public function __construct(string $host, string $username, string $password, string $database)
    {
        parent::__construct($host, $username, $password, $database);
    }

    // Method to get user data and create a User object
    public function getDataAndCreateUser($email, $password)
    {
        $userData = $this->getUserFromModel();

        if ($userData) {
            foreach ($userData as $value) {

                // Utilisation de password_verify pour comparer le mot de passe en clair avec le hachage stocké
                if ($value["email"] == $email && $value["password"] == $password) {
                    $user = new User($value['id'], $value["name"], $value["surname"], $value["email"], $value["password"], $value["status"], $value["accountValidate"]);
                    return $user;
                }
            }
        }
        return null;
    }

    public function userOrAdmin($user)
    {
        if ($user->getStatus() === "admin") {
            header("Location: ../admin.php");
        } elseif ($user->getStatus() === "user") {
            header("Location: ../user.php");
        } else {
            $this->result = "You are not a user or an admin";
            $this->alert = true;
            header("Location: ../index.php");
        }
    }

    public function notification()
    {
        $notifications = $this->readNotification();
        $notificationList = [];

        foreach ($notifications as $value) {
            $notification = new Notification($value['id'], $value['id_user'], $value['status']);
            $notificationList[] = $notification;
        }

        return $notificationList;
    }

    public function returnProduct() {
        $products = $this->readProduct();
        $productList = [];

        foreach ($products as $value) {
            $product = new Product($value['id'], $value['id_user'], $value['pop'], $value['delta'], $value['mini4k'], $value['deuxEuros'], $value['centquarante'], $value['illimite']);
            $productList[] = $product;
        }

        return $productList;
    }
}