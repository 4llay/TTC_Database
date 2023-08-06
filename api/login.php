<?php
    include 'config.php';
    session_start();

    if(isset($_POST["submit"])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $senha = mysqli_real_escape_string($conn, md5($_POST['senha']));

        $select = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE email = '$email' AND senha = '$senha'") or die('query failed');

        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['id'];
            header('location:index.php');
        }else{
            $message[] = 'email ou senha esta incorreto!';
        }
    }
?>
<html>
<head>
    <title>TCC</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="arquivos/css/style.css">
    <link rel="stylesheet" href="arquivos/css/header.css">
    <link rel="stylesheet" href="arquivos/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <div class="tudo">

    <header class="header container">
        <h1 id="titulo">Cones trufadassos</h1>
    </header>

    <div class="page">
        <form method="POST" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" autofocus="true" />
            <label for="password">Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" />
            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
        }
      }
      ?>
            <input type="submit" value="Acessar" name="submit" class="btn" />
            <p>Não possui uma conta? <a href="cadastro.php">Cria uma aqui.</a></p>
        </form>
    </div>

        <footer class="footer" data-visible="false">
            <p id="nomes">Autores:  JP, GAGA, CACA, LELEH.</p>
            <p id="Copyright">Copyright © 2023</p>
        </footer>

    </div>
</body>

</html>