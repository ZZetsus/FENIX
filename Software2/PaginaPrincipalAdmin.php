<?php 
		require 'Metodos.php';
		require 'Conexion.php';

		//Instanciar las clases
		$Conexion = new Conection();
		$Metodos = new Metodos_Pag();
		$Metodos_query = new query();

		//Conexión
		$consulta = $Conexion->Conect();

		//Obtener datos mandados por la página
		$indice = $_GET['session'];
		$consulta_user = $Metodos_query->consulta_admin($consulta, $indice);

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
			font-size:18px
		}

		.banner{
			position: relative;
			width: 100%;
			height: 70vh;
			background: url("fondo2.jpg");
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
	<body style="background-color:#1EE6ED">
		<header>
			<a href="#" onclick="window.location.href = 'PaginaBienvenida.php'">
				<input type='button' name='CERRAR' class='btn btn-primary' value="CERRAR SESIÓN" style="background-color:white; color:black; border-radius:10px; width:130px ;font-size:15px ;margin-right: 10px " >
			</a>
			<a href="#" class="Logo" style = "margin-right: 355px ">FENIX<!--<img src="logo.png" alt="" style="width:45%; height:45%;">-->	
			</a>
			<ul>
				<li class="nav-item">
					<a class="nav-link" href="PaginaHabilidadesAdmin.php<?php echo "?session=" . $indice ?>">Habilidades</a>
				</li>
				<li class="nav-item">					
					<a class="nav-link" style=" margin-right: 620px" href="PaginaTrabajadoresAdmin.php<?php echo "?session=" . $indice ?>">Trabajadores</a>
				</li>
			</ul>
			<ul style="margin-right:8%">
				<form method="post" action="">
		     		<input type='submit' name='ajustes' class='btn btn-primary' value="AJUSTES" style="background-color:white; color:black; border-radius:10px; width:80px ;font-size:15px ; margin-right: 10px " >
				</form>	
			</ul>
		</header>
		<center>
			<section class="banner">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<h2 style="color:black; font-size:45px; font-family:'Poppins', sans-serif; letter-spacing:2px">BIENVENIDO</h2>
				<?php
					echo "<h4 style='color:black; font-size:40px; font-family:'Poppins', sans-serif; letter-spacing:2px'>". $consulta_user['usuario_admin'] ."</h4>";	
				?>	
			</section>
			<script type="text/javascript">
				window.addEventListener("scroll", function(){
				var header = document.querySelector("header");
								header.classList.toggle("sticky", window.scrollY > 0)
				})
			</script>								
			
			<br><br><br><br><br><br><br>	
			<br><br><br><br><br><br><br>	
			<br><br><br><br><br><br><br>	
			<br><br><br><br><br><br><br>

			<fieldset style="background-color:white; color:blue; width:100%; height:10px"></fieldset>	
			<h1 id="contacto" style="color:black; font-weight:bold;">FENIX</h1><br>
			<h6 style="color:black; font-weight:bold;">"Construyendo puentes hacia una segunda oportunidad"</h6>
			<h6 style="color:black;font-weight:bold;">Facebook  <img src="facebook.png" alt="" style="width:2.5%; height:2.5%; padding-right: 10px;">  Whatsapp<img src="whatsapp.png" alt="" style="width:3.5%; height:3.5%;"></h6>
			<h6 style="color:black;font-weight:bold;">Instagram  <img src="instagram.png" alt="" style="width:2%; height:2%;"></h6>
		</center>
	</body>
</html>

<?php 

	//<input type="submit" value="Ajuste" name="ajustes">

	$indice_buff = $indice;

	//Botón ajustes	  
	if (isset($_POST['ajustes'])){
		$url = "PaginaAjusteAdmin.php?session=". $indice;
		echo "<meta http-equiv='refresh' content=0;". $url . ">";	
	}

	?>