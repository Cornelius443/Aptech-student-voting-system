<?php
// Cornelius documentation

// DataBase connection class
class DatabaseConnection {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    // Constructor to initialize the connection parameters
    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Function to get the database connection
    public function getConnection() {
        return $this->conn;
    }

    // Function to close the database connection
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}


// Creating an instance of the DatabaseConnection class
$databaseConnection = new DatabaseConnection("localhost", "root", "", "voting_system");

// Get the database connection
$conn = $databaseConnection->getConnection();



// Close the database connection when done
// $databaseConnection->closeConnection();

?>

