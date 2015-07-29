<?php 
	
	/**
	* Clase modelo, de esta clases heredaran todos los modelos
	*/
	class Model
	{
		
		function __construct()
		{
			//Estas variables estan definidas en el config.php como variables globales.
			$this->db = new MySQLiManager(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		}
	}
	
 ?>