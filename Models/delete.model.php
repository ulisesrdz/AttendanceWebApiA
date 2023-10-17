<?php

require_once "DBA/DBConnection.php";
require_once "get.model.php";

class DeleteModel{

    static public function deleteData($table, $nameID, $id){

        $response = GetModel::getDataByID($table, $id);
        if(empty($response)){

            $response = array(

                "comment" => "ERROR: Data not found"

            );

            return $response;
        }        

        $sql = "DELETE FROM $table WHERE $nameID = :$nameID";
//         echo json_encode($sql);
// return;

        $link = Connection::ConnectDB();
        $stmt = $link -> prepare($sql);       
        
        $stmt->bindParam(":".$nameID, $id,PDO::PARAM_INT);

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