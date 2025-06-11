<?php 

	class LogoutModel extends Mysql
	{
		private $intIdUsuario;

		public function __construct()
		{
			parent::__construct();
		}	

		public function logoutTime(int $idUser)
		{
			$this->intIdUsuario = $idUser;
			$log_out = date('Y-m-d H:i');
			$ip = $_SERVER['REMOTE_ADDR'];


			$update = "UPDATE log_sessions SET log_out = ? WHERE log_in = (SELECT MAX(log_in) FROM log_sessions WHERE user_id = $this->intIdUsuario AND ip_address = '$ip')";
			$arrData = array($log_out);
			$request = $this->update($update,$arrData);

			return $request;
		}



	}
 ?>