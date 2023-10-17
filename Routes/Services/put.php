<?php
require_once "Controllers/put.controller.php";

if(isset($_GET['id'])){
    
    $data = array();
    parse_str(file_get_contents('php://input'),$data);

    $nameID = "";

    foreach(array_keys($_GET) as $key => $value){
        
       $nameID = $value;
    
    }

    // $columns = array();
    // foreach(array_keys($data) as $key => $value){
        
    //     array_push($columns, $value);
     
    //  }

    $response = new PutController();
    $response -> updateCourseData($table, $data, $nameID, $_GET['id']);    
    
}