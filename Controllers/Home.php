<?php 

class Home extends Controllers{
    public function __construct()
    {   
        
        // Llama al constructor del padre (Controllers)
        parent::__construct();
        // Inicia o reanuda la sesión
        session_start();
        //session_regenerate_id(true); // Opcional: regenera ID de sesión
        // Verifica si el usuario está logueado
        if(empty($_SESSION['login']))
        {
            // Redirige al login si no hay sesión activa
            header('Location: '.base_url().'/login');
        }
        

        //error_reporting(0); // Opcional: desactiva reporte de errores
        // Obtiene permisos para el módulo 1 (Home)
        //getPermisos(1);

    }
    
    public function home()
    {   
        
        // Obtiene parámetros de fecha del GET
        $start = !empty($_GET['start']) ? $_GET['start'] : '';
        $end = !empty($_GET['end']) ? $_GET['end'] : '';
        $productos = !empty($_GET['productos']) ? $_GET['productos'] : '';
        $marcas = !empty($_GET['marcas']) ? $_GET['marcas'] : '';
        $clientes = !empty($_GET['clientes']) ? $_GET['clientes'] : '';
	
        // Configura datos básicos para la vista
        $data['page_id'] = 1;
        $data['page_tag'] = "Home";
        $data['page_title'] = "Página principal";
        $data['page_name'] = "tabla";
        $data['page_functions_js'] = "functions_admin.js";

        // Obtiene datos para los selectores de filtro
        $data['productos'] = $this->model->selectProductos();
        $data['marcas'] = $this->model->selectMarcas();
        $data['clientes'] = $this->model->selectClientes();

        $data['mapa'] = $this->model->selectDataMapa($start, $end, $productos, $marcas, $clientes) 
                            ? $this->model->selectDataMapa($start, $end, $productos, $marcas, $clientes)
                            : array();

        $data['cardPurolomo'] = $this->model->selectCardPurolomo($start, $end, $productos, $marcas, $clientes) 
                                ? $this->model->selectCardPurolomo($start, $end, $productos, $marcas, $clientes)
                                : array();

        $data['cardCompetencia'] = $this->model->selectCardCompetencia($start, $end, $productos, $marcas, $clientes) 
                                ? $this->model->selectCardCompetencia($start, $end, $productos, $marcas, $clientes)
                                : array();

        $data['cardComparativa'] = $this->model->selectCardComparativa($start, $end, $productos, $marcas, $clientes) 
                            ? $this->model->selectCardComparativa($start, $end, $productos, $marcas, $clientes)
                            : '';
		
        // Carga la vista home con todos los datos procesados
        $this->views->getView($this,"home",$data);
    }
}
?>