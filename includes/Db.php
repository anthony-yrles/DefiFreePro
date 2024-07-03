<?php

/**
 * Class Db for database operations:
 * - connection to the database
 * - disconnect from the database
 * - execute a query
 * - fetch results
 */

class Db {

    // Properties
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    // Constructor to initialize properties
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    
    // Method to connect to the database
    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Method to disconnect from the database
    public function disconnect() {
        $this->connection->close();
    }

    // Method to execute a query
    public function query($sql) {
        return $this->connection->query($sql);
    }

    // Method to fetch results
    public function fetch($result) {
        return $result->fetch_assoc();
    }
}