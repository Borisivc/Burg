<?php
require_once("models/usuarios_model.php");
$user=new usuarios_model();
$datos=$user->get_usuarios();

require_once("views/usuarios_view.phtml");
?>