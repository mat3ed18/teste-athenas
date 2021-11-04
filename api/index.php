<?php
    include "functions.php";
    
    if (isset($_POST["listar_usuarios"])) {
        $usuarios = ListarUsuarios();
        echo json_encode($usuarios);
    }
