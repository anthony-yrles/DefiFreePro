<?php

/**
 * Class Controller for Model operations
 * Allows the use of the MVC pattern to:
 * - create a user and send it to the Model
 * - get and return a user to the View
 */

class Controller extends Model {

    // Properties to store result and alert messages
    protected $result;
    protected $alert;

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
     * Check if any of the fields are empty
     *
     * @param string $name          User's first name
     * @param string $surname       User's surname
     * @param string $email         User's email
     * @param string $password      User's password
     * @param string $passwordRepeat User's password repetition
     * @return bool
     */
    private function emptyFields($name, $surname, $email, $password, $passwordRepeat) {
        return empty($name) || empty($surname) || empty($email) || empty($password) || empty($passwordRepeat);
    }

    /**
     * Check if the email is valid
     *
     * @param string $email User's email
     * @return bool
     */
    private function invalidEmail($email) {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Check if the password meets the requirements
     *
     * @param string $password User's password
     * @return bool
     */
    private function checkPassword($password) {
        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/';
        return preg_match($pattern, $password) === 1;
    }

    /**
     * Check if the password and passwordRepeat match
     *
     * @param string $password      User's password
     * @param string $passwordRepeat User's password repetition
     * @return bool
     */
    private function passwordMatch($password, $passwordRepeat) {
        return $password !== $passwordRepeat;
    }

    /**
     * Validate the user input and create a new user
     *
     * @param string $name          User's first name
     * @param string $surname       User's surname
     * @param string $email         User's email
     * @param string $password      User's password
     * @param string $passwordRepeat User's password repetition
     * @param string $terms         User's acceptance of terms and conditions
     */
    public function testUser($name, $surname, $email, $password, $passwordRepeat, $terms) {
        if ($this->emptyFields($name, $surname, $email, $password, $passwordRepeat)) {
            $this->result = 'You need to fill in all the fields';
            $this->alert = true;
        } elseif ($this->invalidEmail($email)) {
            $this->result = 'The email is invalid';
            $this->alert = true;
        } elseif (!$this->checkPassword($password)) {
            $this->result = 'Your password do not meet the requirements';
            $this->alert = true;
        } elseif ($this->passwordMatch($password, $passwordRepeat)) {
            $this->result = 'The two passwords are not the same';
            $this->alert = true;
        } elseif ($terms !== '1') {
            $this->result = 'You need to accept the terms and conditions';
            $this->alert = true;
        } else {
            $this->connectDB();
            $this->createUser($name, $surname, $email, $password);
            $this->disconnectDB();
            $this->result = 'Your registration is successful';
        }
    }

    /**
     * Validate user account
     *
     * @param int $id User's ID
     */
    public function accountValidate($id) {
        $this->connectDB();
        $this->modifyAccountValidate($id);
        $this->disconnectDB();
    }

    /**
     * Get the result message
     *
     * @return string
     */
    function getResult() {
        return $this->result;
    }

    /**
     * Get the alert status
     *
     * @return bool
     */
    function getAlert() {
        return $this->alert;
    }

    /**
     * Get a user from the model
     *
     * @return array|null
     */
    public function getUserFromModel() {
        $this->connectDB();
        $userData = $this->getUser();
        $this->disconnectDB();
        if (empty($userData)) {
            $this->result = 'The email or password is incorrect';
            $this->alert = true;
            return null;
        } else {
            return $userData;
        }
    }

    /**
     * Create a new notification
     *
     * @param int $id_user User's ID
     */
    public function newNotification($id_user) {
        $this->connectDB();
        $this->createNotification($id_user);
        $this->disconnectDB();
        $this->result = 'Notification created';
    }

    /**
     * Read notifications
     *
     * @return array|null
     */
    public function readNotification() {
        $this->connectDB();
        $notificationData = $this->getNotification();
        $this->disconnectDB();
        if (empty($notificationData)) {
            return null;
        } else {
            return $notificationData;
        }
    }

    /**
     * Mark notification as treated
     *
     * @param int $id Notification ID
     */
    public function notificationOk($id) {
        $this->connectDB();
        $this->notificationTraited($id);
        $this->disconnectDB();
    }

    /**
     * Create a new product
     *
     * @param int $id_user       User's ID
     * @param int $pop           Pop product
     * @param int $delta         Delta product
     * @param int $mini4k        Mini 4K product
     * @param int $deuxEuros     Deux Euros product
     * @param int $centquarante  Cent Quarante product
     * @param int $illimite      Illimité product
     */
    public function newProduct($id_user, $pop, $delta, $mini4k, $deuxEuros, $centquarante, $illimite) {
        $this->connectDB();
        $this->setProduct($id_user, $pop, $delta, $mini4k, $deuxEuros, $centquarante, $illimite);
        $this->disconnectDB();
    }

    /**
     * Read products
     *
     * @return array|null
     */
    public function readProduct() {
        $this->connectDB();
        $productData = $this->getProduct();
        $this->disconnectDB();
        if (empty($productData)) {
            return null;
        } else {
            return $productData;
        }
    }
}