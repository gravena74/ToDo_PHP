<?php
    include_once "../system/system.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <!-- Links icons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <!-- Links fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">

    <title>Taskify</title>
</head>
<body>
    <!-- CREATE POPUP -->

    <div class="popup">
        <div class="popup_title_div">
            <h1>New Task</h1>
            <button class="close_btn">X</button>
        </div>
        <form action="" method="POST">
            <div>
                <p>Title: </p>
                <input type="text" name="title">
                <p>Description: </p>
                <input type="text" name="description">
                <?php
                    if(!empty($erros)):
                        foreach($erros as $erro):
                            echo $erro;
                        endforeach;
                    endif;
                ?>
            </div>
            <div class="div_button">
                <button class="btn_add_newTask" name="btn_add_newTask">Submit</button>
            </div>
        </form>
    </div>


    <!-- FIXED WEBSITE -->


    <nav class="horizontal-nav">
        <a href="/pages/index.html"><i class="fi fi-rr-alarm-clock"></i></a>
        <h1>Taskify</h1>
    </nav>

    <section>
        <nav class="vertical-nav">
            <div>
                <a href="#">
                    <i class="fi fi-rr-list"></i> 
                    <p>My tasks</p>
                </a>
                <a href="#">
                    <i class="fi fi-rr-calendar"></i> 
                    <p>Meeting</p>
                </a>
                <a href="#">
                    <i class="fi fi-rr-chart-line-up"></i> 
                    <p>Reports</p>
                </a>
                <a href="#">
                    <i class="fi fi-rr-bell"></i> 
                    <p>Activity</p>
                </a>
            </div>

            <div class="user_info">
                <div>
                    <img src="../src/Screenshot 2023-12-26 142706.png" alt="">
                </div>
                <div>
                    <h1>João Gravena</h1>
                    <p>Admin</p>
                </div>
            </div>
        </nav>



        <main>
            <div class="title_div">
                <h2>My Tasks</h2>
                <div>
                    <form action="" method="POST">
                        <input type="text" placeholder="Search...">
                        <button class="btn_search"><i class="fi fi-rr-search"></i></button>
                    </form>
                    <button type="button" class="btn_newTasks">+ New Task</button>
                </div>
            </div>
            

            <!-- LISTA TAREFAS -->

            <div class="frame_tasks">
                <?php
                    $sql = "SELECT * FROM tasks";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <div class="task">
                    <form action="" method="POST">
                        <div>
                            <h3 class="title"><?php echo $dados['title']?></h3>
                            <p class="description"><?php echo $dados['description'] ?></p>
                        </div>
                    </form>
                    <div>
                        <form action="" method="POST">
                            <input type="hidden" name="task_id" value="<?php echo $dados['id'] ?>">
                            <button class="btn_edit" name="btn_edit" type="button" value="<?php echo $dados['id'] ?>"><i class="fi fi-rr-pencil"></i></button>
                            <button class="btn_delete" name="btn_delete"><i class="fi fi-rs-trash"></i></button>

                        </form>
                    </div>

                    <!-- UPDATE POPUP -->

                
                    <div class="popup_edit" id="edit_popup_<?php echo $dados['id']; ?>" >
                        <div class="popup_title_div">
                            <h1>New Task</h1>
                            <button class="close_btn_edit" value="<?php echo $dados['id']; ?>">X</button>
                        </div>
                        <form action="" method="POST">
                            <div class="info_input">
                                <p>Title: </p>
                                <input type="text" name="title" value="<?php echo $dados['title'] ?>">
                                <p>Description: </p>
                                <input type="text" name="description" value="<?php echo $dados['description']?>">
                                <?php
                                    if(!empty($erros)):
                                        foreach($erros as $erro):
                                            echo $erro;
                                        endforeach;
                                    endif;
                                ?>
                            </div>
                            <div class="div_button">
                                <input type="hidden" name="task_id" value="<?php echo $dados['id'] ?>">
                                <button class="btn_edit_Task" name="btn_edit_Task">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </main>
    </section>

    <script src="../system/log.js"></script>
</body> 
</html>