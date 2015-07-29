<?php 
	require 'config.php';
	//-->controller/Method/Params
	$url = isset($_GET["url"]) ? $_GET["url"] : "Index/index";
	$url = explode("/", $url);
	// print_r($url)
	if (isset($url[0])) $controller = $url[0];
	if (isset($url[1])){ if($url[1] != '') {$method = $url[1];}}
	if (isset($url[2])){ if($url[2] != '') {$params = $url[2];}}
	// echo URL;

	// Probamos las variables de sesion
	// require libs.'Session.php';

	// Session::init();
	// echo Session::getValue("USER");
    // Session::setValue("USER","Pepito perez");
    // Session::setValue("USER2","Pepita perez");
	// print_r($_SESSION);
	// Session::unsetValue("USER2")
	// Session::destroy();

	//sp_autoload_register -----> esto sirve para precargar 
	//todas las clases de nuestra libreria automaticamente
	spl_autoload_register(function($class){
		if(file_exists(libs.$class.".php"))
		{
			require libs.$class.".php";
		}
	});

	$path = './controllers/'.$controller.'.php';
	if(file_exists($path))
	{
		require $path;
		$controller = new $controller();

		if(isset($method))
		{
			if(method_exists($controller, $method))
			{
				if(isset($params))
				{
					$controller->{$method}($params);
				}else{
					$controller->{$method}();
				}
			}else{
				echo "Error: El metodo solicitado no existe";
			}
		}else{
			$controller->index();
		}
	}else{
		echo "Error: El controlador solicitado no existe";
	}

 ?>