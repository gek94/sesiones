<?php 
	/**
	* Clase para el controlador usuario, hereda de libs/Controller como todas los controllers
	*/
	class User extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function profile()
		{
			//si la sesion existe te direcciona al profile
			if (Session::exist()) {
				// obtenemos informacion de userModel
				// esto es clave para el paso de datos de la capa lógica a la de presentación.
				$this->view->userData = $this->model->getUser(Session::getValue("U_ID"))[0];
				$this->view->render($this,'profile');
			}else{
				header('Location: '.URL);
			}

		}

		public function update()
		{
			if($_POST["id"]){
				$data['name'] = $_POST['name'];
				$data['username'] = $_POST['username'];
				$data['email'] = $_POST['email'];
				$data['password'] = Hash::create($_POST['password']);
				echo $this->model->update($_POST["id"],$data);
			}else{
				echo "Error en la solicitud";
			}
			
		}

		public function delete()
		{
			echo $this->model->delete($_POST["id"]);
		}

		public function signUp()
		{
			//name -- username -- email -- password
			if (isset($_POST["name"]) && isset($_POST["username"]) && 
				isset($_POST["email"]) && isset($_POST["password"])) 
			{
				
				$data['name'] = $_POST['name'];
				$data['username'] = $_POST['username'];
				$data['email'] = $_POST['email'];
				$data['password'] = Hash::create($_POST['password']);

				echo $this->model->signUp($data);
			}
		}

		public function signIn()
		{
			if (isset($_POST["username"]) && isset($_POST["password"])) 
			{	
				//mandamos esto a user_model para que nos retorne los valores
				// recordemos que el modelo es el encargado del tratamiento de la base de datos
				$response = $this->model->signIn('*',"username = '".$_POST["username"]."'");
				$response = $response[0];

				//comparamos con el password encriptado
				if($response["password"] == Hash::create($_POST["password"])){
					$this->createSession($response["username"],$response["id"]);
					echo 1;
				}
			}
		}

		function createSession($username,$id)
		{
			Session::setValue('U_NAME',$username);
			Session::setValue('U_ID',$id);
		}

		function destroySession()
		{
			Session::destroy();
			header('location:'.URL);
			// echo "hola";
		}

	}
	
 ?>
