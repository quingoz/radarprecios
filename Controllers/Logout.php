<?php

session_start();
class Logout extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function logout(){
		session_destroy();
		session_unset();
		echo '<script>window.location = "https://adnpanel.com/login" </script>';
		//header('Location: https://adnpanel.com/login');
	}
}


?>