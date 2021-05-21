<?php require 'views/head.php';?>
   <body>
       
   
 <?php require 'views/navbar.php';?>
    <div id="main">
        <br>
        <form action="<?= constant('URL'); ?>userController/login" method="POST" class="form-login f1">
            <h2>Iniciar sesión</h2>
            <?php
            if (isset($errorLogin)) {
            ?>
                <div class="error">
                    <?=$errorLogin;?>
                </div>
            <?php
            }
            ?>
            <br>
            <p>Nombre de usuario: <br>
                <input type="text" name="username" required></p>
            <p>Password: <br>
                <input type="password" name="password" required></p>
            <br>
            <p class="center"><input type="submit" value="Iniciar Sesión"></p>
        </form>
        <br>
    </div>
    <?php require 'views/footer.php'; ?>
    <?php require 'views/scripts.php'; ?>
</body>