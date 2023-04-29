<?php

require '../model/header.php';
require '../model/conexion.php';

class ServiciosController
{

    public static function ctrMostrarSerivicios()
    {

        if (isset($_GET["id_servicio"])) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_serivcios WHERE id_servicio = :id_servicio");
            $stmt->bindParam(":id_servicio", $_GET["id_servicio"], PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_serivcios");
            $stmt->execute();
            $response = $stmt->fetchAll();
        }
        echo json_encode($response);
    }

    public static function ctrDatatable()
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_serivcios");
        $stmt->execute();
        $response = $stmt->fetchAll();
        $data = [];
        foreach ($response as $key => $value) {
            $status = ($value['status'] !== 1) ? "<button class='badge badge-success badge-sm'>Activo</button>" : "<button class='badge badge-danger  badge-sm'>Deshabilitado</button>";
            array_push($data, [
                "",
                "$value[id_servicio]",
                "<a href='#' onclick='traerServicios($value[id_servicio])' class='text-primary'> <i class='mdi mdi-link'></i> $value[nombre_servicio]</a>",
                "<a href='#' onclick='traerServicios($value[id_servicio])' class='text-primary'> <i class='mdi mdi-currency-usd'></i>" . number_format($value['monto_servicio'], 2) . "  </a>",
                $status,
                "<button class='badge badge-primary  badge-sm' onclick='traerServicios($value[id_servicio])'><i class='mdi mdi-pencil'></i> </button>
                <button class='badge badge-danger  badge-sm' onclick='deleteServicios($value[id_servicio])'><i class='mdi mdi-delete'></i></button>"
            ]);
        }

        echo json_encode(["data" => $data]);
    }
    public static function ctrAgregarSerivicios($datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO tbl_serivcios (nombre_servicio , monto_servicio) VALUES (:nombre_servicio , :monto_servicio)");
        $stmt->bindParam(":nombre_servicio", $datos->nombre_servicio, PDO::PARAM_STR);
        $stmt->bindParam(":monto_servicio", $datos->monto_servicio, PDO::PARAM_STR);
echo json_encode(["response" => $stmt->execute() ]);
    }

    public static function ctrActulizarSerivicios($datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE tbl_serivcios SET nombre_servicio = :nombre_servicio , monto_servicio = :monto_servicio WHERE  id_servicio =:id_servicio");
        $stmt->bindParam(":id_servicio", $datos->id_servicio, PDO::PARAM_INT);
        $stmt->bindParam(":nombre_servicio", $datos->nombre_servicio, PDO::PARAM_STR);
        $stmt->bindParam(":monto_servicio", $datos->monto_servicio, PDO::PARAM_STR);
echo json_encode(["response" => $stmt->execute() ]);
    }

    public static function ctrEliminarServicios()
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM tbl_serivcios WHERE id_servicio = :id_servicio");
        $stmt->bindParam(":id_servicio", $_GET["id_servicio"], PDO::PARAM_INT);
        $results = ($stmt->execute()) ? true : false;
        echo json_encode(["response" => $results]);
    }
}


switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        if (isset($_GET['datatable']))
            ServiciosController::ctrDatatable();
        else
            ServiciosController::ctrMostrarSerivicios();
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        ServiciosController::ctrAgregarSerivicios($datos);
        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        ServiciosController::ctrActulizarSerivicios($datos);
        break;
    case 'DELETE':
        ServiciosController::ctrEliminarServicios();
        break;
    default:
        echo json_encode(["Error" => "Accion no requerida"]);
        break;
}