<?php
	include('../config.php');
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	include(GL_DIR_FS_APP.'funciones/funciones_admision.php');
	#echo 'hola';
	$cn_email = conectar();
	$cn_email_zet = conectar();
	$codigo = base64_decode(base64_decode($_GET['clave']));
	$tipo = substr($codigo,0,1);
	$proceso = substr($codigo,1,4);
	$postulante = substr($codigo,5,7);
	#echo '<br>';
	#echo $codigo;
	#exit;
	#$z = enviar_email_examen_usuario($proceso, $postulante, $tipo);
	$cn_email = conectar();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
		
	$asunto = "UNAJMA - EXAMEN VIRTUAL 2020";	
		
	$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','1','2','3','4','5','1900-01-01','1','2','3','4','5',0,0,'1','2','3','4','5','6','7',0,0,0,0,0,'1','2','3','4','5',0,0,'','1','2','3','4','5','6','7','K')";
	$rs = mysqli_query($cn_email, $vsql);	
	$rsjk = mysqli_fetch_row($rs);	
	
	#echo $vsql;
	#exit;
	$nombre = $rsjk[1];
	$escuela = $rsjk[2];
	$numerodocumento = $rsjk[3];
	$clave = $rsjk[4];
	$email = $rsjk[5];
	$celular = $rsjk[6]; 
	#$email = 'juliozet@hotmail.com';
	
	#echo $nombre;
	#echo '<br>';
	#echo $escuela;
	#echo '<br>';
	#echo $numerodocumento;
	#echo '<br>';
	#echo $clave;
	#echo '<br>';
	#echo $email;
	#echo '<br>';
	#echo $celular;
	#echo '<br>';
			
	$cuerpo = '
		<html>
		<head>
			  <title>EXAMEN DE ADMISION</title>
		</head>
		<body>
			  <table>
				  <tr>
					<td align="center">
						<strong>
						UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS
						</strong>
						<br>
					</td>
				</tr>
			  	<tr>
					<td>
						Estimado(a) postulante: <strong>' .$nombre .'</strong>, 
						<br>DNI:<strong> ' .$numerodocumento . '</strong>, <br>
						correo electr&oacute;nico:<strong> '.$email.'</strong>:
						</strong> <br>
						<strong>SE RECOMIENDA USAR SU COMPUTADORA PARA LAS SIGUIENTES INDICACIONES.</strong>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li> 
							<strong>1).</strong> Descargue la <strong>declaración jurada COVID</strong> en formato word (<a href="https://drive.google.com/file/d/1ZkkYBYngzUedckZmAEaf5sMsUSjKJ_d2/view?usp=sharing">CLICK AQUÍ PARA DESCARGAR ARCHIVO</a>).<br> 
							Una vez descargado el archivo, <string>IMPRIMALO</string>; y luego rellene los datos requeridos con lapicero azúl.<br>
							No se olvide de <strong>firmar</strong> el documento, así también debe ir la firma de su apoderado.<br> 
							<strong>ESTE REQUISITO ES IMPORTANTE Y POR LO TANTO NO PUEDE QUEDAR EXCLUIDO</strong>
							</li>
							<li>
							<strong>2).</strong> Asegurese de contar con su <strong>CONSTANCIA de quinto de secudaria</strong> (el cual es emitido por el director de tu colegio, mencionando de que te encuentras cursando el 5to de secundaria). En el caso de que no tenga, puede regularizarlo más adelante, por lo que <strong>este requisito puede ser opcional</strong>.
							</li>
							<li>
							<strong>3).</strong> Antes de proceder con esta indicación, debe tener impreso y llenado los documentos en físico de la primera y segunda indicación ( Declaración Jurada COVID y Constancia de Quinto de Secundaria Respectivamente).<br>
							<strong>Escanee</strong> los documentos de la primera y segunda indicación como un solo <strong>archivo en formato PDF</strong>.
							<br>
							Debe obtener <strong>un solo</strong> archivo PDF(*el documento pdf*).
							<br>
							<a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
							<br>
							<a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
							</li>
							<li>
							<strong>4).</strong> Debe tener las siguientes fotografías:<br>
							<strike>Una fotografía de su <strong>rostro actual</strong> tipo carnet de identificación;</strike><br> 
							Una fotografía de <strong>su firma<strong> (firma del <strong>postulante</strong>) en una hoja de fondo blanco;<br> 
							Una fotografía de <strong>la firma</strong> del <strong>apoderado</strong> en una hoja de fondo blanco.<br>
							Porfavor recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo Whatsaap para realizar el recorte (<a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">Click Auí video para realizar recorte con paint</a>.)
							</li>
							<li>
							<strong>5).</strong> Debe mirar obligatoriamente el siguiente <strong>video instructivo</strong> de la universidad para no tener dificultades en su <strong>inscripción</strong> (<a href="https://www.youtube.com/watch?v=K0iNbXUjynI&ab_channel=Lenynflores">Click Aquí Video Inscripción Primera Selección</a>)
							</li>
							<li>
							<strong>6).</strong> <br>
							<strong>******************************IMPORTANTE**************************************************</strong>
							<br>
							INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN UNAJMA PRIMERA SELECCIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO),Y SU DOCUMENTO PDF (declaración jurada COVID y constancia de quinto de secundaria).
							<br>
							USUARIO:<strong>'.$numerodocumento.'</strong><br>
							CONTRASEÑA:<strong>'.$clave.'</strong>
							<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
							CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA PRIMERA SELECCIÓN
							</a> <-- 
							<br>
							<strong>******************************************************************************************</strong>
							</li>
							<li>
							<strong>7).</strong> Después de culminar todas las indicaciones hasta terminar de realizar su inscripción, debe contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores. Está constancia de inscripción es prueba de que usted terminó de realizar su inscripción satisfactoriamente. Por lo que deberá esperar pendiente a su correo electrónico, las indicaciones para el día del examen de la UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS. <br>
							Así mismo, también puede unirse al grupo de Whatsapp para conocer a sus futuros compañeros, resolver dudas, o para estar al tanto de las indicaciones que la oficina de admisión de la universidad puede estar ofreciendoles. <a href="https://chat.whatsapp.com/Gp415Jn8aqkB91r9VQEwXC">CLICK AQUÍ Grupo Whatsapp Primera Selección</a>
							</li>
						</ul>
					</td>
				</tr>			
			</table>
			<br>				
			<table>
				<tr>
				  <td>
						Cualquier consulta, comunicarse con nosotros a los n&uacute;mero: 
						<strong> 991828881, 928145892, 916331094, 985951660 </strong>						
				  </td>
				</tr>
				<tr>
				  <td>
						<br>
						Atentamente					
				  </td>
				</tr>
				<tr>
				  <td>
						<br>
						<strong>Oficina Central de Admisi&oacute;n</strong>
				  </td>
				</tr>
			</table>
			</body>
			</html>
			';
	
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		#echo $cuerpo;
		#exit;
		#echo $cuerpo;
		#echo '<br>';
		mail($email, $asunto, $cuerpo, $cabeceras);
		#echo 'hola';
		#exit;
		mysqli_close($cn_email);
		
		$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','1','2','3','4','5','1900-01-01','1','2','3','4','5',0,0,'1','2','3','4','5','6','7',0,0,0,0,0,'1','2','3','4','5',0,0,'','1','2','3','4','5','6','7','U')";
		$rs_zet = mysqli_query($cn_email_zet, $vsql);	
		
		echo 'Envio Correcto';
	
	#if ($z=='1')
	#	{
	#		echo json_encode(array('error'=>0,'mensaje'=>'Se envi&oacute; la informaci&oacute;n al email del postulante'));
	#	}
	#else
	#	{
	#		echo json_encode(array('error'=>1,'mensaje'=>'Se produjo un error...'));
	#	}
?>