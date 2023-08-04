<?php

require_once "database.php";

class ProgrammeDB
{

public function getAllProgrammes ($dbo)
{
$cmd="select
pd.id as pid,
pd.code as pcode,
pd.title as ptitle, 
pd.no_of_sem as nos,
pd.graduation_level as gl,
pd.technical_level as tl,
pd.department_id as did,
dd.title as dtitle,
dd.code as dcode
    from programme_details as pd,
department_details as dd 
where pd.department_id=dd.id";
$statement=$dbo->conn->prepare($cmd);
$statement->execute();
$rv=$statement->fetchAll(PDO::FETCH_ASSOC);
return $rv;
}


public function createNewProgramme($dbo, $code, $title, $nos, $gl, $tl, $did) 

{

   

 $cmd="insert into programme_details
 (title,code,no_of_sem, graduation_level, technical level, department_id)
 values
 (:title, :code, :no_of_sem, :graduation_level,:technical level,:department_id)
 ";

$statement=$dbo->conn->prepare($cmd);

try {

$statement->execute([":title"=>$title,

":code"=>$code,

"no_of_sem"=>$nos,

":graduation_level"=>$gl,

":technical_level"=>$tl, 
":department_id"=>$did,]);
return 1;
}
catch(Exception $ee) 

{
    return 0;
}

}

public function getProgrammeDetailsByCode($dbo, $code) {

    $cmd="select
    pd.id as pid,
    pd.code as pcode,
    pd.title as ptitle, 
    pd.no_of_sem as nos,
    pd.graduation_level as gl,
    pd.technical_level as tl,
    pd.department_id as did,
    dd.title as dtitle,
    dd.code as dcode
        from programme_details as pd,
    department_details as dd 
    where pd.department_id=dd.id
    and
    pd.code=:code";


    $statement=$dbo->conn->prepare($cmd);
    $statement->execute(["code"=>$code]);
    $rv=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $rv;
}

public function getProgrammeDetailsByID($dbo, $id) {
        
    $cmd="select
    pd.id as pid,
    pd.code as pcode,
    pd.title as ptitle, 
    pd.no_of_sem as nos,
    pd.graduation_level as gl,
    pd.technical_level as tl,
    pd.department_id as did,
    dd.title as dtitle,
    dd.code as dcode
    from programme_details as pd,
    department_details as dd 
    where pd.department_id=dd.id
    and
    pd.id=:id";


    $statement=$dbo->conn->prepare($cmd);
    $statement->execute([":id"=>$id]);
    $rv=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $rv;

}

public function updateProgrammeDetails($dbo,$pid,$title,$code,$nos,$gl,$tl,$did) 

{

    $cmd="update programme_details
    set
    code=:code,
    title=:title
    no_of_sem=:no_of_sem
    graduation_level=: graduation_level 
    technical_level=: technical_level 
    department_id=: department_id

    where id=:id
    ";
    
    $statement=$dbo->conn->prepare($cmd); 

    try{
    $statement->execute([":code"=>$code,
    ":title"=>$title,
    ":no_of_sem"=>$nos,
    ":graduation_level"=>$gl,
    ":technical_level"=>$tl,
    ":department_id"=>$did,
    "id"=>$pid
    ]);
       return 1;
    }
    catch(Exception $ee) {
         return 0;
    }

  }

}