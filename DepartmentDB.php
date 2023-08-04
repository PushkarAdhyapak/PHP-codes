<?php
require_once "database.php";

class DepartmentDB
{
    private $conn; // Add the $conn property to hold the database connection

    public function __construct($dbo)
    {
        $this->conn = $dbo->conn; // Initialize $conn with the database connection from the constructor parameter
    }

    public function getAllDepartments()
    {
        $cmd = "SELECT dd.id AS did, dd.title AS dtitle, dd.code AS dcode FROM department_details AS dd";
        $statement = $this->conn->prepare($cmd);
        $statement->execute();
        $rv = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rv;
    }
}
?>
