<?php		
	include_once('../Common/include.php');
	
	
	$_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));

	//header('Access-Control-Allow-Origin: *');
	//echo $pdo;
	//Listar registros y consultar registro
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['id']))
		{
			$pdo = new Conexion();
			$sql = $pdo->prepare("SELECT * FROM courses WHERE id=:id");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;				
			
        } else {
			$pdo = new Conexion();
			$sql = $pdo->prepare("SELECT * FROM courses");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;		
		}
	}
	
	//Insertar registro
	if($_POST['METHOD'] == 'PUT')
	{		$pdo = new Conexion();
		$sql = "INSERT INTO courses (course_name) VALUES(:course_name)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':course_name', $_POST['course_name']);		
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
	if($_POST['METHOD'] == 'POST')
	{				
		$sql = "UPDATE courses SET course_name=:course_name WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$data = json_decode(file_get_contents("php://input"), true);

		$stmt->bindValue(':course_name', $_POST['course_name']);		
		$stmt->bindValue(':id', $_POST['id']);
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//Eliminar registro
	if($_POST['METHOD'] == 'DELETE')
	{
		$sql = "DELETE FROM courses WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//Si no corresponde a ninguna opción anterior
	header("HTTP/1.1 400 Bad Request");
?>