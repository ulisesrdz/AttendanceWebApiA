<?php

class Connection{

    static public function infoDatabase(){
        $infoDB = array (
            "server" => "localhost",
            "database" => "studentrecords",
            "user" => "Ulises",
            "pass" => "Ulises870911"
        );
        return $infoDB;
    }

    static public function ConnectDB(){
        try{

            $link = new PDO(
                "mysql:host=".Connection::infoDatabase()["server"].";dbname=".Connection::infoDatabase()["database"],
                Connection::infoDatabase()["user"],
                Connection::infoDatabase()["pass"]
            );

            $link -> exec("set names utf8");
        }catch(PDOExption $e){
            die("Error: ".$e->getMessage());
        }

        return $link;
    }
}