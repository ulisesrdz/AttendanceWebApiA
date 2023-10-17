<?php
    // function getConnection()
    // {
    //     $host = 'localhost';
    //     $db_name = 'studentrecords';       
    //     $username = 'root';
    //     $password = '';
        
    //     // $host = 'localhost';
    //     // $username = 'id20826063_ulises';
    //     // $password = 'Ulises870911!';
    //     // $db_name = 'id20826063_dbasis';

    //     $conn= new mysqli($host, $username, $password, $db_name);
    //     if ($conn->connect_error) {
    //         $conn= null;
    //     }
    //     return $conn;

       
    // }
    class Conexion extends PDO
	{
		private $hostBd = 'localhost';
		private $nombreBd = 'studentrecords';
		private $usuarioBd = 'Ulises';//'Ulises';
		private $passwordBd = 'Ulises8709c11';//'$2a$07$odinomesillystringforeshFIEJLIBEOef29FZXs9QS8p8jNbI6C';//'Ulises870911';
		
		public function __construct()
		{
			try{
				parent::__construct('mysql:host=' . $this->hostBd . ';dbname=' . $this->nombreBd . ';', $this->usuarioBd, $this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				
				} catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
				exit;
			}
		}
	}       
?>    