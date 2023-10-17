<?php
require_once "Models/put.model.php";

class PutController{

    static public function updateCourseData($table, $data, $nameID, $id){

        $response = PutModel::updateCourseData($table, $data, $nameID, $id);

        $return = new PutController();
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