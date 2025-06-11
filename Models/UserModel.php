<?php 

class UserModel extends Mysql2
{

	public function __construct()
	{
		parent::__construct();
	}	

    public function data($descripcion,$username, $strPassword,$idEnterprise, $firstDashboard, $userToken, $urlWebView)
    {
        $return = 0;

		$sql = "SELECT * FROM user WHERE 
		USERNAME = $username and ID_DASHBOARD = $firstDashboard";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert  = "INSERT INTO user(ID_ENTERPRISE,
										DESSCRIPCION,
										USERTOKEN,
										USERNAME,
										PASSWORD,
										ID_DASHBOARD,
										TIPO,
										URL_WEBVIEW,
										ROLID,
										STATUS) 
			VALUES(?,?,?,?,?,?,?,?,?,?)";
			$arrData = array($idEnterprise,
							$descripcion,
							$userToken,
							$username,
							$strPassword,
							$firstDashboard,
							'user',
							$urlWebView,
							3,
							1);

			$request_insert = $this->insert($query_insert,$arrData);
			$return = $request_insert;
		}else{
			$return = "exist";
		}
		return $return;
    }

	public function updated($idUsuario, $Descripcion, $Username, $Enterprise, $firstDashboard, $TokenUser, $strPassword, $urlWebView){
		

		if($strPassword == ''){
			$sql = "UPDATE user SET ID_ENTERPRISE = ?,
								DESSCRIPCION = ?,
								USERTOKEN = ?,
								USERNAME = ?,
								ID_DASHBOARD = ?,
								URL_WEBVIEW = ?
					WHERE ID = ?";

			$arrData = array($Enterprise,$Descripcion, $TokenUser, $Username, $firstDashboard, $urlWebView, $idUsuario);

		}else{
			$sql = "UPDATE user SET ID_ENTERPRISE = ?,
								DESSCRIPCION = ?,
								USERTOKEN = ?,
								USERNAME = ?,
								PASSWORD = ?,
								ID_DASHBOARD = ?,
								URL_WEBVIEW = ?
					WHERE ID = ?";

			$arrData = array($Enterprise,$Descripcion, $TokenUser, $Username, $strPassword, $firstDashboard, $urlWebView, $idUsuario);
		}
		
		$request = $this->update($sql,$arrData);

		return $request;
	}


}
?>