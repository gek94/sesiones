<?php 
	
	/**
	* Controlador por defecto en caso no especifique uno en la url
	*/
	class Index extends Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		// si en el navegador hay http://localhost:8081/sesiones/index/index
		/// o tb http://localhost:8081/sesiones/index/
		//entonces se activara esta funcion o metodo como prefieran
		// se puede utilizar los dos ya que esta preconfigurado.
		function index()
		{
			//mandamos al view el nombre de la vista que vamos a utilizar y el controlador que estamos trabajando
			//en este caso usaremos la vista index 
			if (Session::exist()) {
				//redireccionamos al controlador debido, y ya que el usuario ya a iniciado sesion
				// lo redireccionamos al controlador User
				header('Location: '.URL.'User/profile/');
			}else{
				$this->view->render($this,'index');
			}
			

		}

		//destruimos todas las sesiones creadas
		//Se activa cuando entramos al siguiente link
		// http://localhost:8081/sesiones/index/KillItWithFire
		function killItWithfire()
		{
			// echo "hola!";
			Session::destroy();
		}
	}
 ?>