<?php
require '../model/header.php';
require '../model/conexion.php';

class CitasControlador
{
	public static function ctrMostrarCita()
	{
		if (isset($_GET["id_cita"])) {
			$stmt = Conexion::conectar()->prepare("SELECT T1.* , CONCAT_WS(' ', T2.nombre_paciente , T2.apaterno_paciente , T3.amaterno_medico) AS nombre_paciente,
				CONCAT_WS(' ' , T3.nombre_medico , T3.apaterno_medico, T3.amaterno_medico) AS nombre_medico
				FROM tbl_citas T1 
				INNER JOIN tbl_pacientes T2 ON T1.id_paciente = T2.id_paciente
				INNER JOIN tbl_medicos T3 ON T1.id_medico = T3.id_medico

				WHERE T1.id_cita = :id_cita");
			$stmt->bindParam(":id_cita", $_GET["id_cita"], PDO::PARAM_INT);
			$stmt->execute();
			$response = $stmt->fetch();
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT  T1.* , CONCAT_WS(' ', T2.nombre_paciente , T2.apaterno_paciente , T3.amaterno_medico) AS nombre_paciente,
				CONCAT_WS(' ' , T3.nombre_medico , T3.apaterno_medico, T3.amaterno_medico) AS nombre_medico
				FROM tbl_citas T1 
				INNER JOIN tbl_pacientes T2 ON T1.id_paciente = T2.id_paciente
				INNER JOIN tbl_medicos T3 ON T1.id_medico = T3.id_medico");
			$stmt->execute();
			$response = $stmt->fetchAll();
		}
		echo json_encode($response);
	}

	public static function ctrDatatable()
	{
		$stmt = Conexion::conectar()->prepare("SELECT  T1.* , CONCAT_WS(' ', T2.nombre_paciente , T2.apaterno_paciente , T3.amaterno_medico) AS nombre_paciente,
			CONCAT_WS(' ' , T3.nombre_medico , T3.apaterno_medico, T3.amaterno_medico) AS nombre_medico
			FROM tbl_citas T1 
			INNER JOIN tbl_pacientes T2 ON T1.id_paciente = T2.id_paciente
			INNER JOIN tbl_medicos T3 ON T1.id_medico = T3.id_medico");
		$stmt->execute();
		$response = $stmt->fetchAll();
		$data = [];
		foreach ($response as $key => $value) {

			if($value['estado_cita'] == 1){
			    $status ="<button class='badge badge-warning  badge-xs' onclick='updateStatusCita($value[id_cita])'>Pendiente</button>";
			}else  if($value['estado_cita']== 2){
			    $status ="<button class='badge badge-success  badge-xs' onclick='updateStatusCita($value[id_cita])'>Aplicada</button>";
			}else if($value['estado_cita']==3){
			    $status ="<button class='badge badge-danger  badge-xs' onclick='updateStatusCita($value[id_cita])'>Cancelada</button>";
			}else if($value['estado_cita']==4){
			    $status ="<button class='badge badge-danger  badge-xs' onclick='updateStatusCita($value[id_cita])'>Cancelada</button>";
			}

			array_push($data, [
				"",
				"$value[id_cita]",
				"<a href='#' onclick='imformacionCita($value[id_cita])' class='text-primary'> <i class='mdi mdi-link'></i> $value[asunto_cita]</a>",
				"<a href='#' onclick='imformacionCita($value[id_cita])' class='text-primary'> <i class='mdi mdi-account'></i> $value[nombre_paciente]</a>",
				$status,
				"$value[fechaProgramada_cita]",
				"<a class='badge badge-info badge-sm' href='extenciones/fpdf/generar-pdf.php?folio_cita=$value[id_cita]' target='_blank'><i class='mdi mdi-printer'></i> </a>
				<a class='badge badge-primary badge-sm' href='index.php?ruta=cita&id=$value[id_cita]'><i class='mdi mdi-pencil'></i> </a>
				<button class='badge badge-danger badge-sm' btn-sm' onclick='deleteCitas($value[id_cita])'><i class='mdi mdi-delete'></i> </button>
				<button class='badge badge-warning badge-sm' btn-sm' onclick='enviarMensajeCita($value[id_cita])'><i class='mdi mdi-message-text'></i></button>"
			]);
		}

		echo json_encode(["data" => $data]);
	}
	public static function ctrAgregarCita($datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO tbl_citas (id_paciente, id_medico, fechaProgramada_cita, horaInicio_cita, horaFin_cita, asunto_cita , enfermedad_cita,estado_cita,  medicamentos_cita , nota_cita, pago_cita, sinstomas_cita , estatus_pago) 
		VALUES  (:id_paciente, :id_medico, :fechaProgramada_cita, :horaInicio_cita, :horaFin_cita, :asunto_cita , :enfermedad_cita, :estado_cita,  :medicamentos_cita , :nota_cita, :pago_cita, :sinstomas_cita, :estatus_pago) ;");
		$stmt->bindParam(":id_paciente", $datos->id_paciente, PDO::PARAM_STR);
		$stmt->bindParam(":id_medico", $datos->id_medico, PDO::PARAM_STR);
		$stmt->bindParam(":fechaProgramada_cita", $datos->fechaProgramada_cita, PDO::PARAM_STR);
		$stmt->bindParam(":horaInicio_cita", $datos->horaInicio_cita, PDO::PARAM_STR);
		$stmt->bindParam(":horaFin_cita", $datos->horaFin_cita, PDO::PARAM_STR);
		$stmt->bindParam(":asunto_cita", $datos->asunto_cita, PDO::PARAM_STR);
		$stmt->bindParam(":enfermedad_cita", $datos->enfermedad_cita, PDO::PARAM_STR);
		$stmt->bindParam(":estado_cita", $datos->estado_cita, PDO::PARAM_STR);
		$stmt->bindParam(":medicamentos_cita", $datos->medicamentos_cita, PDO::PARAM_STR);
		$stmt->bindParam(":nota_cita", $datos->nota_cita, PDO::PARAM_STR);
		$stmt->bindParam(":pago_cita", $datos->pago_cita, PDO::PARAM_STR);
		$stmt->bindParam(":sinstomas_cita", $datos->sinstomas_cita, PDO::PARAM_STR);
		$stmt->bindParam(":estatus_pago", $datos->estatus_pago, PDO::PARAM_STR);
		echo json_encode(["response" => $stmt->execute()]);
	}
	public static function ctrActulizarCita($datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE tbl_citas SET id_paciente = :id_paciente, id_medico = :id_medico, fechaProgramada_cita = :fechaProgramada_cita, 
			horaInicio_cita = :horaInicio_cita, horaFin_cita = :horaFin_cita, asunto_cita = :asunto_cita, enfermedad_cita = :enfermedad_cita, estado_cita = :estado_cita,
			medicamentos_cita = :medicamentos_cita, nota_cita = :nota_cita, pago_cita = :pago_cita, sinstomas_cita = :sinstomas_cita, estatus_pago = :estatus_pago
			WHERE  id_cita =:id_cita");
		$stmt->bindParam(":id_cita", $datos->id_cita, PDO::PARAM_INT);
		$stmt->bindParam(":id_paciente", $datos->id_paciente, PDO::PARAM_STR);
		$stmt->bindParam(":id_medico", $datos->id_medico, PDO::PARAM_STR);
		$stmt->bindParam(":fechaProgramada_cita", $datos->fechaProgramada_cita, PDO::PARAM_STR);
		$stmt->bindParam(":horaInicio_cita", $datos->horaInicio_cita, PDO::PARAM_STR);
		$stmt->bindParam(":horaFin_cita", $datos->horaFin_cita, PDO::PARAM_STR);
		$stmt->bindParam(":asunto_cita", $datos->asunto_cita, PDO::PARAM_STR);
		$stmt->bindParam(":enfermedad_cita", $datos->enfermedad_cita, PDO::PARAM_STR);
		$stmt->bindParam(":estado_cita", $datos->estado_cita, PDO::PARAM_STR);
		$stmt->bindParam(":medicamentos_cita", $datos->medicamentos_cita, PDO::PARAM_STR);
		$stmt->bindParam(":nota_cita", $datos->nota_cita, PDO::PARAM_STR);
		$stmt->bindParam(":pago_cita", $datos->pago_cita, PDO::PARAM_STR);
		$stmt->bindParam(":sinstomas_cita", $datos->sinstomas_cita, PDO::PARAM_STR);
		$stmt->bindParam(":estatus_pago", $datos->estatus_pago, PDO::PARAM_STR);
		$response = ($stmt->execute()) ? true : false;
		echo json_encode(["response" => $response]);
	}
	public static function ctrEliminarCita()
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM tbl_citas WHERE id_cita = :id_cita");
		$stmt->bindParam(":id_cita", $_GET["id_cita"], PDO::PARAM_INT);
		$results = ($stmt->execute()) ? true : false;
		echo json_encode(["response" => $results]);
	}
}
switch ($_SERVER["REQUEST_METHOD"]) {
	case 'GET':
		if (isset($_GET['datatable']))
			CitasControlador::ctrDatatable();
		else
			CitasControlador::ctrMostrarCita();
		break;
	case 'POST':
		$datos = json_decode(file_get_contents('php://input'));
		CitasControlador::ctrAgregarCita($datos);
		break;
	case 'PUT':
		$datos = json_decode(file_get_contents('php://input'));
		CitasControlador::ctrActulizarCita($datos);
		break;
	case 'DELETE':
		CitasControlador::ctrEliminarCita();
		break;
	default:
		echo json_encode(["Error" => "Accion no requerida"]);
		break;
}