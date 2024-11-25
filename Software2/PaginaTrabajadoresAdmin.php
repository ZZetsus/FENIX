<?php

	require 'Metodos.php';
	require 'Conexion.php';

	//Instanciar las clases
	$Conexion = new Conection();
	$Metodos = new Metodos_Pag();
	$Metodos_query = new query();

	//Conexion
	$query = $Conexion->Conect();

	$indice = $_GET['session'];
	$consulta_user = $Metodos_query->Consulta_admin($query, $indice);

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
			
		}
		.banner{
			position: relative;
			width: 100%;
			height: 70vh;
			background: url("admin.jpg");
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
		.gallery{
		    position: relative;
		    width: 300px;
		    height: 200px;
		    transform-style: preserve-3d;
		    animation: animate 30s linear  infinite;
		    animation-play-state: running;
		}

		@keyframes animate {
		    0%{
		        transform: perspective(1000px) rotateY(0deg);
		    }
		    100%{
		        transform: perspective(1000px) rotateY(360deg);
		    }
		}

		.gallery:hover{
		    animation-play-state: paused;
		}

		span{
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    transform-origin: center;
		    transform-style: preserve-3d;
		    transform: rotateY(calc(var(--i) * 45deg)) translateZ(400px);
		    -webkit-box-reflect: below 0px linear-gradient(transparent,transparent,#0004);
		}

		span img{
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    border-radius: 10px;
		    object-fit: cover;
		    cursor: pointer;
		}
	</style>
	<body style="background-color:#22E9F0">
		<header> 
			<a href="#" onclick="window.location.href = 'PaginaPrincipalAdmin.php?session=<?php echo $indice ?>';">
			<input type='button' name='atrás' class='btn btn-primary' value="ATRÁS" style="background-color:white; color:black; border-radius:10px; width:80px ;font-size:15px ;margin-right: 15px " ></a>
			<a href="#" class="Logo" style = "margin-right: 400px ">FENIX<!--<img src="logo.png" alt="" style="width:45%; height:45%;">--></a>
			<ul>
				<li><a style="color:black;margin-right:510px" >Modificar Trabajadores</a></li>
			</ul>
			<ul style="margin-right:10%">
				<form method="post" action="">
	    			<input href="PaginaBienvenida" type='submit' name='cerrar' class='btn btn-primary' value="CERRAR SESIÓN" style="background-color:white; color:black; border-radius:10px; width:130px ;font-size:15px ;margin-right: 10px " >
				</form>	
			</ul>
		</header>

		<section class="banner"> 
			<br>
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
		<br>
		<br>
		<center>
			<h2 style="color:black; font-family:'Poppins', sans-serif; font-weight:bold; letter-spacing: 2px;font-size:32px">LISTADO DE TRABAJADORES</h2>
			<br>
			<div class="col-md-6">
				<?php
					$Metodos->Listado_trabajadores($query, "", $indice, "Admin", "session=". $indice, "");
					//if (isset($_POST['btn_buscar'])){
					//	$Metodos->Listado_trabajadores($query, "", $indice, "Admin", "session=". $indice, "WHERE //nombre_presidiario = " . $_POST['text_nombre']);
					//}
				?>
			</div>

			<br><br><br><br><br><br><br><br>
			<h2 style="color:black; font-family:'Poppins', sans-serif; font-weight:bold; letter-spacing: 2px;font-size:37px;">OPCIONES ADMIN:</h2><br>
			<a class="nav-link" href="#ATRABAJADOR"><input type="button" value="AÑADIR TRABAJADOR"style="background-color:white; color:black; border-radius:10px; width:220px;height:40px;"></a>	
			<br><br>	
			<div id="ATRABAJADOR" class="modal">
				<div class="modal-content">
					<a href="#" class="close3">&times;</a>
					<br><br>
				  	<h4>AÑADIR TRABAJADOR</h4>
				  	<form method="post" action="" enctype="multipart/form-data">
						<input type="text" id="Presidiario" name="Nombre_Presidiario" placeholder="Nombre Completo" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="text" id="Presidiario" name="Edad_Presidiario" placeholder="Edad " required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="text" id="Presidiario" name="TipoDoc_Presidiario" placeholder="Tipo de documento" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="text" id="Presidiario" name="NumDoc_Presidiario" placeholder="Numero documento" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>	
						<input type="text" id="Presidiario" name="Educacion_Presidiario" placeholder="Nivel Educativo" required style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type="file" name="foto_presidiario"  required style=" border-radius:10px; width: 300px;padding: 5px">
						<br><br>
						<style>
							.select-scroll {
							  height: 25px; /* Ajusta la altura deseada */
							  overflow-y: auto;
							}
						</style>
						<?php
							$sql = "SELECT id_habilidades,nombre_habilidad, estado_habilidad FROM habilidades";
							for ($i=0; $i < 2; $i++) { 
								if ($consulta = $query->query($sql)){
									echo "<select name = 'habilidades$i' class = 'select-scroll'>";
									echo "<option value = 'Desactivado' disabled selected>Selecciona habilidad";
									echo "</option>";
									if($i != 0){
										echo "<option value = '0'>Ninguna habilidad</option>";
									}
									while ($fila = mysqli_fetch_assoc($consulta)) {
										if ($fila['estado_habilidad'] == 0){
											echo "<option value='" . $fila['id_habilidades'] . "'>";
											echo $fila['nombre_habilidad'];
											echo "</option>";
										}
									} 
									echo "</select>";
								}else{
									echo "Error: ha ocurrido un error.";
								}
								echo "<br><br>";
							}	
						?>						  
						<input type="submit" value="Añadir" name="añadir_presidiario" style="background-color:white; color:black; border-radius:10px; width:100px">
						<br><br>
						<?php	
							if (isset($_POST['añadir_presidiario'])){

								if (isset($_POST['habilidades0']) and isset($_POST['habilidades1'])){

									if ($_POST['habilidades0'] != $_POST['habilidades1']){
										if (isset($_FILES['foto_presidiario']) && $_FILES['foto_presidiario']['error']=== UPLOAD_ERR_OK) {
											$imagenTmp = $_FILES['foto_presidiario']['tmp_name'];
											$imagenData = file_get_contents($imagenTmp);
											$Metodos->agregar_trabajadores($query, array($_POST['Nombre_Presidiario'], 
											$_POST['Edad_Presidiario'], 
											$_POST['TipoDoc_Presidiario'],
											$_POST['NumDoc_Presidiario'], 
											$_POST['Educacion_Presidiario'], 
											$_POST['habilidades0'], 
											$_POST['habilidades1'],
											addslashes($imagenData)));
			                                echo "<meta http-equiv='refresh' content=2;PaginaTrabajadoresAdmin.php?session=";
			                                echo $indice;
										}else{
											echo "Error: la imagen no pudo ser cargada.";
											
										}
									} else {
										echo "No se puede elegir la misma habilidad.";
									}					
								} else {
									echo "Hay campos sin seleccionar.";
								}									
							}
						?>	
				 	</form>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
		</center>
			<fieldset style="background-color:white; width:100%; height:25%; color:white">	""  </fieldset>	
		<center>
			<h2 id="contacto" style="color:black; font-weight:bold;font-size:50px">FENIX</h2>
			<br>
			<h6 style="color:black; font-weight:bold;">"Construyendo puentes hacia una segunda oportunidad"</h6>
			<h6 style="color:black;font-weight:bold;">Facebook  <img src="facebook.png" alt="" style="width:2.5%; height:2.5%; padding-right: 10px;">  Whatsapp<img src="whatsapp.png" alt="" style="width:3.5%; height:3.5%;"></h6>
			<h6 style="color:black;font-weight:bold;">Instagram  <img src="instagram.png" alt="" style="width:2%; height:2%;"></h6>	
		</center>
	</body>
</html>
<?php

	//Cerrar sesion
	if (isset($_POST['cerrar'])){
		echo "<meta http-equiv='refresh' content=0;PaginaBienvenida.php>";
	}
?>