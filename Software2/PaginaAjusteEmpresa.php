<?php
	require 'Metodos.php';
	require 'Conexion.php';

	$Conexion = new Conection();
	$Metodos = new Metodos_Pag();
	$Metodos_query = new query();

	//Conexión
	$query = $Conexion->Conect();

	//Obtener datos mandados por la página
	$indice = $_GET['session'];
	$consulta_user = $Metodos_query->Consulta_Empresa($query, $indice);

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
	<body>
	<header>
	<a href="#" onclick="window.location.href = 'PaginaPrincipalEmpresa.php?session=<?php echo $indice ?>';">
	<input type='button' name='atrás' class='btn btn-primary' value="ATRÁS" style="background-color:white; color:black; border-radius:10px; width:80px ;font-size:15px ;margin-right: 10px " ></a>
	<a href="#" class="Logo" style = "margin-right:480px ">FENIX<!--<img src="logo.png" alt="" style="width:45%; height:45%;">--></a>
	<ul>
	<li><a style="color:black; margin-right:560px;" >AJUSTES</a></li>
	</ul>
	<ul style="margin-right:15%">
  <input type='submit' name='Cerrar' class='btn btn-primary' onclick="window.location.href = 'PaginaBienvenida.php'" value="CERRAR SESIÓN" style="background-color:white; color:black; border-radius:10px; width:130px ;font-size:15px" >
	</ul>
	</header>
	<section class="banner">
	<br><br><br><br><br>
	<br><br><br><br><br>
	<center>
	<h3 style="color: black; font-family:'Poppins', sans-serif; font-weight:bold; letter-spacing: 2px;font-size:45px " >CONFIGURACIÓN CUENTA</h3>
			<?php
			echo "<h4 style='font-size:30px'>". $consulta_user['nombre_empresa'] ."</h4>";	
			?>
			<br>				
	</center>
	</section>	
	
	
	<script type="text/javascript">
	window.addEventListener("scroll", function(){
	var header = document.querySelector("header");
		header.classList.toggle("sticky", window.scrollY > 0)
	})
	</script>
		
		<div id='modal3' class='modal'>
			<div class='modal-content'>
				<a href='#' class='close3'>&times;</a>
				<br><br>
				<center><h4>ACTUALIZACION DE DATOS</h4></center><br>	
				<form method='post' action=''>
					<center>
						<input type='text' id='usuario' name='usuario_empresa' placeholder='Usuario'
						value = "<?php echo $consulta_user['usuario_empresa']?> " disabled style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='password' id='contraseña' name='contraseña_empresa' placeholder='Contraseña' 
						value = '<?php echo $consulta_user['contraseña_empresa']?>'style="border-radius:10px;width: 300px;margin-right: 10px;padding: 5px">
						<br><br>
						<input type='text' id='nombre' name='nombre_empresa' placeholder='Nombre Empresa'
						value = "<?php echo $consulta_user['nombre_empresa']?>" style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='text' id='nit' name='nit_empresa' placeholder='NIT' 
						value = "<?php echo $consulta_user['nit_empresa']?>" style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='text' id='tipo' name='tipo_empresa' placeholder='Tipo Empresa'
						value = "<?php echo $consulta_user['tipo_empresa']?>" style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='text' id='Representante' name='nombre_representante' placeholder='Nombre Representante' 
						value = "<?php echo $consulta_user['nombre_representante']?>" style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='text' id='dir' name='direccion_empresa' placeholder='Dirección Empresa'
						value = "<?php echo $consulta_user['direccion_empresa']?>" style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='text' id='correo' name='correo_empresa' placeholder='Correo Electrónico'
						value = "<?php echo $consulta_user['correo_empresa']?>"style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='text' id='telefono' name='telefono_empresa' placeholder='Teléfono'
						value = "<?php echo $consulta_user['telefono_empresa']?>" style="border-radius:10px;width: 300px;padding: 5px">
						<br><br>
						<input type='submit' value='Actualizar datos' name='actualizar_btn' style="border-radius:10px;width: 150px;">
						<br><br>
						<?php
							if (isset($_POST['actualizar_btn'])) {
								$datos_empresa = array (
									$_POST['contraseña_empresa'],
									$_POST['nit_empresa'],
									$_POST['nombre_empresa'],
									$_POST['tipo_empresa'],
									$_POST['nombre_representante'],
									$_POST['direccion_empresa'],
									$_POST['telefono_empresa'],
									$_POST['correo_empresa']);			
									$Metodos_query->actualizar_user($query, $datos_empresa, $indice, "Empresa");
									echo "<meta http-equiv='refresh' content=2;PaginaAjusteEmpresa.php?session=$indice";					
							} 
						?>				
					</center>
				</form>	
			</div>
		</div>
		
				
		<div id="modal4" class="modal">
			<div class="modal-content">
				<center>
					<a href="#" class="close">&times;</a>
					<br>
					<h4>INHABILITAR TRABAJADOR</h4>
					<form method="post" action="">
						¿Está seguro que quiere inhabilitar su cuenta?
						<br><br>
						<input type="submit" name="inhabilitar_btn" value="¿Sí?" style="border-radius:10px;width: 50px;padding: 5px">
						<a href="#">
							<input type="button" value="¿No?" style="border-radius:10px;width: 50px;padding: 5px">	
						</a>	  
					</form>
					<br>
					<?php
						if (isset($_POST['inhabilitar_btn'])){
							$Metodos_query->inhabilitar_empresa($query, $indice);
						}
					?>
				</center>
			</div>
		</div>
		
		<div class="container">
			<center>
				
				<br><br>
				<form method="post" action="">				
					<a class="nav-link" href="#modal3"><input type="button" name="actualizar_btn" value="ACTUALIZAR DATOS" class='btn btn-primary' style="background-color:white; color:black; border-radius:10px; width:210px ;font-size:20px; "></a>
				</form>				
				<br><br>
				<br><br>
				<a class="nav-link" href="#modal4"><button type="button" class="btn btn-primary"style="background-color:white; color:black; border-radius:10px; width:300px ;font-size:20px ">INHABILITAR CUENTA</button></a>
			</center>
		</div>
		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
	<fieldset style="background-color:#1EE6ED; width:100%; height:40%; color:blue">
				""
	</fieldset>	
		<center>
			<br><br>
			<h1 id="contacto" style="color:black; font-weight:bold;">CONTACTANOS</h1><br>
				<h6 style="color:black; font-weight:bold;">"Construyendo puentes hacia una segunda oportunidad"</h6>
				<h6 style="color:black;font-weight:bold;">Facebook  <img src="facebook.png" alt="" style="width:2.5%; height:2.5%; padding-right: 10px;">  Whatsapp<img src="whatsapp.png" alt="" style="width:3.5%; height:3.5%;"></h6>
			    <h6 style="color:black;font-weight:bold;">Instagram  <img src="instagram.png" alt="" style="width:2%; height:2%;"></h6>
		
		</center>		
		</body>
	</html>
