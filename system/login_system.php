<?php
    require_once "../system/db_connect.php";
    $erros = array();

    if(isset($_POST["btn-entrar"])):
        $email = mysqli_escape_string($connect, $_POST['email']);
        $password = mysqli_escape_string($connect, $_POST['password']);

        if(empty($email) or empty($password)):
            $erros[] = "<p class='erro'> O campo email/password deve ser preenchido </p>";

        else:
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password';";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0):
                if(mysqli_num_rows($result) == 1):
                    $dados = mysqli_fetch_array($result);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    header('Location: ../pages/index.php');
                else:
                    $erros[] = "<p class='erro'> Usuário e senha não conferem </p>";
                endif;
            else:
                $erros[] = "<p class='erro'> Usuário inexistente </p>";
            endif;
        endif;
    endif;
                    
?>