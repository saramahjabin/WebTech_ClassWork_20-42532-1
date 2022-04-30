<?php
  require_once 'DB_Connect.php';  


function showAllData(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
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
    $selectQuery = "SELECT * FROM `user_info` where User_Name = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function emailCheck($email){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addData($data){
    $conn = db_conn();
    $selectQuery = "INSERT into user_info (Name, Email, User_Name, Password, Gender, Date_of_Birth, Image) VALUES (:Name, :Email, :User_Name, :Password, :Gender, :Date_of_Birth, :Image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Name' => $data['Name'],
            ':Email' => $data['Email'],
            ':User_Name' => $data['User_Name'],
            ':Password' => $data['Password'],
            ':Gender' => $data['Gender'],
            ':Date_of_Birth'=> $data['Date_of_Birth'],
            ':Image'=> $data['Image']
        ]);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateData($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?, Email = ?, Gender = ?, Date_of_Birth = ?  where User_Name = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Name'], $data['Email'], $data['Gender'],$data['Date_of_Birth'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePicture($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Image = ? where User_Name = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Image'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePassword($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Password = ? where User_Name = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Password'], $id
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
    $selectQuery = "SELECT User_Name, Password FROM `user_info` where User_Name = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


?>
  


     