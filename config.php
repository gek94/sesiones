<?php 
	define("URL", "http://localhost:8081/sesiones/");
	define("libs","libs/");	

	define("DB_HOST" , "localhost");
	define("DB_USER" , "root");
	define("DB_PASS" , "toor");
	define("DB_NAME" , "sesiones");
	// Variables globales para el manejo de encriptacion de variables
	// Algoritmo que se utilizara para la encriptacion guardada en la variable "ALGO"
	define("ALGO","sha512");
	// Key para el algoritmo de encriptacion.
	define("HASH_KEY","gek94");
 ?>