<?php
require_once "database.php";
require_once "ProgrammeDB.php";
require_once "DepartmentDB.php";

$dbo=new Database();
// $pdo=new ProgrammeDB();
$ddo=new DepartmentDB();
$rv=$ddo->getAllDepartments($ddo);
print_r($rv)

// $rv=$pdo->getAllProgrammes($dbo);
// print_r($rv);

// $rv=$pdo->getProgrammeDetailsByCode($dbo,12);
// print_r($rv);

// $rv=$pdo->updateProgrammeDetails($dbo,"12","its a cat","FFF",34,"x","Y",6);
// print_r($rv);

// $rv=$pdo->getProgrammeDetailsByID($dbo,12);
// print_r($rv);

// echo("<br>");
// $rv=$pdo->createNewProgramme ($dbo, "ECE","Btech in electronics", 8, "UG","BTECH",6);
// echo($rv); 
// echo ("<br>");
// $rv=$pdo->getAllProgrammes($dbo);
// print_r($rv);

?>