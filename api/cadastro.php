<?php

    include 'config.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['nome']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $senha = mysqli_real_escape_string($conn, md5($_POST['senha']));
        $senha2 = mysqli_real_escape_string($conn, md5($_POST['senha2']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/'.$image;

        $select = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE email = '$email'") or die('query failed');

        if(mysqli_num_rows($select)>0){
            $message[] = 'Este email ja foi usado >:(';
        }else{
            if($senha != $senha2){
               $message[] = 'As senhas não combinam >:(';
            }elseif($image_size > 2000000){
               $message[] = 'A imagem é muito grande! >:(';
            }else{
               $insert = mysqli_query($conn, "INSERT INTO `usuarios`(nome, senha, email, img) VALUES('$name', '$senha', '$email', '$image')") or die('query failed');
      
               if($insert){
                  move_uploaded_file($image_tmp_name, $image_folder);
                  $message[] = 'Registrado com sucesso! :)';
                  header('location:login.php');
               }else{
                  $message[] = 'O Registro falhou! >:(';
               }
            }
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

        <form method="POST" class="formReg">
            <h1>Registrar-se</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">Nome</label>
            <input type="text" name="nome" placeholder="Digite seu nome" class="box" required>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Digite seu email" class="box" required>
            <label for="email">Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" class="box" required>
            <label for="email">Confirmar senha</label>
            <input type="password" name="senha2" placeholder="confirme sua senha" class="box" required>
            <input type="file" name="img" class="box" accept="image/jpg, image/jpeg, image/png">
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
        }
      }
      ?>
            <input type="submit" name="submit" name="submit" value="Registre-se agora" class="btn">
            <p>Ja possui uma conta? <a href="login.php">Faça seu login aqui.</a></p>
        </form>

        <footer class="footer" data-visible="false">
            <p id="nomes">Autores:  JP, GAGA, CACA, LELEH.</p>
            <p id="Copyright">Copyright © 2023</p>
        </footer>

    </div>
</body>

</html>