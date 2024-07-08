<?php

/**
 * Class Model for Model operations
 * Allows the use of the MVC pattern to:
 * - connect to the database
 * - disconnect from the database
 * - create a user and add it to the database
 * - get a user and send it to the Controller
 */
class Model extends Db {

    /**
     * Constructor to initialize properties and call parent constructor
     *
     * @param string $host     The database host
     * @param string $username The database username
     * @param string $password The database password
     * @param string $database The database name
     */
    public function __construct(string $host, string $username, string $password, string $database) {
        parent::__construct($host, $username, $password, $database);
    }

    /**
     * Method to connect to the database
     */
    public function connectDB() {
        $this->connect();
    }

    /**
     * Method to disconnect from the database
     */
    public function disconnectDB() {
        $this->disconnect();
    }

    /**
     * Method to create a user
     *
     * @param string $name     User's first name
     * @param string $surname  User's surname
     * @param string $email    User's email
     * @param string $password User's password
     */
    public function createUser($name, $surname, $email, $password) {
        $sql = "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";
        $this->query($sql);
    }

    /**
     * Method to validate an account
     *
     * @param int $id User's ID
     */
    public function modifyAccountValidate($id) {
        $sql = "UPDATE users SET accountValidate = '1' WHERE id = '$id'";
        $this->query($sql);
    }

    /**
     * Method to get all users
     *
     * @return array List of users
     */
    public function getUser() {
        $sql = "SELECT * FROM users";
        $result = $this->query($sql);
        $users = [];
        while ($row = $this->fetch($result)) {
            $users[] = $row;
        }
        return $users;
    }

    /**
     * Method to create a notification
     *
     * @param int $id_user User's ID
     */
    public function createNotification($id_user) {
        $sql = "INSERT INTO notifications (id_user) VALUES ('$id_user')";
        $this->query($sql);
    }

    /**
     * Method to get all notifications
     *
     * @return array List of notifications
     */
    public function getNotification() {
        $sql = "SELECT * FROM notifications";
        $result = $this->query($sql);
        $notifications = [];
        while ($row = $this->fetch($result)) {
            $notifications[] = $row;
        }
        return $notifications;
    }

    /**
     * Method to mark a notification as treated
     *
     * @param int $id Notification ID
     */
    public function notificationTraited($id) {
        $sql = "UPDATE notifications SET status = '1' WHERE id = '$id'";
        $this->query($sql);
    }

    /**
     * Method to create a product
     *
     * @param int $id_user       User's ID
     * @param int $pop           Pop product
     * @param int $delta         Delta product
     * @param int $mini4k        Mini 4K product
     * @param int $deuxEuros     Deux Euros product
     * @param int $centquarante  Cent Quarante product
     * @param int $illimite      Illimité product
     */
    public function setProduct($id_user, $pop, $delta, $mini4k, $deuxEuros, $centquarante, $illimite) {
        $sql = "INSERT INTO products (id_user, pop, delta, mini4k, deuxEuros, centquarante, illimite) VALUES ('$id_user', '$pop', '$delta', '$mini4k', '$deuxEuros', '$centquarante', '$illimite')";
        $this->query($sql);
    }

    /**
     * Method to get all products
     *
     * @return array List of products
     */
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