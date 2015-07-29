<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sesiones MVC | user profile</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/stylesheet.css" >
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.0.min.js"></script>
</head>
<body>
	<div class="formWrapper">
		<?php echo Session::getValue('U_NAME'); ?>
		<button id="closeSessionBtn">Cerrar Sesion</button>
		<form name="profileForm" class="fancyForm" action="" style="margin-top:50px">
			<input type="text" name="name" value="<?php echo $this->userData['name']?>" placeholder="Nombre">
			<input type="text" name="username" value="<?php echo $this->userData['username']?>" placeholder="Username">
			<input type="email" name="email" value="<?php echo $this->userData['email']?>" placeholder="Email">
			<input type="password" name="password" value="" placeholder="Password">	
		</form>
		<button class="fancyButton" onclick="updateUser(<?php echo $this->userData['id']?>);">Actualizar</button>
		<button class="fancyButton" onclick="deleteUser(<?php echo $this->userData['id']?>);">Darme de baja</button>
	</div>
 
 <!-- Hola github!!! -->

	<script type="text/javascript">
		$(function(){
			$('#closeSessionBtn').click(function(){
				location.replace("<?php URL; ?>../destroySession");
			});
		});
		function updateUser(id){
			var name = $('form[name=profileForm] input[name=name]')[0].value;
			// var = (comparacion) ? verdadero : falso;
			name = (name != "<?php echo $this->userData['name']?>" && name!='') ? name : "<?php echo $this->userData['name']?>";
			
			var username = $('form[name=profileForm] input[name=username]')[0].value;
			username = (username != "<?php echo $this->userData['username']?>" && username!='') ? username : "<?php echo $this->userData['username']?>";
			
			var email = $('form[name=profileForm] input[name=email]')[0].value;
			email = (email != "<?php echo $this->userData['email']?>" && email!='') ? email : "<?php echo $this->userData['email']?>";
			
			var password = $('form[name=profileForm] input[name=password]')[0].value;
			password = (password != "<?php echo $this->userData['password']?>" && password!='') ? password : "<?php echo $this->userData['password']?>";
			

			$.ajax({
				type: "POST",
				url: "<?php echo URL;?>User/update",
				data: {id:id, name:name, username:username, email:email, password:password},
			}).done(function(response){
				if(response == true){
					// location.reload();
					alert("Actualizacion Exitosa!");						
					// loacation.replace("<?php echo URL; ?>sesiones");					
				}else{
					alert(response);
				}
			});
		}

		function deleteUser(id){
			var confirmar = confirm('Seguro que desea darse de baja? User id:'+ id);
			if(confirmar){
				//alert('que lastima!');
				$.ajax({
					type: "POST",
					url: "<?php echo URL;?>User/delete",
					data: {id:id},
				}).done(function(response){
					if(response == true){
						// location.reload();
						alert("Se ha dado de baja");
						location.replace("<?php URL; ?>../destroySession");
						// loacation.replace("<?php echo URL; ?>sesiones");					
					}else{
						alert(response);
					}
				});
			}
		}
	</script>
</body>
</html>