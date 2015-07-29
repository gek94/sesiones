<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sesiones MVC</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/stylesheet.css" >
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.0.min.js"></script>
</head>
<body>
	<!-- login -->
	<div id = "formWrapper">
	
		<div class = "formWrapper">
			<div class = "formTitle"> Entrar </div>
			<form action="<?php echo URL; ?>User/signIn" name="signIn" method="POST">
				<input type="text" name="username" placeholder="Username" required/>
				<input type="password" name="password" placeholder="Password" required/>
				<input id="signInBtn"  type="submit" name="signInBtn" value="Entrar" required/>
				<div class="smallText">
					<span>¿No estas registrado? <div class="button" id="signUpButton">Registrate aqui</div> </span> 
					<span>¿Olviste tu password? <a href="">Recordar Password</a></span>
				</div>
			</form>
		</div>

		<!-- registro -->
		<div class = "formWrapper hidden">
			<div class = "formTitle"> Registro </div>
			<form action="<?php echo URL; ?>User/signUp" name="signUp" method="POST">
				<input type="text" name="name" placeholder="Nombre" required/>
				<input type="text" name="username" placeholder="Username" required/>
				<input type="password" name="password" placeholder="Password" required/>
				<input type="text" name="email" placeholder="correo-electronico@hotmail.com" required/>
				<input id="signUpBtn" type="submit"  name="signUpBtn" value="Registrar" required/>
				<div class="smallText">
					<span>¿Si estas registrado? <div class="button" id="signInButton">Volver</div> </span> 
				</div>
			</form>
		</div>
	
	</div>
	<script type="text/javascript">
		$(function(){
			$('#signUpButton').click(function(){
				$('form[name=signIn]').parent().hide();
				$('form[name=signUp]').parent().fadeToggle();
			});

			$('#signInButton').click(function(){
				$('form[name=signUp]').parent().hide();
				$('form[name=signIn]').parent().fadeToggle();
			});

			$('#signUpBtn').click(function(e){
				e.preventDefault();
				signUp();
			});

			$('#signInBtn').click(function(e){
				e.preventDefault();
				signIn();
			});
		});

		//Funcion Registrar 
		function signUp(){

			var username = $('form[name=signUp] input[name=username]')[0].value;
			var email = $('form[name=signUp] input[name=email]')[0].value;
			var password = $('form[name=signUp] input[name=password]')[0].value;
			var name = $('form[name=signUp] input[name=name]')[0].value;

			$.ajax({
				type: "POST",
				url: "<?php echo URL;?>User/signUp",
				data: {name:name, username:username, email:email, password:password},
			}).done(function(response){
				if(response == true){
					// location.reload();
					alert("Registro Exitoso...!");		
					$('form[name=signUp]').parent().hide();
					$('form[name=signIn]').parent().fadeToggle();				
					// location.replace("<?php echo URL; ?>sesiones");					
				}else{
					alert(response);
				}
			});

		}

		//Funcion Iniciar Sesion
		function signIn(){

			var username = $('form[name=signIn] input[name=username]')[0].value;
			var password = $('form[name=signIn] input[name=password]')[0].value;

			$.ajax({
				type: "POST",
				url: "<?php echo URL;?>User/signIn",
				data: {username:username, password:password},
			}).done(function(response){
				// alert(response);
				if(response == 1){
					location.reload();
					// location.replace("<?php echo URL; ?>sesiones");					
				}else{
					alert("Usuario o Password Incorrectos");
				}
			});

		}

	</script>	
	
</body>
</html>

