<?php
require_once "Controllers/delete.controller.php";

if(isset($_GET['id'])){
    
    $nameID = "";

    foreach(array_keys($_GET) as $key => $value){
        
       $nameID = $value;
    
    }

    $response = new DeleteController();
    $response -> deleteData($table, $nameID, $_GET['id']);    
}