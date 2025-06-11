<?php

$cookie_options = array(
  'expires' => time() + 60*60*24*30,
  'path' => '/',
  'domain' => '.domain.com', // leading dot for compatibility or use subdomain
  'secure' => true, // or false
  'httponly' => false, // or false
  'samesite' => 'None' // None || Lax || Strict
);

setcookie('cors-cookie', 'my-site-cookie', $cookie_options);

//error_reporting(0);
class Conexion4{
	private $conect;

	public function __construct(){
		$connectionString = "mysql:host=".DB_HOST_DINAMICO.";dbname=".DB_NAME_DINAMICO.";charset=".DB_CHARSET_DINAMICO;
		try{
			$this->conect = new PDO($connectionString, DB_USER_DINAMICO, DB_PASSWORD_DINAMICO);
			$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "conexión exitosa";
		}catch(PDOException $e){
			$this->conect = 'Error de conexión';
		    echo "ERROR: " . $e->getMessage();
		}
	}

	public function conect(){
		return $this->conect;
	}
}

?>