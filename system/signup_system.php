<?php
    require_once '../system/db_connect.php';

    session_start();

    if(isset($_POST['btn-cadastrar'])):
        $erros = array();
        $email = mysqli_escape_string($connect, $_POST['email']);
        $name = mysqli_escape_string($connect, $_POST['name']);
        $password = mysqli_escape_string($connect, $_POST['password']);

        if(empty($email) or empty($password) or empty($name)):
            $erros[] = "<p class='erro'> O campo Email/Name/Senha precisa ser preenchido </p>";
        else:
            $password = md5($password);
            $sql = "INSERT INTO `users`(`email`, `user_name`, `password`) VALUES ('$email','$name','$password');";
            if(mysqli_query($connect, $sql)):
                header('Location: ../pages/index.php?sucesso');
            else:
                header('Location: ../pages/signup.php?erro');
            endif;
        endif;
    endif;
?>