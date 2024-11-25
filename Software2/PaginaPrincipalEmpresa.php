<?php 
	require 'Metodos.php';
	require 'Conexion.php';

	//Instanciar las clases
	$Conexion = new Conection();
	$Metodos = new Metodos_Pag();
	$Metodos_query = new query();

	//Conexión
	$query = $Conexion->Conect();

	//Obtener datos mandados por la página
	$indice = $_GET['session'];
	$consulta_user = $Metodos_query->Consulta_empresa($query, $indice);

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
	<body style="background-color:#1EE6ED">
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
	font-size: 3.2em;
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
	height: 70vh;
	background: url("fondo2.jpg");
	background-size: cover;
	border-radius: 0% 0% 7% 7%;
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
	<header>
	<a href="#" onclick="window.location.href = 'PaginaBienvenida.php'"><input type='button' name='CERRAR' class='btn btn-primary' value="CERRAR SESIÓN" style="background-color:white; color:black; border-radius:10px; width:130px ;font-size:15px ;margin-right: 10px " ></a>
	<a href="#" class="Logo" style = "margin-right: 375px ">FENIX<!--<img src="logo.png" alt="" style="width:45%; height:45%;">--></a>
	<ul style = "margin-right: 240px ">
	<li><a style="color:black;" href="#contacto">Contacto</a></li>
	<li><a href="#" style="color:black; margin-right: 380px" onclick="window.location.href = 'PaginaHabilidadesEmpresa.php?session=<?php echo $indice ?>';">Contratar</a></li>
	</ul>
	<ul style="margin-right:8%">
	<form method="post" action="">
     <input type='submit' name='ajustes' class='btn btn-primary' value="AJUSTES" style="background-color:white; color:black; border-radius:10px; width:85px ;font-size:15px ;margin-right: 20px " >
	</form>	
	</ul>
	</header>

	<section class="banner">
	<br><br><br><br><br>
			<br><br>
			
			<center>
				<h1 style="color:black; font-size:55px; font-family:'Poppins', sans-serif; letter-spacing:2px">BIENVENIDO</h1>
				<?php
					echo "<h3 style='color:black; font-size:35px; font-family:'Poppins',sans-serif; letter-spacing:2px'>". $consulta_user['nombre_empresa'] ."</h3>";	
				?>
			<br><br><br><br><br>
			<a href="#" onclick= "window.location.href = 'PaginaAgendados.php?session=<?php echo $indice ?>'">
			<input type='button' name='CERRAR' class='btn btn-primary' value="Trabajadores agendados" style="background-color:white; color:black; border-radius:10px; width:250px ;font-size:15px ;margin-right: 10px " >
			</a>
			</center>
			
	</section>
	<script type="text/javascript">
	window.addEventListener("scroll", function(){
	var header = document.querySelector("header");
		header.classList.toggle("sticky", window.scrollY > 0)
	})
	</script>
		<br>
	 <br><br>
	  <center>
	  <h1 style="font-family:'Poppins', sans-serif; space-between:2px; font-weight:bold;">NUESTRO TRABAJO</h1><br><br><br><br><br>
		<br><br>
	   <div class="gallery">
        <span style="--i: 1"><img src="carru1.jpg" alt=""></span>
        <span style="--i: 2"><img src="carru2.jpg" alt=""></span>
        <span style="--i: 3"><img src="carru3.jpg" alt=""></span>
        <span style="--i: 4"><img src="carru4.jpg"alt=""></span>
        <span style="--i: 5"><img src="carru5.jpg" alt=""></span>
        <span style="--i: 6"><img src="carru6.jpg" alt=""></span>
        <span style="--i: 7"><img src="carru7.jpg" alt=""></span>
        <span style="--i: 8"><img src="carru8.jpg" alt=""></span>
    </div>
		</center>
		<br><br><br><br><br><br><br><br><br><br>											
		<br><br><br><br><br><br><br><br><br><br>											
			
			<fieldset style="background-color:white; color:white; width:100%; height:10px">
			
			</fieldset>
			<br>
		<center>			
			<h2 id="contacto" style="color:black; font-weight:bold; font-size:40px">CONTACTANOS</h2><br>
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
		$url = "PaginaAjusteEmpresa.php?session=". $indice;
		echo "<meta http-equiv='refresh' content=0;". $url . ">";	
	}
?>