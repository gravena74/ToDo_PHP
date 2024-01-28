<?php
    $local = "localhost";
    $username = "root";
    $password = "";
    $database = "toDo";

    $connect = mysqli_connect($local, $username, $password, $database);

    if(mysqli_connect_error()):
        echo "error: Falha ao conectar-se ao banco de dados";
    endif;
?>