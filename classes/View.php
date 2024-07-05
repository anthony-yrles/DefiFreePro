<?php

/**
 * Class View for Model operations
 * allows to use the MVC pattern to:
 * - get user data and create a User object
 * - return the User object
 */

class View extends Controller {

    public function __construct(string $host, string $username, string $password, string $database) {
        parent::__construct($host, $username, $password, $database);
    }

    // Method to get user data and create a User object
    public function getDataAndCreateUser($email, $password) {
        
        $userData = $this->getUser();
        foreach ($userData as $key => $value) {
            if ($value["email"] == $email && password_verify($password, $value["password"])) {
                $user = new User($value["name"], $value["surname"], $value["email"], $value["password"], $value["status"]);
                return $user;
            }
        }
    }

    public function userOrAdmin($user) {
        if ($user->getStatus() == "admin") {
            header("Location: admin.php");
        } elseif ($user->getStatus() == "user") {
            header("Location: user.php");
        } else {
            $this->result = "You are not a user or an admin";
            $this->alert = true;
            header("Location: ../index.php");
        }
    }
}