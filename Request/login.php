<?php
include_once('../Common/include.php');
include_once('../Common/encipher.php');

$_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));
$pdo = new Conexion();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['username']))
    {
        $password = doEncrypt($_POST["Password"]);
        
        $sql = $pdo->prepare("SELECT * FROM users WHERE user_name=:username AND password=:password");
        $sql->bindValue(':username', $_POST['username']);
        $sql->bindValue(':password', $password);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $resp = $sql->fetchColumn();
        if($resp > 0){
            header("HTTP/1.1 200 hay datos");
            echo json_encode($sql->fetchAll());        	
        }
        else{
            header("HTTP/1.1 202 Invalid Credentials"); 
        }
        exit;        			
     		
     }     
}

    header("HTTP/1.1 400 Bad Request");

?>    

