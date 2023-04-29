<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Factura</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<!-- <img class="anulada" src="img/anulado.png" alt="Anulada"> -->
	<div id="page_pdf">
		<table id="factura_head">
			<tr>
				<td class="logo_factura">
					<div>
						<img src="img/logo.png" width="200">
					</div>
				</td>
				<td class="info_empresa">
					<div>
						<span class="h2">SISTEMA DE ADMINISTRACIÓN CLÍNICA</span>
						<p>And. Ceres # 127 Col. Popular Anaya 37240 León, Gto.</p>
						<p>Teléfono: +52 477 513 2451</p>
						<p>Email: samuelgr@grclinicadental.com.mx</p>
					</div>
				</td>
				<td class="info_factura"></td>
			</tr>
		</table>

		
		<table style="width: 100%;">
			<tr>
				<td>
					<div>
						<table class="datos_cliente">
							<tr>
								<td><label> <b>FECHA:</b></label>
									<p><?php echo date('l jS \of F Y h:i:s A'); ?></p>
								</td>
						</table>
					</div>
				</td>

			</tr>
		</table>
		<table id="factura_cliente">
			<tr>
				<td class="info_cliente">
					<div class="round">
						<span class="h3">IMFORME DE CITA</span>
						<table class="datos_cliente">
							<tr>
								<td><label> <b>FOLIO:</b></label>
									<p><?php echo $respuesta['folio_cita']; ?></p>
								</td>
								<td><label><b>DIA :</b></label>
									<p><?php echo $respuesta['fechaProgramada_cita']; ?></p>
								</td>
							</tr>
							<tr>
								<td><label><b>PACIENTE : </b></label>
									<p><?php echo $respuesta['nombre_paciente']; ?></p>
								</td>
								<td><label><b>CORREO:</b></label>
									<p><?php echo $respuesta['correo_paciente']; ?></p>
								</td>
							</tr>
							<tr>
								<td><label><b>TELEFONO: </b></label>
									<p><?php echo $respuesta['telefono_paciente']; ?></p>
								</td>
								<td><label><b>DIRECCIÓN:</b></label>
									<p><?php echo $respuesta['domicilio_paciente']; ?></p>
								</td>
							</tr>

							<tr>
								<td><label><b>HORA INICIO: </b></label>
									<p><?php echo $respuesta['horaInicio_cita']; ?></p>
								</td>
								<td><label><b>HORA FIN:</b></label>
									<p><?php echo $respuesta['horaFin_cita']; ?></p>
								</td>
							</tr>
						</table>
					</div>
				</td>

			</tr>
		</table>

		<div>
			<!-- <p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p> -->
			<h4 class="label_gracias">¡Gracias por su preferencia!</h4>
		</div>

	</div>

</body>

</html>