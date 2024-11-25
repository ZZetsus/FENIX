<?php

	require 'Metodos.php';
	require 'Conexion.php';

	//Instanciar las clases
	$Conexion = new Conection();
	$Metodos = new Metodos_Pag();
	$Metodos_query = new query();

	//Conexion
	$query = $Conexion->Conect();

	$session = $_GET['session'];
	$perfil_id = $_GET['pf'];

	//Consultar usuario
	//$consulta_user = $Metodos_query->Consulta_admin($query, $session);

	//Consultar presidiario
	$consulta_presidiario = $Metodos_query->consulta_presidiario($query, $perfil_id);

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
			background: white;
		}
			
		header .Logo{
			
			position: relative;
			font-weight: 700;
			color: black;
			text-decoration: none;
			font-size: 3.5em;
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
			color: #fff;
			letter-spacing: 2px;
			font-weight: 500px;
			transition: 0.5s;
			font-size:16px
		}

		.banner{
			position: relative;
			width: 100%;
			height: 80vh;
			background: url("fondofroi.jpg");
			background-size: cover;
			border-radius: 0% 0% 5% 5%;
		}
		header.sticky .Logo,
		header.sticky ul li a {
			color:#000;
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
			<form method="post" action="">
				<input type='submit' name='atras' class='btn btn-primary' value="ATRÁS" style="background-color:white; color:black; border-radius:10px; width:80px ;font-size:15px ;margin-right: 10px " >
				<?php
					if (isset($_POST['atras'])){
						echo "<meta http-equiv='refresh' content=0;PaginaTrabajadoresAdmin.php?session=$session>";
					}
				?>
			</form>
			<a href="#" class="Logo" style = "margin-right: 445px ">FENIX<!--<img src="logo.png" alt="" style="width:45%; height:45%;">--></a>
			<ul>
				<li><a style="color:black; margin-right:565px;" >PERFIL TRABAJADOR</a></li>
			</ul>
			<ul style="margin-right:10%">

		  		<input type='submit' name='Cerrar' class='btn btn-primary' onclick="window.location.href = 'PaginaBienvenida.php'" value="CERRAR SESIÓN" style="background-color:white; color:black; border-radius:10px; width:130px ;font-size:15px" >
			</ul>
		</header>
		<section class="banner">
			<center>
				<br><br><br><br><br><br>
				<h3 style="color: black; font-family:'Poppins', sans-serif; font-weight:bold; letter-spacing: 2px;font-size:35px " ><?php echo $consulta_presidiario['nombre_presidiario'] ?></h3>
				<br>
				<?php
					$imagen = imagecreatefromstring($consulta_presidiario['img_presidiario']);
					if ($imagen != false){
						imagejpeg($imagen, 'Buffer/Presidiario/imagen_card' . $consulta_presidiario['id_perfil_presidiario'] .'.png');
					}							
					echo "<img src='Buffer/Presidiario/imagen_card" . $consulta_presidiario['id_perfil_presidiario']. ".png' alt='Imagen Presidiario' style='width: 350px; height: 350px; border-radius: 50%;'>";
				?>
			</center>
			<br><br>
			<br><br>
			<br><br>		
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
			<h2 style="color: black; font-family:'Poppins', sans-serif; font-weight:bold; letter-spacing: 2px;font-size:40px ">INFORMACIÓN PRESIDIARIO</h2>
			<table style="margin-left:auto;margin-right:26%; width:40%;font-size:100%;">
			<br>
				<tr>
					<h2 style="font-size:25px">Datos Personales</h2><br>
					<td>
						<?php
							echo '<h2 style="font-size:18px">';
							echo "<br>Nombre Completo: ";
							echo "<br>Edad: ";	
							echo "<br>Tipo de Documento: "; 
							echo "<br>Número de documento: "; 
							echo "<br>Educación: ";
							echo '</h2>';
						?>
					</td>

					<td>	
						<?php
							echo '<h2 style="font-size:18px">';
							echo "<br>-" .$consulta_presidiario['nombre_presidiario'];
							echo "<br>-" .$consulta_presidiario['edad_presidiario'];
							echo "<br>-" .$consulta_presidiario['tipo_documento_presidiario'];
							echo "<br>-" .$consulta_presidiario['numero_documento_presidiario'];
							echo "<br>-" .$consulta_presidiario['educacion_presidiario'];
							echo '</h2>';
						?>
						
					</td>
				</tr>
			</table>
			<br><br>
			<br><br>
			<h2 style="color:black; font-family:'Poppins', sans-serif; font-weight:bold; letter-spacing: 2px;font-size:37px">OPCIONES ADMIN:
			</h2>
			<a class="nav-link" href="#ETRABAJADOR"><input type="button" value="EDITAR TRABAJADOR" style="background-color:white; color:black; border-radius:10px; width:200px ;height:45px;font-size:15px ;margin-right:300px; top:30px; position:relative"></a>
			<a class="nav-link" href="#ITRABAJADOR"><input type="button" value="INHABILITAR TRABAJADOR" style="background-color:white; color:black; border-radius:10px; width:200px ;height:45px;font-size:15px;margin-left:250px; position:relative; top:-15px "></a>
			<br><br>
			<div id="ETRABAJADOR" class="modal">
				<div class="modal-content">
					<a href="#" class="close">&times;</a>
					<br>
					<h4>Perfil trabajador</h4>
					<form method="post" action="" enctype="multipart/form-data"> 
						<input type="text" id="Presidiario" value="<?php echo $consulta_presidiario['nombre_presidiario'] ?>" name="nombre_presidiario" placeholder="Nombre Completo" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="text" id="Presidiario" value="<?php echo $consulta_presidiario['edad_presidiario']?>" name="edad_presidiario" placeholder="Edad " required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="text" id="Presidiario" value="<?php echo $consulta_presidiario['tipo_documento_presidiario']?>" name="tipo_documento_presidiario" placeholder="Tipo de documento" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="text" id="Presidiario" value="<?php echo $consulta_presidiario['numero_documento_presidiario']?>" name="numero_documento_presidiario" placeholder="Numero documento" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>	
						<input type="text" id="Presidiario" value="<?php echo $consulta_presidiario['educacion_presidiario']?>" name="educacion_presidiario" placeholder="Nivel Educativo" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="file" id="Presidiario" name="foto_Presidiario" style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>					  
						<input type="submit" name="actualizar_btn" value="Actualizar" style="border-radius:10px;width: 150px;padding: 5px">
						<br><br>
						<?php
							if (isset($_POST['actualizar_btn'])){
								$imagen = "";
								if (isset($_FILES['foto_Presidiario']) && $_FILES['foto_Presidiario']['error'] === UPLOAD_ERR_OK) {
									$imagenTmp = $_FILES['foto_Presidiario']['tmp_name'];
									$imagenData = file_get_contents($imagenTmp); 
									$imagen = addslashes($imagenData);      
								}
								$Metodos_query->actualizar_presidiario($query, array(
									$_POST['nombre_presidiario'], 
									$_POST['edad_presidiario'],
									$_POST['tipo_documento_presidiario'],
									$_POST['numero_documento_presidiario'],
									$_POST['educacion_presidiario']),
									$imagen, $session, $perfil_id);		
							} 
						?>				 	
					</form>
				</div>
			</div>

			<div id="ITRABAJADOR" class="modal">
				<div class="modal-content">
					<a href="#" class="close">&times;</a>
					<br>
					<h4>INHABILITAR TRABAJADOR</h4>
					<form method="post" action="">
						¿Está seguro que quiere inhabilitar el trabajador?
						<br><br>
						<input type="submit" name="inhabilitar_btn" value="¿Sí?" style="border-radius:10px;width: 50px;padding: 5px">
						<a href="#">
							<input type="button" value="¿No?" style="border-radius:10px;width: 50px;padding: 5px">	
						</a>	  
					</form>
					<br>
					<?php
						if (isset($_POST['inhabilitar_btn'])){
							$Metodos_query->inhabilitar_trabajador($query, $perfil_id, $session);
						}
					?>

				</div>
			</div>

			<br><br><br>
			<br><br><br>			
			<fieldset style="background-color:white; width:100%; height:40%; color:white">
				""
			</fieldset>	
			<br><br>
			<h1 id="contacto" style="color:black; font-weight:bold;">FENIX</h1><br>
			<h6 style="color:black; font-weight:bold;">"Construyendo puentes hacia una segunda oportunidad"</h6>
			<h6 style="color:black;font-weight:bold;">Facebook  <img src="facebook.png" alt="" style="width:2.5%; height:2.5%; padding-right: 10px;">  Whatsapp<img src="whatsapp.png" alt="" style="width:3.5%; height:3.5%;"></h6>
			<h6 style="color:black;font-weight:bold;">Instagram  <img src="instagram.png" alt="" style="width:2%; height:2%;"></h6>
		
		</center>
	</body>
</html>