<?php

/**
 * The User Class allow to create objects User with differents properties like:
 * - name
 * - surname
 * - email
 * - password
 * - emailValidated
 * - connected
 * - status
 * Class User for user operations:
 * - properties
 * - constructor
 * - setter and getter for properties
 * - method to hash the password
 */

class User {

    // Properties
    private $name;
    private $surname;
    private $email;
    private $password;
    private $status;
    private $accountValidate;

    // Constructor to initialize properties
    public function __construct(string $name, string $surname, string $email, string $password, string $status, string $accountValidate) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
        $this->accountValidate = $accountValidate;
    }

    // Setter and getter for properties
    public function setName(string $name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function setSurname(string $surname) {
        $this->surname = $surname;
    }
    public function getSurname() {
        return $this->surname;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setPassword(string $password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setStatus(string $status) {
        $this->status = $status;
    }
    public function getStatus() {
        return $this->status;
    }

    public function setAccountValidate(string $accountValidate) {
        $this->accountValidate = $accountValidate;
    }
    public function getAccountValidate() {
        return $this->accountValidate;
    }
}