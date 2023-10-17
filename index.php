<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

/*===============================================
            Log_File
===============================================*/

ini_set('display_erros',1);
ini_set("log_errors",1);
ini_set("error_log","C:\xampp\htdocs\WebAPIAsistencia\php_error_log");

// include_once('DBA/Course.php');

/*===============================================
            Requirements
===============================================*/

// require_once "DBA/DBConnection.php"; 

// echo '<prev>'; print_r( Connection::ConnectDB()); echo'</prev>';
// return;

require_once "Controllers/route.controller.php";

$index = new RoutesController();
$index -> index();

// header('Access-Control-Allow-Origin: *');

// if($_SERVER['REQUEST_METHOD'] == 'GET'){
//     if(isset($_GET['id'])){
//         $sql = "SELECT * FROM courses WHERE id =".$_GET['id'];
//         $resp = MethodGET($sql);
//         echo json_encode($resp->fetch(PDO::FETCH_ASSOC));
//     }else{
        
//         $sql = "SELECT * FROM courses";
//         $resp = MethodGET($sql);
//         echo json_encode($resp->fetchAll()); 
//     }
//     header("HTTP/1.1 200 OK");
//     exit();
// }

// if($_POST['METHOD'] == 'PUT'){
//     unset($_POST['METHOD']);
//     $id = $_GET['id'];
//     $name = $_POST['course_name'];   
//     $sql = "UPDATE courses SET course_name='$name' WHERE id='$id'";
//     $resp = MethodPUT($query);
//     echo json_encode($resultado);
//     header("HTTP/1.1 200 OK");
//     exit();
// }

