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
        <div class="contenido">
            <br>

            <div class="calender-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        <h3>Home</h3>
                               
                            <div class="calender-inner" style="border-top: 4px solid #3c8dbc;">
                                <div id="main" style="padding: 10px; text-align:center; ">
                                    
                                    <img src="https://ww2.ufps.edu.co/public/archivos/elementos_corporativos/LOGO_COMPROMETIDOS.png" width="770px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require 'views/administrador/footer.php'; ?>

    </div>

    <?php require 'views/administrador/scripts.php'; ?>
</body>