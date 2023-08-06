<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
       header('location:login.php');
    };

    $select = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
       $fetch = mysqli_fetch_assoc($select);
    }
?>

<html>

<head>
    <title>Cones Trufadassos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="arquivos/css/style.css">
    <link rel="stylesheet" href="arquivos/css/header.css">
    <link rel="stylesheet" href="arquivos/css/arrastar.css">
    <link rel="stylesheet" href="arquivos/css/preview.css">
    <link rel="stylesheet" href="arquivos/css/menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="imagem/utilizando/logo pro.png">
    <script src="https://kit.fontawesome.com/cd773e3565.js" crossorigin="anonymous"></script>
    <script src="arquivos/js/arrastar.js" defer></script>
    <script src="arquivos/js/preview.js" defer></script>
    <script src="arquivos/js/menu.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
        <header class="header container">
            <h1 id="titulo">Cones trufadassos</h1>
            <nav>
                <ul class="header__menu">
                    <li class="header__item">
                        <a class="header__link">Sobre</a>
                    </li>
                    
                    <li class="header__item">
                        <a class="header__link" target="_blank" href="https://instagram.com/lg.cones_trufados.2023"> contato</a>
                    </li>
                    
                    <li class="header__line"></li>
                    
                    <li class="header__icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </li>
                    
                    <li class="header__icon">
                        <i class="fa-solid fa-sun"></i>
                    </li>
                    
                    <li>
                        <button class="header__bars">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </header>
        
        <!-- Menu de celular-->
            <div class="mobile-nav">
                <nav>
                    <ul class="mobile-nav__menu">                                                                                                      <!--vai ser um apelido com até 15 letras-->
                            <li><button class="profile-button">
                            <?php
                                if($fetch['img'] == ''){
                                    echo '<img class="profile-button__img" src="imagem/utilizando/default-avatar.png">';
                                }else{
                                    echo '<img class="profile-button__img" src="uploaded_img/'.$fetch['img'].'">';
                                }
                            ?>
                            <!-- <img class="profile-button__img" src="/imagem/zoeira/reverse_flash.png"> -->
                            <p class="profile-button__text">Olá <?php echo $fetch['nome']; ?></p></img></button></li>
                            
                            <li class="mobile-nav__text erase">Sobre</li>
                            <li><a class="mobile-nav__text erase" href="https://instagram.com/lg.cones_trufados.2023">Contato</a></li>
                            <li class="mobile-nav__line erase"></li>
                            <li class="mobile-nav__text">Configurações</li>
                            <li class="mobile-nav__text">Historico de compra</li>
                        <li class="mobile-nav__text">Carrinho</li>
                        <li class="mobile-nav__line"></li>
                        <li class="mobile-nav__text"><a href="login.php">Sair</a></li>
                    </ul>
                </nav>
            </div>
        <!-- Fim de menu de celular-->    

        <!-- display de produtos -->

        <div class="hero">
            <div class="wrapper">
                <i id="left" class="fa-solid fa-circle-chevron-left"></i>
                <ul class="carousel">
                <li class="card" data-name="p-1">
                    <img class="produto" src="imagem/cones/Paçoca.jpeg" alt="não carregou :(" draggable="false">
                    <h2>paçoca</h2>
                    <span>R$ 10,00</span>
                </li>
                <li class="card" data-name="p-2">
                    <img class="produto" src="imagem/cones/Dois Amores.jpeg" alt="não carregou :(" draggable="false">
                    <h2>dois amores</h2>
                    <span>R$ 10,00</span>
                </li>
                <li class="card" data-name="p-3">
                    <img class="produto" src="imagem/cones/Ninho com Nutella.jpeg" alt="não carregou :(" draggable="false">
                    <h2>ninho com nutella</h2>
                    <span>R$ 12,00</span>
                </li>
                <li class="card" data-name="p-4">
                    <img class="produto" src="imagem/cones/Oreo.jpeg" alt="não carregou :(" draggable="false">
                    <h2>oreo</h2>
                    <span>R$ 10,00</span>
                </li>
                <li class="card" data-name="p-5">
                    <img class="produto" src="imagem/cones/confete.jpg" alt="não carregou :(" draggable="false">
                    <h2>confete</h2>
                    <span>R$ 10,00</span>
                </li>
            </ul>
            <i id="right" class="fa-solid fa-circle-chevron-right"></i>
        </div>
    </div>

        <!-- fim do display de produtos -->

        <!-- preview de produtos -->

    <div class="products-preview">

        <div class="preview" data-target="p-1">
           <i class="fas fa-times"></i>
           <img src="/imagem/cones/Paçoca.jpeg" alt="não carregou :(" draggable="false">
           <h3>Sabor paçoca</h3>
           <p>Delicioso cone trufado de sabor irresistível de paçoca, uma combinação perfeita de texturas e sabores que encantará seu paladar.</p>
           <div class="price">R$ 10.00</div>
            <div class="buttons">
                <button class="button"><a href="#" class="buy">Comprar</a></button>
                <button class="button"><a href="#" class="cart">Adicionar ao carrinho</a></button>
            </div>
        </div>

        <div class="preview" data-target="p-2">
            <i class="fas fa-times"></i>
            <img src="/imagem/cones/Dois Amores.jpeg" alt="não carregou :(" draggable="false">
            <h3>Sabor Dois Amores</h3>
            <p>Delicioso cone trufado harmonizando chocolate preto e branco, uma fusão perfeita de sabores.</p>
            <div class="price">R$ 10.00</div>
            <div class="buttons">
                <button class="button"><a href="#" class="buy">Comprar</a></button>
                <button class="button"><a href="#" class="cart">Adicionar ao carrinho</a></button>
            </div>
         </div>

         <div class="preview" data-target="p-3">
            <i class="fas fa-times"></i>
            <img src="/imagem/cones/Ninho com Nutella.jpeg" alt="não carregou :(" draggable="false">
            <h3>Sabor Ninho com Nutella</h3>
            <p>Irresistível cone trufado cremoso com Nutella e creme de leite Ninho, uma tentação inigualável.</p>
            <div class="price">R$ 12.00</div>
            <div class="buttons">
                <button class="button"><a href="#" class="buy">Comprar</a></button>
                <button class="button"><a href="#" class="cart">Adicionar ao carrinho</a></button>
            </div>
         </div>

         <div class="preview" data-target="p-4">
            <i class="fas fa-times"></i>
            <img src="/imagem/cones/Oreo.jpeg" alt="não carregou :(" draggable="false">
            <h3>Sabor Oreo</h3>
            <p>Um apetitoso cone trufado contendo um sabor inconfundível da bolacha Oreo, uma verdadeira delícia.</p>
            <div class="price">R$ 10.00</div>
            <div class="buttons">
                <button class="button"><a href="#" class="buy">Comprar</a></button>
                <button class="button"><a href="#" class="cart">Adicionar ao carrinho</a></button>
            </div>
         </div>

         <div class="preview" data-target="p-5">
            <i class="fas fa-times"></i>
            <img src="/imagem/cones/confete.jpg" alt="não carregou :(" draggable="false">
            <h3>Sabor Confete</h3>
            <p>Divertido cone trufado repleto de confeitos coloridos, uma experiência alegre e saborosa.</p>
            <div class="price">R$ 10.00</div>
            <div class="buttons">
                <button class="button"><a href="#" class="buy">Comprar</a></button>
                <button class="button"><a href="#" class="cart">Adicionar ao carrinho</a></button>
            </div>
         </div>
     </div>
    
        <!--fim do preview de produtos -->

        <!-- creditos -->
    <footer class="footer" data-visible="false">
        <p id="nomes">Autores:  JP, GAGA, CACA, LELEH.</p>
        <p id="Copyright">Copyright © 2023</p>
    </footer>
        <!-- fim dos creditos -->
</body>
</html>