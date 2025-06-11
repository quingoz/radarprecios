<?php 

/**
 * Clase Usuarios - Controlador para el manejo de usuarios en el sistema
 * Extiende de la clase Controllers para heredar funcionalidades base
 */
class Usuarios extends Controllers{
    
    /**
     * Constructor de la clase
     * - Inicializa el padre (Controllers)
     * - Inicia/reanuda la sesión
     * - Verifica si el usuario está logueado, sino redirige al login
     * - Obtiene los permisos para el módulo de usuarios (ID 1)
     */
    public function __construct()
    {
        parent::__construct(); // Llama al constructor del padre
        session_start(); // Inicia la sesión
        
        // Verifica si no hay una sesión de login activa
        if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'/login'); // Redirige al login
        }
        
        getPermisos(1); // Obtiene permisos para el módulo de usuarios (ID 1)
    }

    /**
     * Método para cargar la vista principal de usuarios
     * - Verifica permisos de lectura
     * - Establece metadatos para la página
     * - Carga la vista correspondiente
     */
    public function usuarios()
    {   
        // Verifica si el usuario tiene permiso de lectura
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/home'); // Redirige al home si no tiene permiso
        }
        
        // Configuración de metadatos para la vista
        $data['page_tag'] = "Usuarios"; // Etiqueta de la página
        $data['page_title'] = "USUARIOS "; // Título de la página
        $data['page_name'] = "usuarios"; // Nombre de la página
        $data['page_functions_js'] = "functions_usuarios.js"; // JS específico para esta vista
        
        // Carga la vista 'usuarios' con los datos configurados
        $this->views->getView($this,"usuarios",$data);
    }

    /**
     * Método para crear un nuevo usuario
     * - Procesa datos POST
     * - Limpia y valida los datos recibidos
     * - Inserta el nuevo usuario en la base de datos
     * - Retorna respuesta JSON con el resultado
     */
    public function setUsuario(){
        if($_POST){    
            // Limpieza y validación de datos recibidos
            $descripcion = strClean($_POST['descripcion']); // Descripción del usuario
            $username = strClean($_POST['username']); // Nombre de usuario
            $idEnterprise = intval(strClean($_POST['idEnterprise'])); // ID de empresa (convertido a entero)
            $Dashboard = $_POST['idDashboard']; // Dashboard asociado
            
            // Manejo condicional de campos opcionales
            if(empty($_POST['userToken'])){
                $userToken = ''; // Token vacío si no se proporciona
            }else{
                $userToken = strClean($_POST['userToken']); // Limpia el token si existe
            }
            
            if(empty($_POST['urlWebView'])){
                $urlWebView = ''; // URL vacía si no se proporciona
            }else{
                $urlWebView = strClean($_POST['urlWebView']); // Limpia la URL si existe
            }

            // Generación de contraseña: usa la proporcionada o genera una aleatoria
            $strPassword =  empty($_POST['password']) ? hash("SHA256",passGenerator()) : hash("SHA256",$_POST['password']);
            
            // Inserta el usuario en la base de datos
            $request_user = $this->model->insertUsuario($descripcion, 
                                                    $username,
                                                    $strPassword, 
                                                    $idEnterprise,
                                                    $Dashboard, 
                                                    $userToken,
                                                    $urlWebView);
            
            // Manejo de respuestas según el resultado de la inserción
            if($request_user > 0 )
            {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }else if($request_user == 'exist'){
                $arrResponse = array('status' => false, 'msg' => '¡Atención! el username ya existe para este dashboard!.');        
            }else{
                $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
            }
        
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // Retorna respuesta en formato JSON
        }
        die(); // Termina la ejecución
    }

    /**
     * Método para obtener todos los usuarios
     * - Verifica permisos de lectura
     * - Obtiene lista de usuarios desde el modelo
     * - Formatea los datos para la vista (botones de acción, estado, etc.)
     * - Retorna datos en formato JSON
     */
    public function getUsuarios()
    {   
        // Verifica permisos de lectura
        if($_SESSION['permisosMod']['r']){
            $arrData = $this->model->selectUsuarios(); // Obtiene usuarios desde el modelo

            // Procesa cada usuario para la vista
            for ($i=0; $i < count($arrData); $i++) {
                $btnView = '';
                $btnEdit = '';
                $btnDelete = '';

                // Botón de editar (si tiene permiso)
                if($_SESSION['permisosMod']['u']){
                    $btnEdit = '<button class="btn text-info p-0 me-2 mb-0" onClick="fntEditUsuario(this,'.$arrData[$i]['ID'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
                }

                // Botón de eliminar/activar (si tiene permiso)
                if($_SESSION['permisosMod']['d']){
                    if($arrData[$i]['STATUS'] == 1) // Usuario activo
                    {
                        $btnDelete = '<button class="btn text-danger p-0 mb-0" onClick="fntDelUsuario('.$arrData[$i]['ID'].')" title="Desactivar usuario"><i class="fa-solid fa-ban"></i></button>';
                    }else{ // Usuario inactivo
                        $btnDelete = '<button class="btn text-success p-0 mb-0" onClick="fntDelUsuario('.$arrData[$i]['ID'].')" title="Activar usuario"><i class="fa-regular fa-circle-check"></i></button>';
                    }
                }

                // Formatea el estado para mostrarlo con badges
                if($arrData[$i]['STATUS'] == 1)
                {
                    $arrData[$i]['STATUS'] = '<span class="badge badge-success text-success">Activo</span>';
                }else{
                    $arrData[$i]['STATUS'] = '<span class="badge badge-danger text-danger">Inactivo</span>';
                }

                // Agrupa los botones de acción
                $arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnDelete.'</div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE); // Retorna datos en JSON
        }
        die(); // Termina la ejecución
    }

    /**
     * Método para obtener datos de selección (Dashboard y Enterprise) para un usuario específico
     * @param int $idpersona ID del usuario
     */
    public function getSelect($idpersona)
    {   
        // Obtiene datos del dashboard y empresa para el usuario
        $arrData['Dashboard'] = $this->model->selectDashboardUser($idpersona);
        $arrData['Enterprise'] = $this->model->selectEnterpriseUser();
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE); // Retorna datos en JSON
        die(); // Termina la ejecución
    }

    /**
     * Método para obtener datos de selección (Dashboard y Enterprise) para un nuevo usuario
     */
    public function getSelectNew()
    {   
        // Obtiene listados completos para dashboard y empresa
        $arrData['Dashboard'] = $this->model->selectDashboard();
        $arrData['Enterprise'] = $this->model->selectEnterpriseUser();
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE); // Retorna datos en JSON
        die(); // Termina la ejecución
    }

    /**
     * Método para obtener datos de un usuario específico
     * @param int $idpersona ID del usuario a consultar
     */
    public function getUsuario($idpersona){
        // Verifica permisos de lectura
        if($_SESSION['permisosMod']['r']){
            $idusuario = intval($idpersona); // Convierte a entero el ID
            
            if($idusuario > 0) // Valida que el ID sea válido
            {
                // Obtiene datos del usuario y su dashboard
                $arrData['dataUsuario'] = $this->model->selectUsuario($idusuario);
                $arrData['dataDashboard'] = $this->model->selectDashboard();
                
                if(empty($arrData)) // Si no encontró datos
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{ // Si encontró datos
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // Retorna respuesta
            }
        }
        die(); // Termina la ejecución
    }

    /**
     * Método para cambiar el estado de un usuario (activar/desactivar)
     * - Procesa solicitud POST
     * - Verifica permisos de eliminación
     */
    public function delUsuario()
    {
        if($_POST){
            // Verifica permisos de eliminación
            if($_SESSION['permisosMod']['d']){
                $intIdpersona = intval($_POST['idUsuario']); // ID del usuario
                $requestDelete = $this->model->deleteUsuario($intIdpersona); // Cambia estado en modelo
                
                if($requestDelete > 0) // Si se actualizó correctamente
                {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha actualizado el estado del usuario');
                }else{ // Si hubo error
                    $arrResponse = array('status' => false, 'msg' => 'Error al cambiar el estado del usuario.');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // Retorna respuesta
            }
        }
        die(); // Termina la ejecución
    }

    /**
     * Método para cargar la vista de perfil de usuario
     * - Configura metadatos de la página
     * - Obtiene datos del usuario actual
     * - Carga la vista de perfil
     */
    public function perfil(){
        // Configuración de metadatos
        $data['page_tag'] = "Perfil";
        $data['page_title'] = "Perfil de usuario";
        $data['page_name'] = "perfil";
        $data['page_functions_js'] = "functions_usuarios.js";
        
        // Obtiene datos del usuario actual
        $data['dataUsuario'] = $this->model->selectUsuario($_SESSION['idUser']);
        
        // Carga la vista
        $this->views->getView($this,"perfil",$data);
    }

    /**
     * Método para actualizar datos del usuario (dashboard y contraseña)
     * - Procesa solicitud POST
     * - Valida datos requeridos
     * - Actualiza en la base de datos
     * - Retorna respuesta JSON
     */
    public function putDUser(){
        if($_POST){
            // Valida que el dashboard esté presente
            if(empty($_POST['intDashboard']))
            {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else{
                // Obtiene datos del formulario
                $idUsuario = $_SESSION['idUser']; // ID del usuario en sesión
                $intDashboard = intval($_POST['intDashboard']); // Dashboard seleccionado
                $strPassword = "";
                
                // Si se proporcionó contraseña, la hashea
                if(!empty($_POST['txtPassword'])){
                    $strPassword = hash("SHA256",$_POST['txtPassword']);
                }
                
                // Actualiza los datos en el modelo
                $request_user = $this->model->updateDUser($idUsuario, 
                                                        $intDashboard,
                                                        $strPassword);
                if($request_user) // Si la actualización fue exitosa
                {
                    sessionUser($_SESSION['idUser']); // Actualiza datos de sesión
                    
                    $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                }else{ // Si hubo error
                    $arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // Retorna respuesta
        }
        die(); // Termina la ejecución
    }

    /**
     * Método para actualizar datos completos de un usuario (admin)
     * - Procesa solicitud POST
     * - Actualiza todos los campos del usuario
     * - Retorna respuesta JSON
     */
    public function putUserData(){
        if($_POST){
            // Obtiene todos los datos del formulario
            $idUsuario = intval($_POST['idUsuarioEdit']); // ID del usuario
            $Descripcion = $_POST['descripcionEdit']; // Nueva descripción
            $Username = $_POST['usernameEdit']; // Nuevo nombre de usuario
            $Enterprise = intval($_POST['idEnterpriseEdit']); // Nueva empresa
            $Dashboard = $_POST['idDashboardEdit']; // Nuevo dashboard
            $TokenUser = $_POST['userTokenEdit']; // Nuevo token
            $urlWebView = $_POST['urlWebViewEdit']; // Nueva URL

            $strPassword = "";
            // Si se proporcionó contraseña, la hashea
            if(!empty($_POST['passwordEdit'])){
                $strPassword = hash("SHA256",$_POST['passwordEdit']);
            }
            
            // Actualiza los datos en el modelo
            $request_user = $this->model->updateDUserData($idUsuario, 
                                                        $Descripcion,
                                                        $Username,
                                                        $Enterprise,
                                                        $Dashboard,
                                                        $TokenUser,
                                                        $strPassword,
                                                        $urlWebView);
            if($request_user) // Si la actualización fue exitosa
            {                    
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            }else{ // Si hubo error
                $arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
            }
            
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE); // Retorna respuesta
        }
        die(); // Termina la ejecución
    }
}
?>