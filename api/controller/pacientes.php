<?php

require '../model/header.php';
require '../model/conexion.php';

class PacienteController
{

    public static function ctrMostrarPacientes()
    {

        if (isset($_GET["id_paciente"])) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_pacientes WHERE id_paciente = :id_paciente");
            $stmt->bindParam(":id_paciente", $_GET["id_paciente"], PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_pacientes");
            $stmt->execute();
            $response = $stmt->fetchAll();
        }

        echo json_encode($response);
    }


    public static function ctrAgregarPaciente($datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO tbl_pacientes(nombre_paciente, apaterno_paciente, amaterno_paciente, correo_paciente, domicilio_paciente, rfc_paciente, alergias_paciente, telefono_paciente, status_paciente) 
        VALUES (:nombre_paciente, :apaterno_paciente, :amaterno_paciente, :correo_paciente, :domicilio_paciente, :rfc_paciente, :alergias_paciente, :telefono_paciente, :status_paciente)");

        $stmt->bindParam(":nombre_paciente", $datos->nombre_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":apaterno_paciente", $datos->apaterno_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":amaterno_paciente", $datos->amaterno_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":correo_paciente", $datos->correo_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":domicilio_paciente", $datos->domicilio_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":rfc_paciente", $datos->rfc_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":alergias_paciente", $datos->alergias_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":telefono_paciente", $datos->telefono_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":status_paciente", $datos->status_paciente, PDO::PARAM_INT);

echo json_encode(["response" => $stmt->execute() ]);
    }

    public static function ctrActulizarPaciente($datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE tbl_pacientes SET nombre_paciente = :nombre_paciente, apaterno_paciente  = :apaterno_paciente, amaterno_paciente  = :amaterno_paciente, correo_paciente  = :correo_paciente,
            domicilio_paciente  = :domicilio_paciente, rfc_paciente  = :rfc_paciente, alergias_paciente  = :alergias_paciente, telefono_paciente  = :telefono_paciente
            WHERE  id_paciente =:id_paciente");

        $stmt->bindParam(":id_paciente", $datos->id_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":nombre_paciente", $datos->nombre_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":apaterno_paciente", $datos->apaterno_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":amaterno_paciente", $datos->amaterno_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":correo_paciente", $datos->correo_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":domicilio_paciente", $datos->domicilio_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":rfc_paciente", $datos->rfc_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":alergias_paciente", $datos->alergias_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":telefono_paciente", $datos->telefono_paciente, PDO::PARAM_STR);
        //$stmt->bindParam(":status_paciente", 1, PDO::PARAM_INT);/

echo json_encode(["response" => $stmt->execute() ]);
    }

    public static function eliminarPaciente()
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM tbl_pacientes WHERE id_paciente = :id_paciente");
        $stmt->bindParam(":id_paciente", $_GET["id_paciente"], PDO::PARAM_INT);
        $results = ($stmt->execute()) ? true : false;
        echo json_encode(["response" => $results]);
    }


    public static function ctrDatatable()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_pacientes ");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($response as $key => $value) {
            $status = ($value['status_paciente'] == 1) ? "<button class='badge badge-success badge-sm'>Activo</button>" : "<button class='badge badge-danger  badge-sm'>Deshabilitado</button>";
            array_push($data, [
                "",
                "$value[id_paciente]",
                "<a onclick='mostarDetallesMedico($value[id_paciente])' class='text-primary'> <i class='mdi mdi-link'></i> $value[nombre_paciente] $value[apaterno_paciente] $value[amaterno_paciente]</a>",
                $value['correo_paciente'],
                $value['telefono_paciente'],
                $status,
                "<button class='badge badge-success  badge-sm' onclick='mostarDetallesMedico($value[id_paciente])'><i class='mdi mdi-information-outline'></i> </button>
                <a class='badge badge-warning badge-sm' href='index.php?ruta=historial-paciente&id=$value[id_paciente]' ><i class='mdi mdi-history'></i></a>
                <a class='badge badge-info badge-sm' href='index.php?ruta=documentos-paciente&id=$value[id_paciente]' ><i class='mdi mdi-file'></i></a>
                <button class='badge badge-primary  badge-sm' onclick='traerPeciente($value[id_paciente])'><i class='mdi mdi-pencil'></i> </button>
                <button class='badge badge-danger  badge-sm' onclick='deletePacientes($value[id_paciente])'><i class='mdi mdi-delete'></i></button>"
            ]);
        }

        echo json_encode(["data" => $data]);
    }
}


switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        if (isset($_GET['datatable']))
            PacienteController::ctrDatatable();
        else
            PacienteController::ctrMostrarPacientes();
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        PacienteController::ctrAgregarPaciente($datos);
        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        PacienteController::ctrActulizarPaciente($datos);
        break;
    case 'DELETE':
        PacienteController::eliminarPaciente();
        break;
    default:
        echo json_encode(["Error" => "Accion no requerida"]);
        break;
}