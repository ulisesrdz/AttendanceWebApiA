<?php

require_once "DBA/DBConnection.php";
require_once "get.model.php";

class PutModel{

    static public function updateCourseData($table, $data, $nameID, $id){

        $response = GetModel::getDataByID($table, $id);
        if(empty($response)){

            $response = array(

                "comment" => "ERROR: Data not found"

            );

            return $response;
        }

        $set = "";
        

        foreach(array_keys($data) as $key => $value){        
           
            $set .= $value."=:".$value.",";

        }
        
        $set = substr($set,0,-1);
        
        // echo json_encode($set );
        
        // return;

        $sql = "UPDATE $table SET $set WHERE $nameID = :$nameID";

        $link = Connection::ConnectDB();
        $stmt = $link -> prepare($sql);

        foreach($data as $key => $value){
           $stmt->bindParam(":".$key, $data[$key],PDO::PARAM_STR);
        }
        
        $stmt->bindParam(":".$nameID, $id,PDO::PARAM_STR);

        if($stmt -> execute()){
            $response = array(

                "comment" => "The process was successful"

            );

            return $response;

        }else{

            return $link->errorInfo();

        }      

    }

}