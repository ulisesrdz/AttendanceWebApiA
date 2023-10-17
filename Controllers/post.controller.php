<?php
require_once "Models/post.model.php";

class PostController{
    
    static public function createData($table, $data){

        $response = PostModel::createPostData($table, $data);

        $return = new PostController();
        $return -> fncRespose($response);
        return $return;
    }

    static public function registerUser($table, $data, $suffix){

        if(isset($data["password_user"]) && $data["password_user"] != null){
            
            $crypt = crypt($data["password_user"], '$2a$07$odinomesooiystringforsale$');

            $data["password_user"] = $crypt;
            
        }       
        $response = PostModel::createPostData($table, $data, $suffix);

        $return = new PostController();
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