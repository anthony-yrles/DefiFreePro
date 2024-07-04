<?php

/**
 * Class View for Model operations
 * allows to use the MVC pattern to:
 * - get user data and create a User object
 * - return the User object
 */

class View extends Controller {

    // Constructor to initialize properties and call parent constructor
    public function __construct(string $host, string $username, string $password, string $database) {
        parent::__construct($host, $username, $password, $database);
    }

    // Method to get user data and create a User object
    public function getAndCreateUser($email, $password) {
        $userData = $this->getUser($email, $password);
        $user = new User($userData['name'], $userData['surname'], $userData['email'], $userData['password']);
        return $user;
    }
}