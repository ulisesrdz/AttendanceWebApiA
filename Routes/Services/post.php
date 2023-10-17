<?php
require_once "Controllers/post.controller.php";

if(isset($_POST)){
    
    // $columns = array();

    // foreach(array_keys($_POST) as $key => $value){
        
    //     array_push($columns, $value);
    
    // }
    $response = new PostController();
/*===============================================
            Request new User
===============================================*/
    if(isset($_GET["register"]) && $_GET["register"] == true){

        $suffix = $_GET['suffix'] ?? "user";
        $response -> registerUser($table, $_POST, $suffix); 

    }else{

        $response -> createData($table, $_POST);    

    }

/*===============================================
            Request POST
===============================================*/

    
   
    //echo json_encode($_POST );
}