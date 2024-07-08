<?php

/**
 * Class View for Model operations
 * Allows using the MVC pattern to:
 * - get user data and create a User object
 * - return the User object
 */
class View extends Controller {

    /**
     * Constructor to initialize properties and call parent constructor
     *
     * @param string $host The database host.
     * @param string $username The database username.
     * @param string $password The database password.
     * @param string $database The database name.
     */
    public function __construct(string $host, string $username, string $password, string $database) {
        parent::__construct($host, $username, $password, $database);
    }

    /**
     * Method to get user data and create a User object
     *
     * @param string $email The email of the user.
     * @param string $password The password of the user.
     * @return User|null Returns a User object if credentials match, otherwise null.
     */
    public function getDataAndCreateUser($email, $password) {
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

    /**
     * Method to redirect the user based on their status
     *
     * @param User $user The user object.
     */
    public function userOrAdmin($user) {
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

    /**
     * Method to get notifications and create Notification objects
     *
     * @return Notification[] Returns an array of Notification objects.
     */
    public function notification() {
        $notifications = $this->readNotification();
        $notificationList = [];

        foreach ($notifications as $value) {
            $notification = new Notification($value['id'], $value['id_user'], $value['status']);
            $notificationList[] = $notification;
        }

        return $notificationList;
    }

    /**
     * Method to get products and create Product objects
     *
     * @return Product[] Returns an array of Product objects.
     */
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