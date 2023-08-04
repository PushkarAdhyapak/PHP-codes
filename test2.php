<?php

require_once "database.php";
$dbo=new Database();

$t='Department of Electronics';
$code='ECE';

$cmd="insert into department_details (title, code) values (:titlex, :codex)";

$stmnt=$dbo->conn->prepare($cmd);

try{
    $stmnt->execute([":titlex"=>$t," :codex"=>$code]);
}
catch(Exception $ee) 
{
  echo ($ee->getMessage()."<br>");
}

 $cmd="select * from department_details";

$statement=$dbo->conn->prepare($cmd);
$statement->execute(); 
$rv=$statement->fetchAll(PDO:: FETCH_ASSOC);

print_r($rv);
?>