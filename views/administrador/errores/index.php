<?php require 'views/administrador/head.php'; ?>

<body>
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <?php require 'views/administrador/aside.php'; ?>
    </div>
    <!-- End Left menu area -->


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">


        <div class="container-fluid">
            <?php require 'views/administrador/logo.php'; ?>
        </div>

        <div class="header-advance-area">


            <?php require 'views/administrador/menu.php'; ?>

            <?php require 'views/administrador/movilMenu.php'; ?>

        </div>
        <div class="contenido ">
            <div id="main" style="padding: 5px; ">
                <div class="error-pagewrap">
                    <div class="error-page-int">
                        <div class="content-error">
                            <h1>ERROR <span class="counter"> 404</span></h1>
                            <p>Sorry, but the page you are looking for has note been found. Try checking the URL for the error, then hit the refresh button on your browser or try found something else in our app.</p>
                            <a href="#">Report Problem</a>
                        </div>
                        <div class="text-center login-footer">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <?php require 'views/administrador/footer.php'; ?>

    </div>

    <?php require 'views/administrador/scripts.php'; ?>
</body>