<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li class="active">
                                <a title="Landing Page" href="<?= constant('URL') ?>home" aria-expanded="false"><span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span>
                                    <span class="mini-click-non ">Home</span></a>
                            </li>
                            <li>
                                <a class="has-arrow" href="">
                                    <span class="educate-icon educate-event icon-wrap sub-icon-mg"></span>
                                    <span class="mini-click-non">Afiliaciones</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Lista de espera" href="<?= constant('URL') ?>afiliaciones/verTodas"><span class="mini-sub-pro">Recepcion</span></a></li>
                                    <li><a title="Lista de recibidos" href="<?= constant('URL') ?>afiliaciones/verRegistros"><span class="mini-sub-pro">Registros</span></a></li>
                                    <li><a title="Reportes en Excel" href="<?= constant('URL') ?>afiliaciones/reportes"><span class="mini-sub-pro">
                                                Descargar Reporte</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Convenios</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Lista de espera" href="<?= constant('URL') ?>convenios/verTodas"><span class="mini-sub-pro"> Recepcion</span></a></li>

                                    <li><a title="Lista de recibidos" href="<?= constant('URL') ?>convenios/verRegistros"><span class="mini-sub-pro">
                                                Registros</span></a></li>
                                    <li><a title="All Courses" href="<?= constant('URL') ?>Error"><span class="mini-sub-pro">
                                                Descargar Reporte</span></a></li>

                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>