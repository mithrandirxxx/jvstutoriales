<?php
include_once 'usuarios.class.php';

$usuario = new Usuarios();
$type = $_GET['type'];
/**
 * Type 1: Resultados del autocomplete.
 * Type 2: Formulario para agregar usuarios.
 * Type 3: Funcion para agregar usuario.
 */
switch ($type) {
    
    case 1:
        echo json_encode($usuario->buscarUsuario($_GET['term']));
    break;

    case 2:
?>
    <label for="nombre_usuarios">Nombre:</label><br/>
    <input type="text" id="nombre_usuarios" name="nombre_usuarios" /><br/>
    <label for="apellido_usuarios">Apellido:</label><br/>
    <input type="text" id="apellido_usuarios" name="apellido_usuarios" /><br/>
    <label for="descripcion_usuarios">Descripcion:</label><br/>
    <textarea cols="20" rows="10" id="descripcion_usuarios" name="descripcion_usuarios"></textarea><br/>
    <button id="submit" name="submit">Guardar</button>
<?php
    break;

    case 3:
        $usuario->agregarUsuario($_GET);
    break;

    case 4:
        $usuario->editarUsuario($_GET, $_GET['id_usuario']);
    break;

    default:
    break;
}

