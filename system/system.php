<?php
    require_once "../system/db_connect.php";
    $erros = array();

    if(isset($_POST["btn_add_newTask"])):
        $title = mysqli_escape_string($connect, $_POST['title']);
        $description = mysqli_escape_string($connect, $_POST['description']);

        if(empty($title)):
            $erros[] = "<p class='erro'> O campo title deve ser preenchido </p>";
        
        else:
            
            $sql = "INSERT INTO `tasks`(`title`, `description`) VALUES ('$title','$description');";
            if(mysqli_query($connect, $sql)):
                header('Location: ../pages/index.php?sucesso');
            else:
                header('Location: ../pages/index.php?erro');
            endif;
        endif;
    endif;

    if(isset($_POST["btn_delete"])):
        if(!empty($_POST['task_id'])):
            $id = mysqli_real_escape_string($connect, $_POST['task_id']);
            $sql = "DELETE FROM tasks WHERE id = '$id'";

            if(mysqli_query($connect, $sql)):
                header('Location: ../pages/index.php?DeletadoComsucesso');
            else:
                header('Location: ../pages/index.php?erroAoDeletar');
            endif;
        else:
            $_SESSION['mensagem'] = "ID do usuário não especificado.";
        endif;
    endif;

    if(isset($_POST["btn_edit_Task"])):
        if(!empty($_POST['task_id'])):
            $id = mysqli_real_escape_string($connect, $_POST['task_id']);

            $title = mysqli_escape_string($connect, $_POST['title']);
            $description = mysqli_escape_string($connect, $_POST['description']);

            $sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = '$id'";

            if(mysqli_query($connect, $sql)):
                header('Location: ../pages/index.php?AtualizadoComsucesso');
            else:
                header('Location: ../pages/index.php?erroAoAtualizar');
            endif;
        else:
            $_SESSION['mensagem'] = "ID do usuário não especificado.";
        endif;
    endif;
?>