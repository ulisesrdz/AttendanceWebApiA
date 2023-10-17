<?php

$routesArray = explode("/",$_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

if(count($routesArray) == 0){
    $json = array (
        'status' => 404,
        'result' => 'Not Found'
    );

    echo json_encode($json, http_response_code($json["status"]));

    return;
}

//echo json_encode($_SERVER['REQUEST_METHOD']);


if(count($routesArray) > 0 && isset($_SERVER['REQUEST_METHOD'])){

    $table = explode("?",$routesArray[2])[0];
/*===============================================
            Request GET
===============================================*/
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // $json = array (
        //     'status' => 200,
        //     'result' => 'Success GET'
        // );

        // echo json_encode($json, http_response_code($json["status"]));

        include "Services/get.php";
    }

    /*===============================================
            Request POST
===============================================*/

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // $json = array (
        //     'status' => 200,
        //     'result' => 'Success POST'
        // );

        // echo json_encode($json, http_response_code($json["status"]));

        include "Services/post.php";
    }

/*===============================================
            Request PUT
===============================================*/

    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        // $json = array (
        //     'status' => 200,
        //     'result' => 'Success PUT'
        // );

        // echo json_encode($json, http_response_code($json["status"]));

        include "Services/put.php";
    }

/*===============================================
            Request DELETE
===============================================*/

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        // $json = array (
        //     'status' => 200,
        //     'result' => 'Success DELETE'
        // );

        // echo json_encode($json, http_response_code($json["status"]));

        include "Services/delete.php";
    }
}