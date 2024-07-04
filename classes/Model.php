<?php

/**
 * Class Model for Model operations
 * allow to use the MVC pattern to:
 * - connect to the database
 * - disconnect from the database
 * - create a user and add it to the database
 * - get a user and send it to the Controller
 */

class Model extends Db {

    // Constructor to initialize properties and call parent constructor
    public function __construct(string $host, string $username, string $password, string $database) {
        parent::__construct($host, $username, $password, $database);
    }

    // Method to connect to the database
    public function connectDB() {
        $this->connect();
    }

    // Method to disconnect from the database
    public function disconnectDB() {
        $this->disconnect();
    }

    // Method to create a user, this method receive the name, surname, email and password of the user
    public function createUser($name, $surname, $email, $password) {
        $sql = "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";
        $this->query($sql);
    }

    // Method to get a user, this method receive the email and password of the user
    public function getUser($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        return $this->fetch($this->query($sql));
    }
}