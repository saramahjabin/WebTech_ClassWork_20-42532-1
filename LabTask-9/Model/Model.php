<?php
  require_once 'DB_Connect.php';  


function showAllData(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `course_schedule` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showData($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `course_schedule` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchData($Topic){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `course_schedule` WHERE Topic LIKE '%$Topic%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addData($data){
    $conn = db_conn();
    $selectQuery = "INSERT into course_schedule (Topic, Instructor_ID, Date, Time, Status) VALUES (:Topic, :Instructor_ID, :Date, :Time, :Status)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Topic' => $data['Topic'],
            ':Instructor_ID' => $data['Instructor_ID'],
            ':Date' => $data['Date'],
            ':Time' => $data['Time'],
            ':Status' => $data['Status']
        ]);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateData($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE course_schedule set Topic = ?, Instructor_ID = ?, Date = ?, Time = ?, Status = ?  where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Topic'], $data['Instructor_ID'], $data['Date'],$data['Time'],$data['Status '], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteData($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `course_schedule` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

  function LoginCheck($username){
    $conn = db_conn();
    $selectQuery = "SELECT Username, Password, Department FROM `logininfo` where Username = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function loginSuggestion($username){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `logininfo` WHERE Username LIKE '%$username%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>
  


     