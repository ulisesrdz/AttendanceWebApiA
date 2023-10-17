<?php
include_once('../Common/include.php');
include_once('../Common/encipher.php');

$_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));

$requestMethod = $_SERVER["REQUEST_METHOD"];
$conn=getConnection();
if (strtoupper($requestMethod) != 'GET') {
    sendResponse(500,[],'Invalid Method!');
}
 else{
    if($conn==null){
        sendResponse(500,$conn,'Server Connection Error !');
    }else{
       
        $course_name = $_POST["course_name"];
        if(empty($course_name)){
            $sql = "SELECT * FROM Courses";
        }else{
            $sql = "SELECT * FROM Courses WHERE course_name='".$course_name."'";
        }
        
       
        $result = mysqli_query($conn,$sql);
        $fecha_actual = date("d-m-Y h:i:s");
        if ($result->num_rows > 0) {
            $courses=array();
           
            while($row = $result->fetch_assoc()) {
                $course=array(
                    "id" =>  $row["id"],
                    "course_name" =>  $row["course_name"]
                );

                array_push($courses,$course);
            }
            sendResponse(200,$courses,'Course Details');
        } else {
            sendResponse(404,[],'Course Details');
        }
        $conn->close();
    }
 }   
    

