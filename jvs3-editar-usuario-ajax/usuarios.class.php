<?php
/**
 * Clase para manipular usuarios
 */
class Usuarios
{
    /**
     * Conectar a base de datos
     */
    public function  __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'jvs_tutoriales';

        mysql_connect($dbhost, $dbuser, $dbpass);

        mysql_select_db($dbname);
    }
    /**
     * Seleccionar usuario a partir de un caracter en nombre o apellido
     *
     * @param string $nombreUsuario
     * @return array
     */
    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM usuarios
                WHERE nombre_usuarios LIKE '%$nombreUsuario%'
                OR apellido_usuarios LIKE '%$nombreUsuario%'";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['nombre_usuarios'] . ' ' .
                                        $row['apellido_usuarios'],
                             "descripcion" => $row['descripcion_usuarios'],
                             "foto" => $row['foto_usuarios'],
                             "id" => $row['id_usuarios']);
        }

        return $datos;
    }
    /**
     * Agregar usuarios en la base de datos
     *
     * @param array $datos
     */
    public function agregarUsuario($datos){
        $sql = "INSERT INTO usuarios (nombre_usuarios, apellido_usuarios,
                descripcion_usuarios, foto_usuarios) VALUES ('" . $datos['nombre_usuarios'] . "',
                '" . $datos['apellido_usuarios'] . "', '" . $datos['descripcion_usuarios'] . "',
                '" . $datos['foto_usuarios'] . "')";
        mysql_query($sql);
    }

    public function editarUsuario($datos, $idUsuario){
        if (isset($datos['nombre_usuarios']) && isset($datos['apellido_usuarios'])){
            $sql = "UPDATE usuarios SET nombre_usuarios='" . $datos['nombre_usuarios'] . "',
                    apellido_usuarios='" . $datos['apellido_usuarios'] . "'
                    WHERE id_usuarios='" . $idUsuario . "'";
        } elseif (isset($datos['descripcion_usuarios'])){
            $sql = "UPDATE usuarios SET descripcion_usuarios = '" . $datos['descripcion_usuarios'] . "'
                    WHERE id_usuarios='" . $idUsuario . "'";
        }
        mysql_query($sql);
    }

}
