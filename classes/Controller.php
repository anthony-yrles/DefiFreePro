<?php

/**
 * Class Controller for Model operations
 * allows to use the MVC pattern to:
 * - create a user and send it to the Model
 * - get and return a user to the View
 */

class Controller extends Model {

    // Constructor to initialize properties and call parent constructor
    public function __construct(string $host, string $username, string $password, string $database) {
        parent::__construct($host, $username, $password, $database);
    }

    // Method to hash the password; this method can take a new password as a parameter or use the password property
    public function hashPassword($password = null) {
        if ($password === null) {
            $password = $this->password;
        }
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // Method to create a user, this method receives the name, surname, email, and password of the user
    public function createUser($name, $surname, $email, $password) {
        $this->connectDB();
        $hashedPassword = $this->hashPassword($password);
        $this->createUser($name, $surname, $email, $hashedPassword);
        $this->disconnectDB();
    }

    // Method to get a user, this method receives the email and password of the user
    public function getUser($email, $password) {
        $this->connectDB();
        $user = $this->getUser($email, $password);
        $this->disconnectDB();
        return $user;
    }
}