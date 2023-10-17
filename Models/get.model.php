<?php

require_once "DBA/DBConnection.php";

class GetModel{
    static public function getData($table){

        $sql = "SELECT * FROM $table";       
        $stmt = Connection::ConnectDB()->prepare($sql);
        $stmt ->execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);

    }

    static public function getDataByID($table, $id){

        $sql = "SELECT * FROM $table WHERE id=$id";       
        $stmt = Connection::ConnectDB()->prepare($sql);
        $stmt ->execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);

    }

    static public function getSearchData($table, $search){

        $sql = "SELECT * FROM $table WHERE id like '%$search%' OR course_name like '%$search%'";       
        $stmt = Connection::ConnectDB()->prepare($sql);
        $stmt ->execute();       
        return $stmt -> fetchAll(PDO::FETCH_CLASS);


    }
}