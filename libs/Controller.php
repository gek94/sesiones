<?php 
	/**
	* Todos los controladores heredaran de esta clase
	*/
	class Controller 
	{
		
		function __construct()
		{
			Session::init();
			$this->view = new view();
			$this->loadModel();
		}

		function loadModel(){
			
			// los modelos deben terminar en '_model' para que puedan ser cargados.
			//obtenemos el nombre de la clase y escogemos el modelo de la carpeta models
			$model = get_class($this).'_model';
			$path = 'models/'.$model.'.php';

			//si el modelo existe entonces se le hace un require y se le crea el respectivo modelo
			if(file_exists($path))
			{
				require $path;
				$this->model = new $model();
			}

		}

	}
	
 ?>