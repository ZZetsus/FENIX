<?php
	require 'Metodos.php';
	require 'Conexion.php';

	//Instanciar clases
	$Conexion = new Conection();
	$Metodos = new Metodos_Pag();
	$Metodos_query = new query();

	//Conexión
	$query = $Conexion->Conect();
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE-edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="Style.css">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
	</head>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
		*
		{
			margin:0;
			padding:0;
			box-sizing:border-box;
			font-family: 'Poppins', sans-serif;
		}
		body{
			min-height: 200vh;
			
		}

		header
		{
			position:fixed;
			top:0;
			left:0px;
			width: 110%;
			display: flex;
			justify-content: space-between;
			align-items: center;
			transition: 0.6s;
			padding: 30px 100px;
			z-index: 100000;
			
			
		}
		header.sticky{
			padding: 15px 20px;
			background:white;
		}
			
		header .Logo{
			
			position: relative;
			font-weight: 700;
			color: black;
			text-decoration: none;
			font-size: 3.3em;
			text-transform: uppercase;
			letter-spacing: 2px;
			transition: 0.6s;
		}

		header ul{
			position: relative;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		header ul li{
			position: relative;
			list-style: none;
			
		}
		header ul li a{
			position: relative;
			margin: 0 10px;
			text-decoration: none;
			color: black;
			letter-spacing: 2px;
			font-weight: 500px;
			transition: 0.5s;
			font-size:18px;
		}

		.banner{
			position: relative;
			width: 100%;
			height: 70vh;
			background: url("fondo1.jpg");
			background-size: cover;
			border-radius: 0% 0% 5% 5%;
		}
		header.sticky .Logo,
		header.sticky ul li a {
			color:black;
		}

		h1 {
		  font-family: 'Poppins', sans-serif;
		  text-align: center;
		  color: black;
		}

		h5{
		  font-family: 'Poppins', sans-serif;
		  text-align: center;
		  color: black;

		}

		@keyframes to-top {
		    0% {
		        transform: translateY(100%);
		        opacity: 0;
		    }
		    100% {
		        transform: translateY(0);
		        opacity: 1;
		    }
		}

		label{
			margin-left: 20%;
			color:#fff;
			
		}
	</style>
	<body style="background-color:#22E9F0">
		<header>
			<a href="#" class="Logo">FENIX<!--<img src="logo.png" alt="" style="width:45%; height:45%;">--></a>
			<ul style="margin-left: 68px ">
				<li><a href="#conocenos">Nosotros</a></li>
				<li><a href="#contacto">Contacto</a></li>
			</ul>
			<ul style="margin-right:8%">
				<a class="nav-link" href="#modal1">
		     	<button type="button" class="btn btn-primary " style="background-color:white; color:black; border-radius:10px; width:90px ;font-size:15px ;margin-right: 15px " >INGRESAR</button></a><br>
				<a class="nav-link" href="#modal">
		     	<button type="button" class="btn btn-primary " style="background-color:white; color:black; border-radius:10px; width:90px ;font-size:15px; margin-right: 20px " >REGISTRO</button></a>
			</ul>
		</header>
		<section class="banner">
			<br>
			<br>
			<br>
			<br>
			<br>		
		</section>

		<script type="text/javascript">
			window.addEventListener("scroll", function(){
			var header = document.querySelector("header");
				header.classList.toggle("sticky", window.scrollY > 0)
			})
		</script>

		<center>
			<br>
			<br>
			<br>
			<br>
			<fieldset class="gray-fieldset2" Style="background-color:white; height: 500px;">
				<h3 id="conocenos" style="color:black; font-weight:bold; letter-spacing:2px; font-family: 'Poppins', sans-serif;">CONOCENOS</h3>
	    		<div class="maincontainer">
      				<div class="thecard">
       					<div class="thefront"><h1>MISIÓN</h1><img src="mision.jpg" alt="" style="width:45%; height:45%;">
       					</div>
        				<div class="theback">
        					<p>Brindamos empleo significativo y apoyo para construir un futuro prometedor.</p>
       					</div>
      				</div>
				</div>
	 			<div class="maincontainer1">
      				<div class="thecard">
						<div class="thefront">
							<h1>VISIÓN</h1>
							<img src="vision.png" alt="" style="width:45%; height:45%;">
							<p></p>
						</div>
        				<div class="theback">
        					<p>Ser la principal plataforma de apoyo y oportunidades laborales para presidiarios en su proceso de reintegración.
        					</p>
        				</div>
      				</div>
   				</div>
			</fieldset>
			<br><br><br><br><br><br>
			<br><br><br>
			<br><br><br>
		 	<h1 id="contacto" style="color:black; font-weight:bold">CONTACTANOS</h1><br>
			<h6 style="color:black; font-weight:bold ">"Construyendo puentes hacia una segunda oportunidad"</h6>
			<h6 style="color:black;font-weight:bold">Facebook  <img src="facebook.png" alt="" style="width:2.5%; height:2.5%; padding-right: 10px;">  Whatsapp<img src="whatsapp.png" alt="" style="width:3.2%; height:3.2%;"></h6>
			<h6 style="color:black;font-weight:bold">Instagram  <img src="instagram.png" alt="" style="width:2%; height:2%;"></h6>
			<div id="modal" class="modal">
				<br>
				<br>
		  		<div class="modal-content">
		   			<a href="#" class="close3">&times;</a>
					<br>
					<br>
		    		<h4>Registro</h4>
		    		<form method="post" action="">
				     	<input type="text" id="Registrarse_register" name="nombre_empresa" placeholder="Nombre Empresa" required style="border-radius:10px;width: 300px;padding: 5px">
				      	<br><br>
				     	<input type="text" id="Registrarse_register" name="nit_empresa" placeholder="NIT" required style="border-radius:10px;width: 300px;padding: 5px">
				      	<br><br>
				      	<input type="text" id="Registrarse_register" name="tipo_empresa" placeholder="Tipo Empresa" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="text" id="Registrarse_register" name="nombre_representante" placeholder="Nombre Representante" required style="border-radius:10px;width: 300px;padding: 5px">
				      	<br><br>
				      	<input type="text" id="Registrarse_register" name="direccion_empresa" placeholder="Dirección Empresa" required style="border-radius:10px;width: 300px;padding: 5px">
				      	<br><br>
				      	<input type="text" id="Registrarse_register" name="correo_empresa" placeholder="Correo Electrónico" required style="border-radius:10px;width: 300px;padding: 5px">
					  	<br><br>
					 	<input type="tel" id="Registrarse_register" name="telefono_empresa" placeholder="Télefono" required style="border-radius:10px;width: 300px;padding: 5px; margin-right:4%">
					  	<br><br>
					  	<input type="text" id="Registrarse_register" name="usuario_empresa" placeholder="Usuario" required style="border-radius:10px;width: 300px;padding: 5px; margin-right:4%">
					 	<br><br>
					  	<input type="password" id="Registrarse_register" name="contraseña_emprepresa" placeholder="Contraseña" required style="border-radius:10px; width: 300px;padding: 5px; margin-right:4%">
					  	<br><br>
				      	<input type="submit" value="Registrarse" name="registrar_login" style="background-color:white; color:black; border-radius:10px; width:100px">
				      	<br><br>	
				      	<?php 
					      	//Botón registrar (dentro de la ventana emergente)
							if (isset($_POST['registrar_login'])){
								$datos_empresa = array ($_POST['usuario_empresa'],
									$_POST['contraseña_emprepresa'],
									$_POST['nit_empresa'],
									$_POST['nombre_empresa'],
									$_POST['tipo_empresa'],
									$_POST['nombre_representante'],
									$_POST['direccion_empresa'],
									$_POST['telefono_empresa'],
									$_POST['correo_empresa']);	
									$Metodos->Registrar_User($datos_empresa, $query);
								}     
						?>
		    		</form>
		 		</div>
			</div>
			<div id="modal1" class="modal">
		  		<div class="modal-content">
		    		<a href="#" class="close3">&times;</a>
		    		<br>
		    		<h4>INICIO DE SESIÓN</h4>
		    		<form method="post" action="">
						<input type="text4" id="usuario" name="usuario_empresa" placeholder="Usuario" required style="border-radius:10px;width: 300px;padding: 5px">
						<br>
						<br>
						<input type="password" id="contraseña" name="contraseña_empresa" placeholder="Contraseña" required style="border-radius:10px;width: 300px;padding: 5px">
						<br>
						<br>
						<input type="submit" value="Enviar" name="ingresar_login" style="background-color:white; color:black; border-radius:10px; width:80px">
						<br>
						<br>
						<?php 	
							//Botón de inicio de sesión(dentro de la ventana emergente)
							if (isset($_POST['ingresar_login'])){
								$User = $_POST['usuario_empresa']."";
								$Contra = $_POST['contraseña_empresa']."";						
								$Metodos->login($User, $Contra, $query);		
							}					
						?>					 	
		    		</form>
		  		</div>
			</div>
		</center>
	</body>
<style>

.maincontainer{
  position: absolute;
  width: 300px;
  height: 300px;
  background: none;
  top: 110%;
  left: 40%;
  transform: translate(-50%, -50%);

}
.maincontainer1{
  position: absolute;
  width: 300px;
  height: 300px;
  background: none;
  top: 110%;
  left: 60%;
  transform: translate(-50%, -50%);

}
.thecard{
  position: relative;
  top: -50px;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  transform-style: preserve-3d;
  transition: all 0.8s ease;
}
.thecard:hover{
  transform: rotateY(180deg);
}
 .thefront{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  background: #22E9F0;
  color: #000;
}

.theback{
  position: absolute;
  top: 0px;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  background: #A4AEAE;
  color: #333;
  text-align: justify-content;
  transform: rotateY(180deg);
}

.thefront h1, .theback h1{
  font-family: 'zilla slab', sans-serif;
  padding: 30px;
  font-weight: bold;
  font-size: 24px;
  text-align: center;
}

.thefront p, .theback p{
  font-family: 'zilla slab', sans-serif;
  padding: 50px;
  font-weight: normal;
  font-size: 15px;
  text-align: center;
}
	</style>
</html>


