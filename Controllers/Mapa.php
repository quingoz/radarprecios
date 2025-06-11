<?php 
class Mapa extends Controllers{
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
        // Obtiene permisos para el módulo 1 (Mapa)
        getPermisos(1);
    }

    public function mapa()
    {
        // Inicializa arrays para filtros
        $categorias     = array();
        $productos  = array();
        $marcas = array();
        $clientes = array();
        
        // Obtiene parámetros de fecha del GET
        $start = !empty($_GET['start']) ? $_GET['start'] : '';
        $end = !empty($_GET['end']) ? $_GET['end'] : '';
        
        // Procesa los parámetros de filtro del GET asegurando valores únicos
        $categorias = isset($_GET['categorias']) ? ["'".$_GET['categorias']."'"] : [];
        $productos = isset($_GET['productos']) ? ["'".$_GET['productos']."'"] : [];
        $marcas = isset($_GET['marcas']) ? ["'".$_GET['marcas']."'"] : [];

        if(isset($_GET['clientes'])) {
            $clientes = is_array($_GET['clientes']) ? $_GET['clientes'] : explode(',', $_GET['clientes']);
            $clientes = array_map(function($cliente) { return "'$cliente'"; }, $clientes);
        } else {
            $clientes = [];
        }

        // Configura datos para la vista
        $data['page_id'] = 1;
        $data['page_tag'] = "mapa";
        $data['page_title'] = "Mapa";
        $data['page_name'] = "mapa";
        $data['page_functions_js'] = "functions_mapa.js";
        
        // Obtiene datos para los selectores de filtro
        $data['categorias'] = $this->model->selectCategorias();
        $data['productos'] = $this->model->selectProductos();
        $data['marcas'] = $this->model->selectMarcas();
        $data['clientes'] = $this->model->selectClientes();

        // Obtiene datos para el mapa según los filtros aplicados
        $data['mapa'] = $this->model->selectDataMapa($start, $end, $categorias, $productos, $marcas, $clientes) 
                            ? $this->model->selectDataMapa($start, $end, $categorias, $productos, $marcas, $clientes)
                            : array();

        // Modo debug para ver datos del mapa
        if(isset($_GET['debug'])){
            echo 'PARAM2'; 
            dep($data['mapa']);
        }

        // Obtiene datos para las tarjetas informativas
        $data['cards'] = $this->model->selectDataInfo($start, $end, $categorias, $productos, $marcas, $clientes) 
                            ? $this->model->selectDataInfo($start, $end, $categorias, $productos, $marcas, $clientes)
                            : array();

        // Modo debug para ver datos de las tarjetas
        if(isset($_GET['debug'])){
            echo 'PARAM3';
            dep($data['cards']); die();
        }
        
        // Carga la vista del mapa con todos los datos
        $this->views->getView($this,"mapa",$data);
    }

    public function getByCategorias(){
        // Obtiene productos filtrados por grupos
        if(empty($_POST['categorias'])){
            $_POST['categorias'] = array();
        }else{
            $_POST['categorias'] = array_map(function($categoria) { return "'$categoria'"; }, $_POST['categorias']);
        }
        
        // Devuelve los productos en formato JSON
        echo json_encode($this->model->selectCategorias($_POST['categorias']),JSON_UNESCAPED_UNICODE);
    }

    public function getMunicipiosByEstado(){
        // Obtiene municipios filtrados por estados
        if(empty($_POST['estados'])){
            $_POST['estados'] = array();
        }else{
            $_POST['estados'] = array_map(function($estado) { return "'$estado'"; }, $_POST['estados']);
        }
        // Devuelve los municipios en formato JSON
        echo json_encode($this->model->selectMunicipiosEstado($_POST['estados']),JSON_UNESCAPED_UNICODE);
    }

    public function getClientesByEstados(){
        // Obtiene clientes filtrados por estados
        if(empty($_POST['estados'])){
            $_POST['estados'] = array();
        }else{
            $_POST['estados'] = array_map(function($estado) { return "'$estado'"; }, $_POST['estados']);
        }

        // Devuelve los clientes en formato JSON
        echo json_encode($this->model->selectClientesEstado($_POST['estados']),JSON_UNESCAPED_UNICODE);
    }

    public function getClientesByMunicipios(){
        // Obtiene clientes filtrados por municipios
        $_POST['municipios'] = array_map(function($municipio) { return "'$municipio'"; }, $_POST['municipios']);

        // Devuelve los clientes en formato JSON
        echo json_encode($this->model->selectClientesMunicipios($_POST['municipios']),JSON_UNESCAPED_UNICODE);
    }
}
?>