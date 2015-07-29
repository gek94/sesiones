<?php 
	/**
	* Clase vista..!
	* tiene la funcion render que renderiza en pantalla lo que queremos mostrar en la vista.
	*/
	class View 
	{
		function render($controller,$view)
		{
			$controller = get_class($controller);
			// views/User/index.php
			require './views/'.$controller.'/'.$view.'.php';
		}
	}

 ?>