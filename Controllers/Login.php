<?php 

class Login extends Controllers{
    public function __construct()
    {
        // Inicia la sesión
        session_start();    
        // Inicializa el sistema de vistas
        $this->views = new Views();
        // Carga el modelo asociado
        $this->loadModel();
        // Redirige a home si ya hay una sesión activa
        if($_SESSION){
            echo '<script>window.location = "'.base_url().'/home" </script>';
        }
    }

    public function login()
    {
        // Configuración de datos para la vista de login
        $data['page_tag'] = "Login - App de precios";
        $data['page_title'] = "App de precios";
        $data['page_name'] = "login";
        $data['page_functions_js'] = "functions_login.js";
        // Carga la vista de login
        $this->views->getView($this,"login",$data);
    }

    public function loginUser(){
        //dep($_POST);exit; // Línea de depuración comentada
        if($_POST){
            // Valida que los campos no estén vacíos
            if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos' );
            }else{
                // Limpia y formatea los datos de entrada
                $strUsuario  =  strtolower(strClean($_POST['txtEmail']));
                $strPassword = hash('SHA256', $_POST['txtPassword']);

                // Intenta autenticar al usuario
                $requestUser = $this->model->loginUser($strUsuario, $strPassword);
                
                // Verifica si el usuario existe
                if(empty($requestUser)){
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto.' ); 
                }else{
                    $arrData = $requestUser;
                    // Verifica si el usuario está activo
                    if($arrData['STATUS'] == 1){
                        // Configura la sesión del usuario
                        $_SESSION['idUser'] = $arrData['ID'];
                        $_SESSION['login'] = true;
                        
                        // Obtiene datos adicionales de sesión
                        $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                        $arrResponse = array('status' => true, 'msg' => 'ok');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
                    }
                }
            }
            // Devuelve la respuesta en formato JSON
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>