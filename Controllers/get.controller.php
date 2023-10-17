<?php
require_once "Models/get.model.php";

class GetController{

    static public function getData($table){

        $response = GetModel::getData($table);

        $return = new GetController();
        $return -> fncRespose($response);
        return $return;
    }

    static public function getDataByID($table, $id){

        $response = GetModel::getDataByID($table, $id);

        $return = new GetController();
        $return -> fncRespose($response);
        return $return;
    }

    static public function getSearchData($table, $search){

        $response = GetModel::getSearchData($table, $search);

        $return = new GetController();
        $return -> fncRespose($response);
        return $return;
    }

    public function fncRespose($response){
        
        if(!empty($response)){
            $json = array(

                'status' => 200,
                'total' => count($response),
                'result' => $response
            );
        }else{
            $json = array (
                'status' => 404,
                'result' => 'Not Found'
            );
        
            //echo json_encode($json, http_response_code($json["status"]));
        }

        echo json_encode($json, http_response_code($json["status"]));
    }
}