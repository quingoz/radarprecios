<?php 

require_once("Models/UserModel.php");
require_once("Libraries/Core/Mysql3.php");

class UsuariosModel extends Mysql
{
	private $intIdUsuario;
	private $strNombre;
	private $intDashboard;
	private $strDashboardName;
	private $strColor;
	private $strPassword;
	private $intTipoId;
	private $intStatus;
	private $strToken;
	private $strWebView;

	public function __construct()
	{
		parent::__construct();
	}	

	public function insertUsuario(string $descripcion, string $username, string $strPassword, int $idEnterprise, $Dashboard, string $userToken, string $urlWebView){

		$userModel = new UserModel();
		$mysql3 = new Mysql3();

		$firstDashboard = $Dashboard[0];

		$dataIdInsert = $userModel->data($descripcion,$username, $strPassword,$idEnterprise, $firstDashboard, $userToken, $urlWebView);

		$return = 0;

		$sql = "SELECT * FROM user WHERE 
		USERNAME = $username and ID_DASHBOARD = $firstDashboard";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert  = "INSERT INTO user(ID,
										ID_ENTERPRISE,
										DESSCRIPCION,
										USERTOKEN,
										USERNAME,
										PASSWORD,
										ID_DASHBOARD,
										TIPO,
										URL_WEBVIEW,
										ROLID,
										STATUS) 
			VALUES(?,?,?,?,?,?,?,?,?,?,?)";

			$arrData = array($dataIdInsert,
							$idEnterprise,
							$descripcion,
							$userToken,
							$username,
							$strPassword,
							$firstDashboard,
							'user',
							$urlWebView,
							3,
							1);

			$insertUserId = $this->insert_Id($query_insert,$arrData);

			if($insertUserId)
			{	
				$request_insert_2 = $mysql3->insert($query_insert,$arrData);

				if($request_insert_2){
					foreach ($Dashboard as $dashboardID) {
										
						$selectDashboard = "SELECT * FROM dashboard WHERE ID_DASHBOARD = $dashboardID";
						$resDashboard = $this->select($selectDashboard);
	
						// Si no existe, realiza el insert
						$sqlDashboard = "INSERT INTO user_dashboards (USER_ID, DASHBOARD_ID, DASHBOARD_NAME, ORDER_DASHBOARD) VALUES (?, ?, ?, ?)";
						$arrDashboardData = array($insertUserId, $dashboardID, $resDashboard['DESCRIPCION'], 1);
						$this->insert($sqlDashboard, $arrDashboardData);
						
					}
				}
				
				$return = $request_insert_2;
			}
			
		}else{
			$return = "exist";
		}
		return $return;

	}

	public function selectUsuarios()
	{
		$sql = "SELECT u.ID,e.NOMBRE AS ENTERPRISE, u.DESSCRIPCION, u.USERTOKEN, u.USERNAME, u.URL_WEBVIEW, d.DESCRIPCION AS DASHBOARD, u.STATUS 
				FROM `user` u
				INNER JOIN enterprise e ON e.ID = u.ID_ENTERPRISE
				INNER JOIN dashboard d ON d.ID_DASHBOARD = u.ID_DASHBOARD";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectUsuario(int $idpersona){

		$sql = "SELECT u.ID,e.NOMBRE AS NOMBRE_ENTERPRISE, e.ID AS ID_ENTERPRISE, u.DESSCRIPCION, u.USERTOKEN, u.USERNAME, u.URL_WEBVIEW, d.DESCRIPCION AS NOMBRE_DASHBOARD, d.ID_DASHBOARD AS ID_DASHBOARD, u.STATUS 
				FROM `user` u
				INNER JOIN enterprise e ON e.ID = u.ID_ENTERPRISE
				INNER JOIN dashboard d ON d.ID_DASHBOARD = u.ID_DASHBOARD
				WHERE u.ID = $idpersona";
		$request = $this->select($sql);
		return $request;
	}

	public function updateUsuario(int $idUsuario, string $nombre, int $idDashboard, string $dashboarName, string $color,  string $password, int $tipoid, int $status, string $token, string $webView){

		$this->intIdUsuario = $idUsuario;
		$this->strNombre = $nombre;
		$this->intDashboard = $idDashboard;
		$this->strDashboardName = $dashboarName == NULL ? '' : $dashboarName;
		$this->strColor = $color;
		$this->strPassword = $password;
		$this->intTipoId = $tipoid;
		$this->intStatus = $status;
		$this->strToken = $token == NULL ? '' : $token;
		$this->strWebView = $webView;

		if($this->strPassword  != "")
		{
			$sql = "UPDATE user SET USERNAME=?, ID_DASHBOARD=?, DESSCRIPCION=?, PASSWORD=?, ROLID=?, STATUS=?,COLOR1=?,USERTOKEN=?,URL_WEBVIEW=?
			WHERE id = $this->intIdUsuario ";
			$arrData = array($this->strNombre,
				$this->intDashboard,
				$this->strDashboardName,
				$this->strPassword,
				$this->intTipoId,
				$this->intStatus,
				$this->strColor,
				$this->strToken,
				$this->strWebView
			);
		}else{
			$sql = "UPDATE user SET USERNAME=?,ID_DASHBOARD=?, DESSCRIPCION=?, ROLID=?, STATUS=?,COLOR1=?,USERTOKEN=?,URL_WEBVIEW=?
			WHERE id = $this->intIdUsuario ";
			$arrData = array($this->strNombre,
				$this->intDashboard,
				$this->strDashboardName,
				$this->intTipoId,
				$this->intStatus,
				$this->strColor,
				$this->strToken,
				$this->strWebView
			);
		}
		$request = $this->update($sql,$arrData);

		return $request;
		
	}
	public function deleteUsuario(int $intIdpersona)
	{
		$this->intIdUsuario = $intIdpersona;
		$sql = "SELECT ID, STATUS FROM user WHERE ID = $intIdpersona";
		$requestSelect = $this->select($sql);

		$id = $requestSelect['ID'];
		if($requestSelect['STATUS'] == 1){
			$status = 0;
		}else{
			$status = 1;
		}
		$sql = "UPDATE user SET STATUS = $status WHERE ID = $id";
		$request = $this->delete($sql);
		return $request;
	}

	public function updateDUser(int $idUsuario, int $dashboard, string $password){
		$this->intIdUsuario = $idUsuario;
		$this->intDashboard = $dashboard;
		$this->strPassword = $password;;

		if(!empty($_SESSION['permisos'][4]['r']) || !empty($_SESSION['userDashboards'])){ 
			if($this->strPassword != "")
			{
				$sql = "UPDATE user SET ID_DASHBOARD=?, PASSWORD=? 
				WHERE ID = $this->intIdUsuario ";
				$arrData = array($this->intDashboard,$this->strPassword);
			}else{
				$sql = "UPDATE user SET ID_DASHBOARD=?
				WHERE ID = $this->intIdUsuario ";
				$arrData = array($this->intDashboard);
			}
			$request = $this->update($sql,$arrData);

		} else {

			if($this->strPassword != "")
			{
				$sql = "UPDATE user SET PASSWORD=? 
				WHERE ID = $this->intIdUsuario ";
				$arrData = array($this->strPassword);
			}
			$request = $this->update($sql,$arrData);
		}

		return $request;
	}

	public function updateDUserData($idUsuario, $Descripcion, $Username, $Enterprise, $Dashboard, $TokenUser, $strPassword, $urlWebView){
		
		$userModel = new UserModel();
		$mysql3 = new Mysql3();

		$firstDashboard = $Dashboard[0];

		$dataIdUpdate = $userModel->updated($idUsuario, $Descripcion, $Username, $Enterprise, $firstDashboard, $TokenUser, $strPassword, $urlWebView);

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
		
		if($request){
			$request_2 = $mysql3->update($sql,$arrData);

			if($request_2){
				
				foreach ($Dashboard as $dashboardID) {
										
					$selectDashboard = "SELECT * FROM dashboard WHERE ID_DASHBOARD = $dashboardID";
					$resDashboard = $this->select($selectDashboard);

					$sqlCheck = "SELECT COUNT(*) as total FROM user_dashboards WHERE USER_ID = $idUsuario AND DASHBOARD_ID = $dashboardID";
					$resultCheck = $this->select($sqlCheck);

					if ($resultCheck['total'] == 0) {
						// Si no existe, realiza el insert
						$sqlDashboard = "INSERT INTO user_dashboards (USER_ID, DASHBOARD_ID, DASHBOARD_NAME, ORDER_DASHBOARD) VALUES (?, ?, ?, ?)";
						$arrDashboardData = array($idUsuario, $dashboardID, $resDashboard['DESCRIPCION'], 1);
						$this->insert($sqlDashboard, $arrDashboardData);
					}
				}

				$dashboardIDs = implode(",", $Dashboard);
				$sqlDeleteDashboard = "DELETE FROM user_dashboards WHERE USER_ID = $idUsuario AND DASHBOARD_ID NOT IN ($dashboardIDs)";
    			$this->delete($sqlDeleteDashboard);
			}
		}

		return 1;
	}

	public function selectDashboardUser($idpersona)
	{
		$sql = "SELECT * FROM user_dashboards WHERE USER_ID = $idpersona";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectDashboard()
	{
		$sql = "SELECT * FROM dashboard";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectEnterpriseUser()
	{
		$sql = "SELECT * FROM enterprise";
		$request = $this->select_all($sql);
		return $request;
	}

}
?>