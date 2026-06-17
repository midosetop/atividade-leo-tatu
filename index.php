<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php if(isset($_SESSION['tipo'])): ?>

        <?php if($_SESSION['tipo'] == "admin"): ?>
            <h1>Header admin</h1>
        <?php elseif ($_SESSION['tipo'] == "mod"): ?>
            <h1>Header moderador</h1>
        <?php elseif ($_SESSION['tipo'] == "usuario"): ?>
            <h1>Heador logado</h1>
            <?php endif; ?>


    <?php else: ?>
        <h1>Header padrão</h1>
    <?php endif; ?>

    <form action="login.php" method="POST">
            <input type="text" name="username">
            <input type="password" name="password">
            <button type="submit">Entrar</button>
        </form>

    <?php if(isset($_SESSION['user'])): ?>
    <a href="logout.php">Sair</a>
    <?php endif; ?>
    </header>

    <div class="conteudo">

    <!--div esquerda para mods e adms-->
    <?php if(isset($_SESSION['user'])): ?>
        <div class="left"></div>
    <?php endif; ?>

    <!--Div principal-->
    <div class="principal">

        <?php if(isset($_SESSION['tipo'])): ?>

        <?php if($_SESSION['tipo'] == "admin"): ?>
            <h1>Conteúdo admin</h1>
        <?php elseif ($_SESSION['tipo'] == "mod"): ?>
            <h1>Conteúdo moderador</h1>
        <?php elseif ($_SESSION['tipo'] == "usuario"): ?>
            <h1>Conteúdo logado</h1>
            <?php endif; ?>
        
            <?php else: ?>
            <h1>Conteúdo padrão</h1>
        <?php endif; ?>    

    </div>

</div>

</body>
</html>