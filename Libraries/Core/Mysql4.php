<?php 
	
	class Mysql4 extends Conexion4
	{
		private $conexion;
		private $strquery;
		private $arrValues;

		function __construct()
		{
			$this->conexion = new Conexion4();
			$this->conexion = $this->conexion->conect();

			$sql_mode = $this->conexion->prepare("SET sql_mode = ''");
			$sql_mode->execute();
		}

		//Insertar un registro
		public function insert(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrVAlues = $arrValues;
        	$insert = $this->conexion->prepare($this->strquery);
        	$resInsert = $insert->execute($this->arrVAlues);
        	if($resInsert)
	        {
	        	$lastInsert = 1;
	        }else{
	        	$lastInsert = 0;
	        }
	        return $lastInsert; 
		}
		
		//Insertar varios registors
		public function insert_massive(string $query){
			$this->strquery = $query;
			$insert = $this->conexion->prepare($this->strquery);
			$insert->execute();
			if($insert)
	        {
	        	$lastInsert = 1;
	        }else{
	        	$lastInsert = 0;
	        }
	        return $lastInsert; 
		}
		//Busca un registro
		public function select(string $query)
		{
			try {
				$this->strquery = $query;
				$result = $this->conexion->prepare($this->strquery);
				$result->execute();
				$data = $result->fetch(PDO::FETCH_ASSOC);

				return $data;
				
			} catch (\Throwable $th) {
				if(isset($_GET['debug'])){
					echo $th;
					throw $th;
				}
			}
		}
		//Devuelve todos los registros
		public function select_all(string $query)
		{
			$this->strquery = $query;
			try {
				
				$result = $this->conexion->prepare($this->strquery);
				$result->execute();
	        	$data = $result->fetchall(PDO::FETCH_ASSOC);
	        	return $data;

			} catch (Exception $e) {
				
				if ($_GET['debug'] == 1) {
					echo 'CHECK THIS QUERY: '. $this->strquery. '</br></br>';
					echo $e;
				}	
				
			}	
        	
		}
		//Actualiza registros
		public function update(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrVAlues = $arrValues;
			$update = $this->conexion->prepare($this->strquery);
			$resExecute = $update->execute($this->arrVAlues);
	        return $resExecute;
		}
		//actualizar varios registors
		public function update_massive(string $query){
			$this->strquery = $query;
			$update = $this->conexion->prepare($this->strquery);
			$update->execute();
	        return $update; 
		}
		//Eliminar un registros
		public function delete(string $query)
		{
			$this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$del = $result->execute();
        	return $del;
		}
	}


 ?>

