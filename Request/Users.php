<?php		
	include_once('../Common/include.php');
    include_once('../Common/encipher.php');
	$pdo = new Conexion();
	
	//echo $pdo;
	//Listar registros y consultar registro
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['id']))
		{
			$sql = $pdo->prepare("SELECT * FROM users WHERE id=:id");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;				
			
        } else {
			
			$sql = $pdo->prepare("SELECT * FROM users");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;		
		}
	}

	$_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));
	//Insertar registro
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
        $password = doEncrypt($_POST["Password"]);
        
		$sql = $pdo->prepare("SELECT * FROM users WHERE user_name=:user_name");	
		$sql->bindValue(':user_name', $_POST['user_name']);		
		$sql->execute();
		$resp = $sql->fetchColumn();	
		
        if($resp > 0){
            header("HTTP/1.1 200 Datos Duplicados");
            echo json_encode($sql->fetchAll()); 
			exit;       	
        }

		$sql = "INSERT INTO users (user_name,password,user_type,active_user) VALUES (:user_name,:password,:user_type,:active_user)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':user_name', $_POST['user_name']);	
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':user_type', $_POST['user_type']);
        $stmt->bindValue(':active_user', $_POST['active_user']);
       
		$stmt->execute();
		$idPost = $pdo->lastInsertId(); 
		if($idPost)
		{
			header("HTTP/1.1 200 Ok");
			echo json_encode($idPost);
			exit;
		}
	}
	
	//Actualizar registro
	if($_SERVER['REQUEST_METHOD'] == 'PUT')
	{		
        
		$sql = "UPDATE users SET user_name=:user_name,password=:password,user_type=:user_type,active_user=:active_user,expyre_time=:expyre_time WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':user_name', $_GET['user_name']);	
        $stmt->bindValue(':password', $_GET['password']);
        $stmt->bindValue(':user_type', $_GET['user_type']);
        $stmt->bindValue(':active_user', $_GET['active_user']);
        $stmt->bindValue(':created_DateTime', $timestamp);	
        $smt->bindValue(':expyre_time', getdate('YYYY-MM-DD'));	
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//Eliminar registro
	if($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
		$sql = "DELETE FROM users WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//Si no corresponde a ninguna opción anterior
	header("HTTP/1.1 400 Bad Request");
?>