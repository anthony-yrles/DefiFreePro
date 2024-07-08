<?php

ini_set('log_errors', 1);
ini_set('error_log', '../error.log'); // Assurez-vous que ce chemin est correct
error_reporting(E_ALL);

/**
 * Class Db for database operations:
 * - connection to the database
 * - disconnect from the database
 * - execute a query
 * - fetch results
 */
class Db {
    // Properties to store database connection details and connection object
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    protected $connection;

    /**
     * Constructor to initialize properties
     *
     * @param string $host     The database host
     * @param string $username The database username
     * @param string $password The database password
     * @param string $database The database name
     */
    public function __construct(string $host, string $username, string $password, string $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    /**
     * Method to connect to the database
     */
    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    /**
     * Method to disconnect from the database
     */
    public function disconnect() {
        $this->connection->close();
    }

    /**
     * Method to execute a query
     *
     * @param string $sql The SQL query to be executed
     * @return mixed The result of the query execution
     */
    public function query($sql) {
        return $this->connection->query($sql);
    }

    /**
     * Method to fetch results from a query
     *
     * @param mixed $result The result set from which to fetch data
     * @return array|null The fetched data as an associative array, or null if no data
     */
    public function fetch($result) {
        return $result->fetch_assoc();
    }
}