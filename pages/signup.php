<?php
    include_once "../system/signup_system.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/login_style.css">
    <title>Sign Up</title>
</head>
<body>
    <section class="section1">
        <img src="../imgs/pngwing.com (1).png" alt="">
    </section>
    <section class="section2">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h1>Welcome!</h1>
            <p>Please enter your details</p>
            <input type="text" name="name" placeholder="Username: ">
            <input type="text" name="email" placeholder="Email: ">
            <input type="text" name="password" placeholder="Password: ">
            <button name="btn-cadastrar">Sign Up</button>
            
            <?php
                if(!empty($erros)):
                    foreach($erros as $erro):
                        echo $erro;
                    endforeach;
                endif;
            ?>
            <a href="../pages/login.php">Do have an account? Log in</a>
        </form>
    </section>
</body>
</html>