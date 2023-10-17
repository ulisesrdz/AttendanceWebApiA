<?php
include_once('../Common/include.php');
include_once('../Common/encipher.php');

$_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));

$requestMethod = $_SERVER["REQUEST_METHOD"];
$conn=getConnection();
if (strtoupper($requestMethod) != 'POST') {
    sendResponse(500,[],'Invalid Method!');
}
 else{
    if($conn==null){
        sendResponse(500,$conn,'Server Connection Error !');
    }else{
       
        $course_name = $_POST["course_name"];
        $sql = "INSERT INTO courses (course_name) VALUES ('".$course_name."')";
       
        $result = mysqli_query($conn,$sql);        
        if ($result) {            
            sendResponse(200,$result,'Successful.');
        } else {
            sendResponse(404,[],'Not Registered.');
        }
        $conn->close();
    }
 }   
    

