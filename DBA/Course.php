<?php		


//$pdo = new Conexion();
$_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
$pdo=null;
$host="localhost";
$user="Ulises";
$password="Ulises870911";
$bd="studentrecords";

function DBConnection(){
    try{
        $GLOBALS['pdo']=new PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        print "Error!: No se pudo conectar a la bd ".$bd."<br/>";
        print "\nError!: ".$e."<br/>";
        die();
    }
}

function DBDisconnect() {
    $GLOBALS['pdo']=null;
}

function MethodGET($sql){
    try{        
        DBConnection();
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);       
        $stmt -> execute();
        DBDisconnect();
        return $stmt;  
        //$stmt -> closeCursor();      
    }catch(Exception $e){
        die("Error: ".$e);
    }
}

function MethodPUT($sql){
    try{
        $pdo = new Conexion();
		$stmt = $pdo->prepare($sql);		
		$stmt -> execute();
		$resp = array_merge($_GET, $_POST);
        
        return $resp;
        $stmt -> closeCursor();
    }catch(Exception $e){
        die("Error: ".$e);
    }
}

// $conn=getConnection();
// if($conn==null){
//     sendResponse(500,$conn,'Server Connection Error !');
// }else{
   
//     //function MethodGET($sql){
//         $sql='SELECT * FROM courses';
//         //var_dump($sql);

//         $result = mysqli_query($conn,$sql);
        
//         if ($result->num_rows > 0) {
            
//             $courses = array();
//             while($row = $result->fetch_assoc()) {
//                 $course = array(
//                     "id" =>  $row["id"],
//                     "course_name" =>  $row["course_name"]
//                 );
//                 array_push($courses,$course);
//             }
//             sendResponse(200,$courses,'Parts Details.');
//         } else {
//             sendResponse(404,[],"Error Parts.");
//         }
//         $conn->close();
//     }
//}



?>