<?php

/**
 * Class View for Model operations
 * allows to use the MVC pattern to:
 * - get user data and create a User object
 * - return the User object
 */

class View extends Controller {

    // Method to get user data and create a User object
    public function getAndCreateUser($email, $password) {
        $userData = $this->getUser($email, $password);
        $user = new User($userData['name'], $userData['surname'], $userData['email'], $userData['password']);
        return $user;
    }
}