<?php
require_once "database.php";
$dbo = new Database();
$cmd="select * from programme_details";
$statement=$dbo->conn->prepare($cmd);
$statement->execute();
$rv=$statement->fetchAll(PDO::FETCH_ASSOC);
print_r($rv);
?>