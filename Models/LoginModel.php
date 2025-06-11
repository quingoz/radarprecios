<?php 

	class LoginModel extends Mysql
	{
		private $intIdUsuario;
		private $strUsuario;
		private $strPassword;

		public function __construct()
		{
			parent::__construct();
		}	

		public function loginUser(string $usuario, string $password)
		{
			$this->strUsuario = $usuario;
			$this->strPassword = $password;
			$sql = "SELECT ID,STATUS FROM users WHERE 
					EMAIL = '$this->strUsuario' and 
					PASSWORD = '$this->strPassword' and 
					STATUS != 0 ";
			$request = $this->select($sql);
			return $request;
		}

		public function sessionLogin(int $iduser){
			$this->intIdUsuario = $iduser;
			//BUSCAR ROLE 
			$sql = "SELECT  u.ID,
							u.NAME,
							u.LAST_NAME,
							u.ENTERPRISE,
							u.EMAIL,
							u.STATUS
					FROM users u
					WHERE u.ID = $this->intIdUsuario";
			$request = $this->select($sql);
			$_SESSION['userData'] = $request;
			return $request;
		}

	}
 ?>