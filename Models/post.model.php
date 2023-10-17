<?php

require_once "DBA/DBConnection.php";

class PostModel{   

    static public function createPostData($table, $data){

        $columns = "";
        $params = "";

        foreach(array_keys($data) as $key => $value){        
           
            $columns .= $value.",";

            $params .= ":".$value.",";
        }

        $columns = substr($columns,0,-1);
        $params = substr($params,0,-1);
        
        $sql = "INSERT INTO $table ($columns) VALUES ($params)";

        $link = Connection::ConnectDB();
        $stmt = $link -> prepare($sql);

        foreach($data as $key => $value){
           $stmt->bindParam(":".$key, $data[$key],PDO::PARAM_STR);
        }

        if($stmt -> execute()){
            $response = array(
                "last_ID" => $link->lastInsertId(),
                "comment" => "The process was successful"
            );

            return $response;

        }else{

            return $link->errorInfo();

        }      

    }

    
}