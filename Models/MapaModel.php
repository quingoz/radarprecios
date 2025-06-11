<?php 

	class MapaModel extends Mysql
	{	
        public function __construct()
		{
			parent::__construct();
		}

        public function selectGrupos(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT p.SQL_SINCE, dashboard.BD
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'grupos'
			AND	u.ID=$id_user ";
            
            $request = $this->select($sql);

            $bd = $request['BD'];

            $sql_since = $request['SQL_SINCE'];
			$sql_since = str_replace("'@BD'", $bd, $sql_since);
			$result = $this->select_all($sql_since);
			$request['SQL_SINCE'] = $result;
            
			return $request['SQL_SINCE'];
		}

        public function selectVendedores(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT SQL_SINCE , dashboard.BD
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'vendedores'
			AND	u.ID=$id_user";

            $request = $this->select($sql);

            $bd = $request['BD'];

            $sql_since = $request['SQL_SINCE'];
            $sql_since = str_replace("'@BD'", $bd, $sql_since);
            $result = $this->select_all($sql_since);
            $request['SQL_SINCE'] = $result;

            return $request['SQL_SINCE'];

		}

        public function selectEstados(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT SQL_SINCE , dashboard.BD
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'estados'
			AND	u.ID=$id_user";
			
            $request = $this->select($sql);

            $bd = $request['BD'];

            $sql_since = $request['SQL_SINCE'];
            $sql_since = str_replace("'@BD'", $bd, $sql_since);
            $result = $this->select_all($sql_since);
            $request['SQL_SINCE'] = $result;

            return $request['SQL_SINCE'];

		}

        public function selectMunicipios(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT SQL_SINCE, dashboard.BD 
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'municipios'
			AND	u.ID=$id_user";

            $request = $this->select($sql);

            $bd = $request['BD'];

            $sql_since = $request['SQL_SINCE'];
            $sql_since = str_replace("'@BD'", $bd, $sql_since);
            $result = $this->select_all($sql_since);
            $request['SQL_SINCE'] = $result;

            return $request['SQL_SINCE'];

		}

        public function selectClientes(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT SQL_SINCE, dashboard.BD  
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'clientes'
			AND	u.ID=$id_user";
    
            $request = $this->select($sql);

            $bd = $request['BD'];

            $sql_since = $request['SQL_SINCE'];
            $sql_since = str_replace("'@BD'", $bd, $sql_since);
            $result = $this->select_all($sql_since);
            $request['SQL_SINCE'] = $result;

            return $request['SQL_SINCE'];
		}

        public function selectCategorias(array $categorias){

			$id_user = $_SESSION['userData']['ID'];
			if(empty($categorias)){
				$where = ' WHERE 1<0';
			}else{
				$categorias = implode(",", $categorias);
				$where = ' WHERE PDT_GPO_CODIGO IN('.$categorias.')';
			}
			
			$sql = "SELECT SQL_SINCE, dashboard.BD   
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'productos'
			AND	u.ID=$id_user";

			$request = $this->select($sql);

			$bd = $request['BD'];

			$sql_since = $request['SQL_SINCE'];
			$sql_since = str_replace("'@BD'", $bd, $sql_since);
			$sql_since .= $where;
			$result = $this->select_all($sql_since);
			$request['SQL_SINCE'] = $result;
			return $request['SQL_SINCE'];
		}

        public function selectMunicipiosEstado(array $estados){

			$id_user = $_SESSION['userData']['ID'];

			if(empty($estados)){
				$where = ' WHERE 1<0';
			}else{
				$estados = implode(",", $estados);
				$where = ' WHERE MPO_EDO_CODIGO IN('.$estados.')';
			}

			$sql = "SELECT SQL_SINCE, dashboard.BD 
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'municipios'
			AND	u.ID=$id_user";
			
			$request = $this->select($sql);

			$bd = $request['BD'];

			$sql_since = $request['SQL_SINCE'];
			$sql_since = str_replace("'@BD'", $bd, $sql_since);
			$sql_since .= $where;
			$result = $this->select_all($sql_since);
			$request['SQL_SINCE'] = $result;
			return $request['SQL_SINCE'];
		}

        public function selectClientesEstado(array $estados){

			$id_user = $_SESSION['userData']['ID'];

			if(empty($estados)){
				$where = ' WHERE 1<0';
			}else{
				$estados = implode(",", $estados);
				$where = ' WHERE CLT_EDO_CODIGO IN('.$estados.')';
			}
			
			$sql = "SELECT SQL_SINCE, dashboard.BD  
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'clientes'
			AND	u.ID=$id_user";
			
			$request = $this->select($sql);

			$bd = $request['BD'];

			$sql_since = $request['SQL_SINCE'];
			$sql_since = str_replace("'@BD'", $bd, $sql_since);
			$sql_since .= $where;
			$result = $this->select_all($sql_since);
			$request['SQL_SINCE'] = $result;
			return $request['SQL_SINCE'];
			
		}

        public function selectClientesMunicipios(array $municipios){

			$id_user = $_SESSION['userData']['ID'];

			$municipios = implode(",", $municipios);

			$where = 'WHERE CLT_MPO_CODIGO IN('.$municipios.')';
			$sql = "SELECT SQL_SINCE 
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE NAME_COLUMN = 'MAPA' 
			AND LABEL = 'clientes'
			AND	u.ID=$id_user";
			$result = implode($this->select($sql));

			$result .= $where;
			return $this->select_all($result); 
		}

        public function selectFrecuencia(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT SQL_SINCE 
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'frecuencia'
			AND	u.ID=$id_user";
			$result = implode($this->select($sql));

			return $this->select_all($result);

		}

        public function selectSemana(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT SQL_SINCE 
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'semana'
			AND	u.ID=$id_user";
			$result = implode($this->select($sql));

			return $this->select_all($result);

		}

        public function selectDiaVisita(){

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT SQL_SINCE 
			FROM param p
			INNER JOIN dashboard_kpi  ON p.ID_KPI = dashboard_kpi.ID_KPI
			INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
			INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
			WHERE p.NAME_COLUMN = 'MAPA' 
			AND p.LABEL = 'diavisita'
			AND	u.ID=$id_user";
			$result = implode($this->select($sql));

			return $this->select_all($result);

		}

        public function selectDataMapa(string $start, string $end, array $grupos, array $productos, array $vendedores, array $estados, array $municipios, array $clientes, array $transportistas, array $frecuencia, array $semana, array $diavisita){

			

			$grupos = implode(",", $grupos);
			$productos = implode(",", $productos);
			$vendedores = implode(",", $vendedores);
			$estados = implode(",", $estados);
			$municipios = implode(",", $municipios);
			$clientes = implode(",", $clientes);
			$transportistas = implode(",", $transportistas);
			$frecuencia = implode(",", $frecuencia);
			$semana = implode(",", $semana);
			$diavisita = implode(",", $diavisita);

		

			$where  = $start != '' ? ' DCL_FECHA BETWEEN "'.$start.'" AND "'.$end.'"' : '';
			$where .= $grupos != "" ? ' AND PDT_GPO_CODIGO IN('.$grupos.')' : '';
			$where .= $productos != "" ? ' AND PDT_CODIGO IN('.$productos.')' : '';
			$where .= $vendedores != "" ? ' AND VEN_CODIGORUTA IN('.$vendedores.')' : '';
            
            if($start == '' && $grupos == '' && $productos == '' && $vendedores == ''){
                $where = '1>0';
            }
			$whereFrom  = $estados != "" ? ' AND EDO_CODIGO IN('.$estados.')' : '';
			$whereFrom .= $municipios != "" ? ' AND MPO_CODIGO IN('.$municipios.')' : '';
			$whereFrom .= $clientes != "" ? ' AND CLT_CODIGO IN('.$clientes.')' : '';

			$id_user = $_SESSION['userData']['ID'];
         //   dep($id_user);
			$sql = "SELECT k.PARAM2, dashboard.BD
					FROM kpi k
					INNER JOIN dashboard_kpi  ON k.ID_KPI = dashboard_kpi.ID_KPI
	                INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
					INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
					WHERE k.ID_GRAFICA  = '13' AND dashboard_kpi.LABEL = 'MAPA'
					AND	u.ID=$id_user";
            
            

            $request = $this->select($sql);

            $bd = $request['BD'];

            $param2 = $request['PARAM2'];
            $param2 = str_replace("'@BD'", $bd, $param2);
			$param2 = str_replace("'@CWHERE'", $where, $param2);
			$param2 = str_replace("'@CWHERE_FROM'", $whereFrom == '' ? '' : $whereFrom , $param2);
			$param2 = str_replace("'@V1'", "'".$start."'", $param2);
			$param2 = str_replace("'@V2'", "'".$end."'", $param2);
			$param2 = str_replace("'@V3'", $grupos =="" ? 'NULL' : $grupos , $param2);
			$param2 = str_replace("'@V4'", $productos =="" ? 'NULL' : $productos , $param2);
			$param2 = str_replace("'@V5'", $vendedores =="" ? 'NULL' : $vendedores , $param2);
			$param2 = str_replace("'@V6'", $estados =="" ? 'NULL' : $estados , $param2);
			$param2 = str_replace("'@V7'", $municipios =="" ? 'NULL' : $municipios , $param2);
			$param2 = str_replace("'@V8'", $clientes == "" ? 'NULL' : "'".$clientes."'" , $param2);
			$param2 = str_replace("'@V9'",  $frecuencia =="" ? 'NULL' : $frecuencia , $param2);
			$param2 = str_replace("'@V10'", $semana =="" ? 'NULL' : $semana , $param2);
			$param2 = str_replace("'@V11'", $diavisita =="" ? 'NULL' : $diavisita , $param2);
			$param2 = str_replace("'@V12'", $transportistas == "" ? 'NULL' : $transportistas , $param2);
		
            $result = $this->select_all($param2);

            $request['PARAM2'] = $result;

            if(isset($_GET['debug'])){
				
				return $param2;

            } else {
                
                return $request['PARAM2'];
            }

            return $request;
		}

        public function selectDataInfo(string $start, string $end, array $grupos, array $productos, array $vendedores, array $estados, array $municipios, array $clientes, array $transportistas, array $frecuencia, array $semana, array $diavisita){

			$grupos = implode(",", $grupos);
			$productos = implode(",", $productos);
			$vendedores = implode(",", $vendedores);
			$estados = implode(",", $estados);
			$municipios = implode(",", $municipios);
			$clientes = implode(",", $clientes);
			$transportistas = implode(",", $transportistas);
			$frecuencia = implode(",", $frecuencia);
			$semana = implode(",", $semana);
			$diavisita = implode(",", $diavisita);

            if($start == ''){
                return;
            }

			$where  = $start != "" ? ' DCL_FECHA BETWEEN "'.$start.'" AND "'.$end.'"' : '';
			$where .= $grupos != "" ? ' AND PDT_GPO_CODIGO IN('.$grupos.')' : '';
			$where .= $productos != "" ? ' AND PDT_CODIGO IN('.$productos.')' : '';
			$where .= $vendedores != "" ? ' AND VEN_CODIGORUTA IN('.$vendedores.')' : '';

            if($start == '' && $grupos == '' && $productos == '' && $vendedores == ''){
                $where = '1>0';
            }

			$whereFrom  = $estados != "" ? 'AND EDO_CODIGO IN('.$estados.')' : '';
			$whereFrom .= $municipios != "" ? ' AND MPO_CODIGO IN('.$municipios.')' : '';
			$whereFrom .= $clientes != "" ? ' AND CLT_CODIGO IN('.$clientes.')' : '';

			$id_user = $_SESSION['userData']['ID'];

			$sql = "SELECT k.PARAM3, dashboard.BD 
					FROM kpi k
					INNER JOIN dashboard_kpi  ON k.ID_KPI = dashboard_kpi.ID_KPI
			        INNER JOIN dashboard ON dashboard_kpi.`ID_DASHBOARD` = dashboard.`ID_DASHBOARD`
					INNER JOIN user u ON dashboard.id_dashboard = u.id_dashboard
					WHERE k.ID_GRAFICA  = '13' AND dashboard_kpi.LABEL = 'MAPA'
					AND	u.ID=$id_user";
    
            $request = $this->select($sql);

            $bd = $request['BD'];

            $param3 = $request['PARAM3'];
            $param3 = str_replace("'@BD'", $bd, $param3);
			$param3 = str_replace("'@CWHERE'", $where, $param3);
			$param3 = str_replace("'@CWHERE_FROM'", $whereFrom, $param3);
			$param3 = str_replace("'@V1'", "'".$start."'", $param3);
			$param3 = str_replace("'@V2'", "'".$end."'", $param3);
			$param3 = str_replace("'@V3'", $grupos =="" ? 'NULL' : $grupos , $param3);
			$param3 = str_replace("'@V4'", $productos =="" ? 'NULL' : $productos , $param3);
			$param3 = str_replace("'@V5'", $vendedores =="" ? 'NULL' : $vendedores , $param3);
			$param3 = str_replace("'@V6'", $estados =="" ? 'NULL' : $estados , $param3);
			$param3 = str_replace("'@V7'", $municipios =="" ? 'NULL' : $municipios , $param3);
			$param3 = str_replace("'@V8'", $clientes =="" ? 'NULL' : "'".$clientes."'" , $param3);
			$param3 = str_replace("'@V9'",  $frecuencia =="" ? 'NULL' : $frecuencia , $param3);
			$param3 = str_replace("'@V10'", $semana =="" ? 'NULL' : $semana , $param3);
			$param3 = str_replace("'@V11'", $diavisita =="" ? 'NULL' : $diavisita , $param3);
			$param3 = str_replace("'@V12'", $transportistas =="" ? 'NULL' : $transportistas , $param3);

            $result = $this->select_all($param3);
            $request['PARAM3'] = $result;

            
            if(isset($_GET['debug'])){
                
                return $param3;

            } else {
                    
                return $request['PARAM3'];
            }

            return $request;

		}
    } 
?>