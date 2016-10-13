<!-- HEADER Content -->
<section id="header">
    <header class="clearfix">
        <!-- Branding -->
        <div class="branding scheme-black">
            <a class="brand" href="<?php echo base_url('dashboard') ?>">   </a>
            <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Branding end -->
        <!-- Left-side navigation -->
        <ul class="nav-left pull-left list-unstyled list-inline">
            <li class="sidebar-collapse"><a role="button" tabindex="0" class="collapse-sidebar"><i class="fa fa-outdent"></i></a></li>

        </ul>
        <!-- Left-side navigation end -->



        <!-- Right-side navigation -->
        <ul class="nav-right pull-right list-inline">
            <li class="dropdown nav-profile">
                <a href class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url() ?>assets/img/user.png" alt="" class="br-5 size-30x30">
                    <span><?php echo $this->_ion_auth->first_name  ?> <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="dropdown-menu animated littleFadeInDown br-5" role="menu">
                    <li><a role="button" tabindex="0"><i class="fa fa-user"></i>Perfil</a></li>
                    <li><a role="button" tabindex="0"><i class="fa fa-check"></i>Configuración</a></li>
                    <li class="divider"></li>
                    <li><a role="button" tabindex="0"><i class="fa fa-lock"></i>Bloquear</a></li>
                    <li><a role="button" tabindex="0" href="<?php echo base_url('logout') ?>"><i class="fa fa-sign-out"></i>Salir</a></li>
                </ul>
            </li>

        </ul>
        <!-- Right-side navigation end -->
    </header>
</section>
<!--/ HEADER Content  -->