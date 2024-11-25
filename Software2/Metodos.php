<?php
		class query{

			function actualizar_user($conexion, $datos, $indice, $tipo){
				if ($tipo == "Empresa"){
					$sql = "UPDATE cuenta_empresa SET contraseña_empresa = '" . $datos[0] . "',
					nit_empresa = '" . $datos[1] . "', nombre_empresa = '" . $datos[2]. "',
					tipo_empresa = '" .$datos[3] . "', nombre_representante = '" . $datos[4] . "',
					direccion_empresa = '" . $datos[5] . "', telefono_empresa = '" . $datos[6] . "',
					correo_empresa = '" .$datos[7]. "' WHERE id_cuenta_empresa = '" . $indice . "';";
					if ($conexion->query($sql)){
						echo "Empresa";
						echo "Datos actualizados.";
						echo "<meta http-equiv='refresh' content=2;PaginaAjusteEmpresa.php?session=$indice>";
					}else{
						echo "No se han podido actualizar los datos.";
					}
				}else{
					$sql = "UPDATE cuenta_admin SET usuario_admin = '$datos[0]', 
					contraseña_admin = '$datos[1]' WHERE id_cuenta_admin = '$indice';";
					if ($conexion->query($sql)){
						echo "Datos actualizados.";
						echo "<meta http-equiv='refresh' content=2;PaginaAjusteAdmin.php?session=$indice>";
					}else{
						echo "No se han podido actualizar los datos.";
					}
				}
				echo "";	

			}

			function consulta_empresa($conexion, $session) {

				$sql = "SELECT id_cuenta_empresa, usuario_empresa, contraseña_empresa, nombre_empresa, nit_empresa, tipo_empresa, nombre_representante, correo_empresa, telefono_empresa, direccion_empresa FROM cuenta_empresa WHERE id_cuenta_empresa = '" . $session . "';";
				  //Consulta
	            $col = mysqli_fetch_array($conexion->query($sql));
    			return $col;
			}


			function consulta_admin($conexion, $session) {

				 $sql = "SELECT id_cuenta_admin, usuario_admin, contraseña_admin FROM cuenta_admin WHERE id_cuenta_admin = '" . $session . "';";
				  //Consulta
	            $col = mysqli_fetch_array($conexion->query($sql));
    			return $col;
			}


			function consulta_presidiario($conexion, $session) {

				$sql = "SELECT * FROM perfil_presidiario WHERE id_perfil_presidiario = $session";
				  //Consulta

	            $col = mysqli_fetch_array($conexion->query($sql));
    			return $col;
			}

			function actualizar_presidiario($conexion, $datos, $img, $session, $pf){
				if ($img != "") {
					$sql = "UPDATE perfil_presidiario SET nombre_presidiario = '$datos[0]' , edad_presidiario =  $datos[1], tipo_documento_presidiario = '$datos[2]', numero_documento_presidiario = $datos[3], educacion_presidiario = '$datos[4]', img_presidiario = '$img' WHERE id_perfil_presidiario = $pf";

				} else {
					$sql = "UPDATE perfil_presidiario SET nombre_presidiario = '$datos[0]' , edad_presidiario =  $datos[1], tipo_documento_presidiario = '$datos[2]', numero_documento_presidiario = $datos[3], educacion_presidiario = '$datos[4]' WHERE id_perfil_presidiario = $pf";
				}

				if ($conexion->query($sql)) {
					echo "Trabajador modificado correctamente.";
					echo "<meta http-equiv='refresh' content=2;PaginaPerfilTrabajadorAdmin.php?session=";
	                echo $session . "&pf=$pf>";
				}
			} 

			function Buscar_habilidad($conexion, $session){
				 $sql = "SELECT * FROM habilidades WHERE nombre_habilidad = '" . $session . "';";
				  //Consulta
	            $col = mysqli_fetch_array($conexion->query($sql));
    			return $col;
			}

			function inhabilitar_habilidad($conexion, $hb, $session){
				$sql = "SELECT estado_habilidad,nombre_habilidad FROM habilidades WHERE id_habilidades = $hb ;";


				//Consulta
				if($col = mysqli_fetch_array($conexion->query($sql))) {
					if ($col['estado_habilidad'] == 0){
						$sql = "UPDATE habilidades SET estado_habilidad = 1 WHERE nombre_habilidad = '" 
						. $col['nombre_habilidad'] . "'";
						if ($conexion->query($sql)) {
							echo "Habilidad inhabilitada correctamente.";
                            echo "<meta http-equiv='refresh' content=2;PaginaHabilidadesAdmin.php?session=";
                            echo $session. ">"; 
						}else{
							echo "Error: no se pudo eliminar la habilidad.";
						}
				 	} else {
				 		echo "Esta habilidad ya ha sido inhabilitada.";
				 	}
				} else {
					echo "Error: no se pudo realizar la consulta.";
				}   
			}

			function inhabilitar_trabajador($conexion, $pf, $session){
				$sql = "SELECT estado_presidiario FROM perfil_presidiario WHERE id_perfil_presidiario = $pf ;";

				//Consulta
				if($col = mysqli_fetch_array($conexion->query($sql))) {
					if ($col['estado_presidiario'] == 0){
						$sql = "UPDATE perfil_presidiario SET estado_presidiario = 1 WHERE id_perfil_presidiario =$pf";
						if ($conexion->query($sql)) {
							echo "Trabajador inhabilitado correctamente.";
                            echo "<meta http-equiv='refresh' content=2;PaginaTrabajadoresAdmin.php?session=";
                            echo $session. ">"; 
						}else{
							echo "Error: no se pudo eliminar el trabajador.";
						}
				 	} else {
				 		echo "Este trabajador ya ha sido inhabilitado.";
				 	}
				} else {
					echo "Error: no se pudo realizar la consulta.";
				}        
			}

			function inhabilitar_empresa($conexion, $session){
				$sql = "SELECT estado_empresa FROM cuenta_empresa WHERE id_cuenta_empresa = $session ;";

				//Consulta
				if($col = mysqli_fetch_array($conexion->query($sql))) {
					if ($col['estado_empresa'] == 0){
						$sql = "UPDATE cuenta_empresa SET estado_empresa = 1 WHERE id_cuenta_empresa =$session";
						if ($conexion->query($sql)) {
							echo "Cuenta inhabilitada correctamente.";
                            echo "<meta http-equiv='refresh' content=2;PaginaBienvenida.php>";
						}else{
							echo "Error: no se pudo eliminar el trabajador.";
						}
				 	} else {
				 		echo "Este trabajador ya ha sido inhabilitado.";
				 	}
				} else {
					echo "Error: no se pudo realizar la consulta.";
				}            
			}		
		}


		class Metodos_Pag{

			function Login($User, $Contra, $conexion){	

				//Instanciar clase
	            $sql = "SELECT id_cuenta_empresa, usuario_empresa, contraseña_empresa, estado_empresa FROM cuenta_empresa WHERE usuario_empresa = '" . $User . "';";

	            //Consulta
    			

    			if ($consulta = $conexion->query($sql)){ 
    				$col = mysqli_fetch_array($consulta);
    				if ($col != null){
    					if ($col['usuario_empresa'] == $User) {
    						if ($col['estado_empresa'] == 0){
    							if ($col['contraseña_empresa'] == $Contra) {  

			    				// Abrir página del login(Usuarios)    						    		
								$url = "PaginaPrincipalEmpresa.php?session=".urlencode($col['id_cuenta_empresa']);
								echo "<meta http-equiv='refresh' content=0;". $url . ">";		 
				    			}else{
			    					echo "Usuario o contraseña incorrecta.";
			    				}
    						} else {
    							echo "Usuario o contraseña incorrecta.";
    						}	
    					}   					
		    		}else{ 
		    			$tipo = "admin";
		    			$sql = "SELECT id_cuenta_admin, usuario_admin, contraseña_admin FROM cuenta_admin WHERE usuario_admin = '". $User . "'";

		            	//Consulta
		            	

		            	if ($consulta = $conexion->query($sql)) {
		            		$col = mysqli_fetch_array($consulta);
		            		if ($col != null){
			            		if ($col['usuario_admin'] == $User) {
				            		if ($col['contraseña_admin'] == $Contra) {

				            			// Abrir página del login(administradores)		    					
				            			$url = "PaginaPrincipalAdmin.php?session=".urlencode($col['id_cuenta_admin']);
										echo "<meta http-equiv='refresh' content=0;". $url . ">";

				    				}else{
				    					echo "Usuario o contraseña incorrecta.";
				    				}
			            		}
		            		}else{
		            			echo "Usuario o contraseña incorrecta.";
		            		}
		            	}else{
		            		echo "Error: no se pudo realizar la consulta.";
		            	}	            				            	
		    		}	
    			}else{
    				echo "Error: no se pudo realizar la consulta.";
    			}
	    				
			}

			function Registrar_User($datos_empresa, $conexion){

				//Instanciar clase
				$Query = new query();

				//Buscar user(clase_empresa)
				$Buscar_user_sql = "SELECT usuario_empresa FROM cuenta_empresa WHERE usuario_empresa = '" . $datos_empresa[0] . 
				"'";

				$consulta = $conexion->query($Buscar_user_sql);
    			

    			if (mysqli_num_rows($consulta) == 0){

    				//Consultar indice(cuenta_empresa)
					$consulta_indice_sql = "SELECT indice_cuenta_empresa FROM indice_tabla";
					$consulta = $conexion->query($consulta_indice_sql);
					$indice_cuenta_empresa = mysqli_fetch_array($consulta);
					$ind = $indice_cuenta_empresa['indice_cuenta_empresa'];

					//Insertar(cuenta_empresa)

					$insertar_datos_sql = "INSERT INTO cuenta_empresa VALUES ($ind,'" . $datos_empresa[0] . "','" . 
						$datos_empresa[1] . "','" . $datos_empresa[2] . "','" . $datos_empresa[3] . "','" . 
						$datos_empresa[4] . "','" . $datos_empresa[5] . "','" . $datos_empresa[6] . "','" .
						$datos_empresa[7] . "','" . $datos_empresa[8] . "','" . 'estado_habilidad=0' . "'         " . ")";
					//echo $insertar_datos_sql;

 
					if ($conexion->query($insertar_datos_sql) === True){
						$insertar_datos_sql = "UPDATE indice_tabla SET indice_cuenta_empresa = $ind+1";
						if ($conexion->query($insertar_datos_sql)){
							echo "<br>Usuario registrado correctamente.";							
						}else{
							echo "nooooo";
						}							
					}else{
						echo "<br>Error: " . $insertar_datos_sql . "<br>" . $conexion->error;
						echo "<br>Error, el usuario no pudo ser registrado.";
					}
    			}else{
    				echo "<br>Ya existe un usuario con estos datos.";
    			}
			}

			function filtro_habilidad($conexion, $nombre_habilidad){
				$sql = "SELECT nombre_habilidad FROM habilidades WHERE nombre_habilidad = '" . $nombre_habilidad . "'";
				$consulta = $conexion->query($sql);
    			$array = mysqli_fetch_array($consulta);
    			return $array;
			} 

			

			function Listado_habilidad($conexion, $add, $link, $modal){
				$aviso = 0;
				$sql = "SELECT * FROM habilidades WHERE estado_habilidad=0";
				if ($consulta = $conexion->query($sql)){		
					if ($consulta->num_rows != 0){
						$count = 0;
						
						echo "<div class='row'>";
						$session = $_GET['session'];
						while ($fila = mysqli_fetch_assoc($consulta)) {

							$while = 0;
                        	
                        		$imagen = imagecreatefromstring($fila['Img_habilidad']);
								if ($imagen != false){
									imagejpeg($imagen, 'Buffer/Habilidades/imagen_card' . $fila['Id_habilidades'] .'.png');
									echo "<div class='col-md-4'>";
				    				echo "<a href='" . $link . "?session=" . $session . "&hb=";
				    				echo $fila['Id_habilidades'] . $modal . "' style='text-decoration: none';>"; 
				                    echo "<div class='card bg-light text-black'>";
				                    echo "<img class='card-img-top' src='Buffer/Habilidades/imagen_card";
				                    echo $fila['Id_habilidades'] . ".png' alt='";
				                    echo $fila['nombre_habilidad'] . "' width='100' height='220'>";
				                    echo "<div class='card-content'>" . $fila['nombre_habilidad'] . "</div>";
				                   	echo "</div>";	
				                   	echo "</a>"; 
				                	echo "</div>";			                	
				                	imagedestroy($imagen);
				                	$count++;
				                	if($count % 3 == 0){
				                		if ($count < $consulta->num_rows){
				                			echo "</div>";
				                			echo "<br><br>";
				                			echo "<div class='row'>";    			
				                		}else{
				                			echo "</div>";
				                			
				                		}	
				                	}
								}					
						}
						if ($aviso == $consulta->num_rows){
							echo "No hay habilidades creadas.";
						}
						if ($while % 3 != 0){
							echo "</div>";
						}
					}else{
						echo "No hay habilidades creadas.";
					}
				}else{
					echo "Error: no se pudo realizar la consulta.";
				}
			}

			function Listado_trabajadores($conexion, $hb, $session, $tipo, $link, $add){

				if ($hb != "") {

					//Filtrado de trabajadores por habilidad
					$sql = "SELECT perfil_presidiario.id_perfil_presidiario, perfil_presidiario.nombre_presidiario, perfil_presidiario.img_presidiario
					FROM perfil_presidiario
					INNER JOIN habilidades_presidiario ON perfil_presidiario.id_perfil_presidiario = habilidades_presidiario.perfil_presidiario_id
					INNER JOIN habilidades ON habilidades_presidiario.habilidades_id = habilidades.id_habilidades WHERE habilidades.id_habilidades = $hb and estado_presidiario=0";
					
				} else {

					//Todos los trabajadores
					$sql = "SELECT id_perfil_presidiario, nombre_presidiario, img_presidiario FROM perfil_presidiario WHERE estado_presidiario=0";	
				}
				
				if ($consulta = $conexion->query($sql)) {	

					if ($consulta->num_rows != 0) {

						$count = 0;
						$aviso = 0;
						echo "<div class='row'>";
						
						while ($fila = mysqli_fetch_assoc($consulta)) {		
							
							$while = 0;
							
								$imagen = imagecreatefromstring($fila['img_presidiario']);
								if ($imagen != false){
									imagejpeg($imagen, 'Buffer/Presidiario/imagen_card' . $fila['id_perfil_presidiario'] .'.png');
									echo "<div class='col-md-4'>";
					    			echo "<a href='PaginaPerfilTrabajador" . $tipo . ".php?" . $link;
					    			echo "&pf=". $fila['id_perfil_presidiario'] . "' style='text-decoration: none'>";
					    			echo "<div class='card bg-light text-black'>";
					    			echo "<img class='card-img-top' src='buffer/Presidiario/imagen_card";
					                echo $fila['id_perfil_presidiario'] . ".png' alt='";
					                echo $fila['nombre_presidiario'] . "' width='100' height='220'>";
					                echo "<div class='card-content'>" . $fila['nombre_presidiario'];
					                echo "</div>";
					                echo "</div>";
					                echo "</a>";
					                echo "</div>";
					                imagedestroy($imagen);
					                $count++;
					                if($count % 3 == 0) {

					                	if ($count < $consulta->num_rows) {

					                		echo "</div>";
					                		echo "<br><br>";
					                		echo "<div class='row'>";    			
					                	} else {
					                		echo "</div>";		
					                	}	
					                }
								}
																				
						}
						if ($while % 3 != 0){
							echo "</div>";
						}
						if ($aviso == $consulta->num_rows){
								echo "No hay trabajadores creados.";
						}
					} else {
						echo "No hay trabajadores creados.";
					}
				}else{
					echo "Error: no se pudo realizar la consulta.";
				}
			}

			function agregar_habilidad($conexion, $nombre_habilidad, $img){
				$sql = "SELECT nombre_habilidad, estado_habilidad FROM habilidades WHERE nombre_habilidad = '$nombre_habilidad'";
				if ($consulta = $conexion->query($sql)) {
					if ($consulta->num_rows == 0 or mysqli_fetch_assoc($consulta)['estado_habilidad'] == 1){
						$sql = "SELECT indice_habilidad_tabla FROM indice_tabla";
						if ($consulta = $conexion->query($sql)){
							$indice_cuenta_empresa = mysqli_fetch_array($consulta);
							$ind = $indice_cuenta_empresa['indice_habilidad_tabla'];

							$sql = "INSERT INTO Habilidades VALUES ($ind+1, '$nombre_habilidad' , '$img', 0)";
							$insertar_datos_sql = "UPDATE indice_tabla SET indice_habilidad_tabla = $ind+1";	
		                	$stmt = mysqli_prepare($conexion, $sql);

		                	if (mysqli_stmt_execute($stmt) and $conexion->query($insertar_datos_sql)){			
		                   	 	echo "Habilidad creada correctamente";
		                	}else{
		                    	echo "Error: ha ocurrido un error.";
		                	}
						}
					} else {
						echo "Ya existe una habilidad con este nombre.";
					}
					
				}else{		
					echo "Error: ha ocurrido un error.";
				}								
			}

			function agregar_trabajadores($query, $datos) {
				$sql = "SELECT numero_documento_presidiario FROM perfil_presidiario 
				WHERE numero_documento_presidiario = $datos[3];";

				if (mysqli_num_rows($query->query($sql)) == 0) {			
					$sql = "SELECT indice_perfil_presidiario, indice_habilidades_presidiario
					FROM indice_tabla";
					

					if ($consulta = mysqli_fetch_array($query->query($sql))) {
						$indice_perfil_presidiario = $consulta['indice_perfil_presidiario'];
						$indice_habilidades_presidiario = $consulta['indice_habilidades_presidiario'];
						$sql = "INSERT INTO perfil_presidiario			
						VALUES ($indice_perfil_presidiario, '$datos[0]', '$datos[1]', 
					 	'$datos[2]', '$datos[3]', '$datos[4]', '$datos[7]', 0)";	

						if ($consulta = $query->query($sql)) {
							$sql = "INSERT INTO habilidades_presidiario 
							VALUES ($indice_habilidades_presidiario+1, 
							$indice_perfil_presidiario,$datos[5])";

							if($consulta = $query->query($sql)) {

								if($datos[6] != 0) {
									$sql = "INSERT INTO habilidades_presidiario 
									VALUES ($indice_habilidades_presidiario+2, 
										$indice_perfil_presidiario, '$datos[6]')";
									
									if($query->query($sql)) {
										$sql = "UPDATE indice_tabla 
										SET indice_perfil_presidiario = $indice_perfil_presidiario+1,
										indice_habilidades_presidiario = $indice_habilidades_presidiario+2";
									}									
								} else {

									$sql = "UPDATE indice_tabla 
									SET indice_perfil_presidiario = $indice_perfil_presidiario+1,
									indice_habilidades_presidiario = $indice_habilidades_presidiario+1";
									
								}

								if ($query->query($sql)) {
									echo "Trabajador creado correctamente.";
								}else{
									echo "Error: ha ocurrido un error.";
								}

							}else{
								echo "Error: ha ocurrido un error.";
							}	
						}else{
							echo "Error: ha ocurrido un error.";
						}		
					}else{
						echo "Error: ha ocurrido un error.";
					}
				}else{
					echo "Ya existe un trabajador con este numero de identificación.";	
				}
			}

			function agendar_citas($conexion, $cuenta_empresa, $perfil_presidiario, $fecha, $hora, $hb){
				
				$sql = "SELECT indice_agendar_cita, indice_presidiario_agendado FROM indice_tabla";
				if ($consulta = mysqli_fetch_array($conexion->query($sql))) {

					$indice_agendar_cita = $consulta['indice_agendar_cita'];
					$indice_presidiario_agendado = $consulta['indice_presidiario_agendado'];
					$sql = "SELECT id_habilidades_presidiario FROM habilidades_presidiario WHERE perfil_presidiario_id = $perfil_presidiario and habilidades_id = $hb";
					if ($consulta = mysqli_fetch_array($conexion->query($sql))) {

						$id_habilidades_presidiario = $consulta['id_habilidades_presidiario'];
						$sql = "SELECT perfil_presidiario_id FROM presidiario_agendado WHERE perfil_presidiario_id = $perfil_presidiario and habilidades_presidiario_id = $id_habilidades_presidiario";
						if (mysqli_num_rows($conexion->query($sql)) == 0) {

							$sql = "INSERT INTO agendar_citas VALUES ($indice_agendar_cita+1,
							$perfil_presidiario, $cuenta_empresa, '$fecha', '$hora')";
							if ($conexion->query($sql)) {

								$sql = "INSERT INTO presidiario_agendado VALUES ($indice_presidiario_agendado+1, $perfil_presidiario, $id_habilidades_presidiario, $cuenta_empresa)";
								if ($conexion->query($sql)) {

									$sql = "UPDATE indice_tabla SET indice_agendar_cita = $indice_agendar_cita+1 , indice_presidiario_agendado = $indice_presidiario_agendado+1";
									if ($conexion->query($sql)) {

										echo "Se ha agendado la cita con el presidiario.";
									} else {
										echo "Error: ha ocurrido un error.";
									}
								} else {
									echo "Error: ha ocurrido un error.";
								}
							} else {
								echo "Error: ha ocurrido un error.";
							}
						} else {
							echo '<br><br>';
							echo "Ya existe una cita agendada para este presidiario.";
						}	
					} else {
						echo "Error: ha ocurrido un error.";
					}
				} else {
					echo "Error: ha ocurrido un error.";
				}	
			}

			function listado_trabajadores_agendados($conexion, $session){
				$sql = "SELECT perfil_presidiario.* FROM perfil_presidiario INNER JOIN presidiario_agendado ON id_perfil_presidiario = perfil_presidiario_id WHERE cuenta_empresa_id = $session and estado_presidiario=0";
				if ($consulta = $conexion->query($sql)) {	

					if ($consulta->num_rows != 0) {

						

						$count = 0;
						$aviso = 0;
						$while = 0;
						echo "<div class='row'>";
						
						while ($fila = mysqli_fetch_assoc($consulta)) {		
							$while ++;
							
								$imagen = imagecreatefromstring($fila['img_presidiario']);
								if ($imagen != false){
									imagejpeg($imagen, 'Buffer/Presidiario/imagen_card' . $fila['id_perfil_presidiario'] . '.png');
									echo "<div class='col-md-4'>";
					    			echo "<a href='?&session=" . $session . "&pf=" . $fila['id_perfil_presidiario']. "#DATOSPRESIDIARIO'";
					    			echo "style='text-decoration: none'>";
					    			echo "<div class='card bg-light text-black'>";
					    			echo "<img class='card-img-top' src='buffer/Presidiario/imagen_card";
					                echo $fila['id_perfil_presidiario'] . ".png' alt='";
					                echo $fila['nombre_presidiario'] . "' width='100' height='220'>";
					                echo "<div class='card-content'>" . $fila['nombre_presidiario'];
					                echo "</div>";
					                echo "</div>";
					                echo "</a>";
					                echo "</div>";
					                imagedestroy($imagen);
					                $count++;
					                if($count % 3 == 0) {

					                	if ($count < $consulta->num_rows) {

					                		echo "</div>";
					                		echo "<br><br>";
					                		echo "<div class='row'>";    			
					                	} else {
					                		echo "</div>";		
					                	}	
					                }

								}																			
						}
						if ($aviso == $consulta->num_rows){
							echo "<center>No hay habilidades creadas.</center>";
						}
						if ($while % 3 != 0){
							echo "</div>";
						}
					} else {
						echo "No hay trabajadores agendados.";
					}		
						if (isset($_GET['pf'])){
							$sql = "SELECT fecha_agendamiento, hora_agendamiento FROM agendar_citas WHERE id_cuenta_empresa = $session and perfil_presidiario_Id = ". $_GET['pf'];
							if ($consulta = mysqli_fetch_assoc($conexion->query($sql))) {
								echo "<div id='DATOSPRESIDIARIO' class='modal'>";
								echo "<div class='modal-content'>";
								echo "<a href='#' class='close3'>&times;</a>";
								echo "<br>";
								echo "<h4>DATOS DE LA CITA</h4>";
								echo "Fecha de agendamiento: ". $consulta['fecha_agendamiento'];
								echo "<br><br>";
								echo "Hora de agendamiento: ". $consulta['hora_agendamiento'];
								echo "<br><br>";
								echo "<a href = '#'>";		
								echo "<input type='button' value='Aceptar' style='border-radius:10px;width: 100px;padding: 5px'>";
								echo "</a>";
								echo "<br><br>";
								echo "</div>";
								echo "</div>";	
							}
						}
								
				}else{
					echo "Error: no se pudo realizar la consulta.";
				}
			}

		}		   	
?>