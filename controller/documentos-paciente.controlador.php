<?php
class ControladorDocumentosPaciente
{
    static public function crtSubirArchivos()
    {
        define('DIR_DOCS', '../view/assets/docs/' . $_GET['id_paciente']);
        $ficheros = $_FILES['input-ke-1'];
        $estado_proceso = NULL;
        $paths = array();
        $nombres_ficheros = $ficheros['name'];

        if (!file_exists(DIR_DOCS)) @mkdir(DIR_DOCS);
        if (file_exists(DIR_DOCS)) {
            for ($i = 0; $i < count($nombres_ficheros); $i++) {
                $nombre_extension = explode('.', basename($nombres_ficheros[$i]));
                $extension = array_pop($nombre_extension);
                $nombre = array_pop($nombre_extension);
                $archivo_destino = DIR_DOCS . DIRECTORY_SEPARATOR . utf8_decode($nombre) . '.' . $extension;
                if (move_uploaded_file($ficheros['tmp_name'][$i], $archivo_destino)) {
                    $estado_proceso = true;
                    $paths[] = $archivo_destino;
                } else {
                    $estado_proceso = false;
                    break;
                }
            }
        }
        $respuestas = array();
        if ($estado_proceso === true) {
            $respuestas = array();
            $respuestas = ['dirupload' => basename(DIR_DOCS), 'total' => count($paths)];
        } elseif ($estado_proceso === false) {
            $respuestas = ['error' => 'Error al subir los archivos. Póngase en contacto con el administrador del sistema'];
            foreach ($paths as $fichero) {
                unlink($fichero);
            }
        } else {
            $respuestas = ['error' => 'No se ha procesado ficheros.'];
        }

        return json_encode($respuestas);
    }


    public static function ctrSeleccionarDocumentos()
    {
        define('DIR_', '../view/assets/docs/' . $_GET['id_paciente']);
        if (!file_exists(DIR_)) @mkdir(DIR_);
        try {
            $directorio = opendir(DIR_);
            $datos = array();
            while ($archivo = readdir($directorio)) {
                if (($archivo != '.') && ($archivo != '..')) {
                    $datos[] = 'view/assets/docs/' . $_GET['id_paciente'] . '/' . $archivo;
                }
            }
        } catch (\Throwable $th) {
            $datos = [];
        }
        return json_encode($datos);
    }

    public static function ctrEliminarDocumentos()
    {
        try {

            $ruta = '../' . $_GET['file'];
            unlink($ruta);
            $respuestas = ['success' => 'Eliminado con exito.'];
            return json_encode($respuestas);
        } catch (\Throwable $th) {

            $respuestas = ['error' => 'No se ha procesado ficheros.'];
            return json_encode($respuestas);
        }
    }
}



if (isset($_POST['subir_archivo'])) {
    $respuesta = ControladorDocumentosPaciente::ctrSeleccionarDocumentos();
    echo $respuesta;
}

if (isset($_GET['file'])) {
    $respuesta = ControladorDocumentosPaciente::ctrEliminarDocumentos();
    echo $respuesta;
}

if (isset($_FILES['input-ke-1'])) {
    $respuesta = ControladorDocumentosPaciente::crtSubirArchivos();
    echo $respuesta;
}
