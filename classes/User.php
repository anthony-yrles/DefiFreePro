<?php

/**
 * Class User
 * Allows creating User objects with various properties such as:
 * - name
 * - surname
 * - email
 * - password
 * - status
 * - account validation status
 *
 * Provides methods for:
 * - setting and getting properties
 * - hashing the password
 */
class User {

    /**
     * @var int $id The ID of the user.
     */
    private $id;

    /**
     * @var string $name The name of the user.
     */
    private $name;

    /**
     * @var string $surname The surname of the user.
     */
    private $surname;

    /**
     * @var string $email The email of the user.
     */
    private $email;

    /**
     * @var string $password The password of the user.
     */
    private $password;

    /**
     * @var string $status The status of the user.
     */
    private $status;

    /**
     * @var string $accountValidate The account validation status of the user.
     */
    private $accountValidate;

    /**
     * Constructor to initialize properties.
     *
     * @param int $id                  The ID of the user.
     * @param string $name             The name of the user.
     * @param string $surname          The surname of the user.
     * @param string $email            The email of the user.
     * @param string $password         The password of the user.
     * @param string $status           The status of the user.
     * @param string $accountValidate  The account validation status of the user.
     */
    public function __construct(int $id, string $name, string $surname, string $email, string $password, string $status, string $accountValidate) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
        $this->accountValidate = $accountValidate;
    }

    // Setter and getter for properties

    /**
     * Get the ID of the user.
     *
     * @return int The ID of the user.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the name of the user.
     *
     * @param string $name The name of the user.
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * Get the name of the user.
     *
     * @return string The name of the user.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the surname of the user.
     *
     * @param string $surname The surname of the user.
     */
    public function setSurname(string $surname) {
        $this->surname = $surname;
    }

    /**
     * Get the surname of the user.
     *
     * @return string The surname of the user.
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set the email of the user.
     *
     * @param string $email The email of the user.
     */
    public function setEmail(string $email) {
        $this->email = $email;
    }

    /**
     * Get the email of the user.
     *
     * @return string The email of the user.
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set the password of the user.
     *
     * @param string $password The password of the user.
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * Get the password of the user.
     *
     * @return string The password of the user.
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set the status of the user.
     *
     * @param string $status The status of the user.
     */
    public function setStatus(string $status) {
        $this->status = $status;
    }

    /**
     * Get the status of the user.
     *
     * @return string The status of the user.
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set the account validation status of the user.
     *
     * @param string $accountValidate The account validation status of the user.
     */
    public function setAccountValidate(string $accountValidate) {
        $this->accountValidate = $accountValidate;
    }

    /**
     * Get the account validation status of the user.
     *
     * @return string The account validation status of the user.
     */
    public function getAccountValidate() {
        return $this->accountValidate;
    }
}