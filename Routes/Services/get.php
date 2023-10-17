<?php
require_once "Controllers/get.controller.php";

//$table = $routesArray[2];

$response = new GetController();

if(isset($_GET['id'])){

    $id= $_GET['id'] ?? 0;
    $response -> getDataByID($table, $id);
    

}elseif(isset($_GET['searchBy'])){

    $searchBy= $_GET['searchBy'] ?? '';
    $response -> getSearchData($table, $searchBy);    
    
}else{
    
    $response -> getData($table);

}

//echo '<prev>'; print_r( $searchBy); echo'</prev>';
 
 
// return;