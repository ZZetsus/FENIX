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
	$consulta_user = $Metodos_query->Consulta_admin($query, $session);

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
			font-size:18px;
		}

		.banner{
			position: relative;
			width: 100%;
			height: 80vh;
			background: url("fondo4.jpg");
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
				<input type='submit' name='atras' class='btn btn-primary' value="ATRÁS" style="background-color:white; color:black; border-radius:10px; width:80px ;font-size:15px" >
				<?php
					if (isset($_POST['atras'])){
						echo "<meta http-equiv='refresh' content=0;PaginaHabilidadesEmpresa.php?session=$session>";
					}
				?>
			</form>
			<a href="#" class="Logo" style = "margin-right: 475px; margin-left:5px ">FENIX<!--<img src="logo.png" alt="" style="width:45%; height:45%;">--></a>
			<ul>
				<li><a style="color:black; margin-right:520px;">TRABAJADORES</a></li>
			</ul>
			<ul style="margin-right:15%">
				<input type='submit' name='Cerrar' class='btn btn-primary' onclick="window.location.href = 'PaginaBienvenida.php'" value="CERRAR SESIÓN" style="background-color:white; color:black; border-radius:10px; width:130px ;font-size:15px" >	
			</ul>
		</header>
	
		<section class="banner">
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
		<br><br>
		<center>
			<h2 style="color:black; font-family:'Poppins', sans-serif; font-weight:bold; letter-spacing: 2px;font-size:35px">LISTADO DE TRABAJADORES</h2><br><br>
			
			<div class="col-md-6">	
				<?php
					$Metodos->Listado_trabajadores($query, $_GET['hb'], $session, "Empresa", "session=" . $session . "&hb=" . $_GET['hb'], "");		
				?>	
			</div>

			<br><br>
			<br><br><br><br><br><br>		
			<br><br><br><br><br><br>		
			<br><br><br><br><br><br>
			<form method="post" action="">
				<input type='submit' name='Pprincipal' class='btn btn-primary' value="Página Principal" style="background-color:white; color:black; border-radius:10px; width:150px ;font-size:15px; height:50px; " >
				<?php
					if (isset($_POST['Pprincipal'])){
						echo "<meta http-equiv='refresh' content=0;PaginaPrincipalEmpresa.php?session=$session>";
					}
				?>
			</form>
			</center>
			<br><br><br>
			<fieldset style="background-color:white; color:white; width:100%; height:10px">
			
			</fieldset>
			<br>
		<center>
			<h1 id="contacto" style="color:black; font-weight:bold;">CONTACTANOS</h1><br>
			<h6 style="color:black; font-weight:bold;">"Construyendo puentes hacia una segunda oportunidad"</h6>
			<h6 style="color:black;font-weight:bold;">Facebook  <img src="facebook.png" alt="" style="width:2.5%; height:2.5%; padding-right: 10px;">  Whatsapp<img src="whatsapp.png" alt="" style="width:3.5%; height:3.5%;"></h6>
			<h6 style="color:black;font-weight:bold;">Instagram  <img src="instagram.png" alt="" style="width:2%; height:2%;"></h6>
		</center>
	</body>
</html>