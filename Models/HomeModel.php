<?php 

	class HomeModel extends Mysql
	{	

		public function __construct()
		{
			parent::__construct();
		}

		
		public function selectProductos(){
			
			$sql = "SELECT * FROM products";

			$request = $this->select_all($sql);
			
			return $request;
		}

		public function selectMarcas(){
	
			$sql = "SELECT * FROM brand WHERE id != 9";

			$request = $this->select_all($sql);
				
			return $request;
		}

		public function selectClientes(){
			
			$sql = "SELECT * FROM client";

			$request = $this->select_all($sql);
			
			return $request;
		}


		public function selectDataMapa(string $start, string $end, $productos, $marcas, $clientes)
		{
			
			$where  = $start != '' ? ' cp.created_at BETWEEN "'.$start.'" AND "'.$end.'"' : '';
			$where .= $clientes != "" ? ' AND cp.client_id = '.$clientes.'' : '';
			$where .= $productos != "" ? ' AND cp.product_id = '.$productos.'' : '';
			//$where .= $marcas != "" ? ' AND cp.brand_id = '.$marcas.'' : '';
			$where .= $marcas != "" ? ' AND cp.brand_id IN (9, '.$marcas.')' : '';

            if($start == '' || $productos == ''){
                $where = '1<0';
            }
			
			$sql = "SELECT 
						cp.presentation AS TITLE, 
						'brick' AS ICON, 
						'' AS LABEL, 
						cp.latitude AS LATITUD, 
						cp.longitude AS LONGITUD,
						CONCAT(
							'<div style=\"font-size: 0.8em; font-family: sans-serif;\">', 
								'<h5><b>', cp.presentation, '</b></h5>',
								'<p><b>Cliente:</b> ', cp.client, '</p>',
								'<p><b>Categoría:</b> ', cp.category, '</p>',
								'<p><b>Marca:</b> ', cp.brand, '</p>',
								'<p><b>Precio Competencia:</b> ', cp.price, '</p>',
								'<p><b>Precio Purolomo:</b> ', cp.myPrice, '</p>',
								'<p><b>Persona:</b> ',u.name,' ',u.last_name,' - ',u.enterprise,'</p>',
							'</div>'
						) AS INFO 
					FROM competitor_prices cp
					INNER JOIN users u ON u.id = cp.user_id
					WHERE $where";
			
            $request = $this->select_all($sql);
				
            return $request;
		}

		public function selectCardPurolomo(string $start, string $end, $productos, $marcas, $clientes)
		{	
			$where  = $start != '' ? ' cp.created_at BETWEEN "'.$start.'" AND "'.$end.'"' : '';
			$where .= $clientes != "" ? ' AND cp.client_id = '.$clientes.'' : '';
			$where .= $productos != "" ? ' AND cp.product_id = '.$productos.'' : '';
			//$where .= $marcas != "" ? ' AND cp.brand_id = '.$marcas.'' : '';
			$where .= $marcas != "" ? ' AND cp.brand_id = '.$marcas.'' : '';
			$where .= ' AND cp.myPrice != 0';
			
			if($start == '' || $productos == ''){
                $where = '1<0';
            }
			
			$sql = "SELECT 
						cp.brand,
						cp.presentation,
						CONCAT(MIN(cp.myPrice), ' USD') AS precio_minimo,
						CONCAT(MAX(cp.myPrice), ' USD') AS precio_maximo,
						CONCAT(ROUND(AVG(cp.myPrice), 2), ' USD') AS precio_promedio
					FROM competitor_prices cp
					WHERE $where
					GROUP BY 
						cp.brand,
						cp.presentation";
			
            $request = $this->select($sql);

			return $request;
		}

		public function selectCardCompetencia(string $start, string $end, $productos, $marcas, $clientes)
		{	

			$where  = $start != '' ? ' cp.created_at BETWEEN "'.$start.'" AND "'.$end.'"' : '';
			$where .= $clientes != "" ? ' AND cp.client_id = '.$clientes.'' : '';
			$where .= $productos != "" ? ' AND cp.product_id = '.$productos.'' : '';
			$where .= ' AND cp.myPrice = 0';
			$where .= ' AND cp.brand_id = 9';
			
			if($start == '' || $productos == ''){
                $where = '1<0';
            }

			$sql = "SELECT 
						cp.brand,
						cp.presentation,
						CONCAT(MIN(cp.price), ' USD') AS precio_minimo,
						CONCAT(MAX(cp.price), ' USD') AS precio_maximo,
						CONCAT(ROUND(AVG(cp.price), 2), ' USD') AS precio_promedio
					FROM competitor_prices cp
					WHERE $where
					GROUP BY 
						cp.brand,
						cp.presentation";

            $request = $this->select_all($sql);

            return $request;
		}

		public function selectCardComparativa(string $start, string $end, $productos, $marcas, $clientes)
		{	

			$where  = $start != '' ? ' cp.created_at BETWEEN "'.$start.'" AND "'.$end.'"' : '';
			$where .= $clientes != "" ? ' AND cp.client_id = '.$clientes.'' : '';
			$where .= $productos != "" ? ' AND cp.product_id = '.$productos.'' : '';
			$where .= ' AND cp.myPrice = 0';
			$where .= ' AND cp.brand_id = 9';
			
			if($start == '' || $productos == ''){
                $where = '1<0';
            }

			$sql = "WITH precios_promedios AS (
						SELECT 
							cp.brand,
							cp.presentation,
							ROUND(AVG(cp.price), 2) AS precio_promedio,
							p.name AS nombre_producto
						FROM competitor_prices cp
						JOIN products p ON cp.product_id = p.id
						WHERE $where
						GROUP BY 
							cp.brand,
							cp.presentation,
							p.name
					)
					SELECT
					MAX(nombre_producto) AS nombre_producto,
						(SELECT CONCAT(brand, ' (', precio_promedio, ' USD)') 
						FROM precios_promedios 
						ORDER BY precio_promedio DESC 
						LIMIT 1) AS marca_precio_promedio_mayor,
					
						(SELECT CONCAT(brand, ' (', precio_promedio, ' USD)') 
						FROM precios_promedios 
						ORDER BY precio_promedio ASC 
						LIMIT 1) AS marca_precio_promedio_menor,
					
						CONCAT(ROUND(AVG(precio_promedio), 2), ' USD') AS promedio_general
						
					FROM precios_promedios";

            $request = $this->select($sql);

            return $request;
		}

	}


 ?>
