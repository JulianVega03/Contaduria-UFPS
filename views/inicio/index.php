<?php require 'views/head.php'; ?>

<body>


    <?php require 'views/navbar.php'; ?>
    <div id="main">
        <div class=" f1">
            <h1 class="center">Bienvenido al Sitio</h1>
            <img width="450px" src="data:image/png;base64,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" alt="">
        </div>
<br><br><br>
    </div>
    <?php require 'views/footer.php'; ?>
    <?php require 'views/scripts.php'; ?>
</body>