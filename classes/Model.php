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

    public function modifyAccountValidate($id) {
        $sql = "UPDATE users SET accountValidate = '1' WHERE id = '$id'";
        $this->query($sql);
    }

    // Method to get a user, this method receive the email and password of the user
    public function getUser() {
        $sql = "SELECT * FROM users";
        $result = $this->query($sql);
        $users = [];
        while ($row = $this->fetch($result)) {
            $users[] = $row;
        }
        return $users;
    }

    public function createNotification($id_user) {
        $sql = "INSERT INTO notifications (id_user) VALUES ('$id_user')";
        $this->query($sql);
    }

    public function getNotification() {
        $sql = "SELECT * FROM notifications";
        $result = $this->query($sql);
        $notifications = [];
        
        while ($row = $this->fetch($result)) {
            $notifications[] = $row;
        }
        
        return $notifications;
    }

    public function notificationTraited($id) {
        $sql = "UPDATE notifications SET status = '1' WHERE id = '$id'";
        $this->query($sql);
    }

    public function setProduct($id_user, $pop, $delta, $mini4k, $deuxEuros, $centquarante, $illimite) {
        $sql = "INSERT INTO products (id_user, pop, delta, mini4k, deuxEuros, centquarante, illimite) VALUES ('$id_user', '$pop', '$delta', '$mini4k', '$deuxEuros', '$centquarante', '$illimite')";
        $this->query($sql);
    }

    public function getProduct() {
        $sql = "SELECT * FROM products";
        $result = $this->query($sql);
        $products = [];
        
        while ($row = $this->fetch($result)) {
            $products[] = $row;
        }   
        return $products;
    }
    
}