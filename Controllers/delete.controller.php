<?php
require_once "Models/delete.model.php";

class DeleteController{

    static public function deleteData($table, $nameID, $id){

        $response = DeleteModel::deleteData($table, $nameID, $id);

        $return = new DeleteController();
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