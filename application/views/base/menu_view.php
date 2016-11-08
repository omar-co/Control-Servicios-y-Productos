<div id="controls">
    <aside id="sidebar" class="aside-fixed scheme-black">
        <div id="sidebar-wrap">
            <div class="panel-group slim-scroll" role="tablist">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab"><h4 class="panel-title"><a data-toggle="collapse" href="#sidebarNav">Navegación <i class="fa fa-angle-up"></i></a></h4></div>
                    <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                        <div class="panel-body">
                            <!--  NAVIGATION Content -->
                            <ul id="navigation">
                                <li <?php echo $this->uri->segment(1) == 'dashboard'?'class="active open"':'' ?>><a href="<?php echo site_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                                <li <?php echo $this->uri->segment(1) == 'productos'?'class="active open"':$this->uri->segment(1) == 'servicios'?'class="active open"':'' ?>>
                                    <a role="button" tabindex="0"><i class="fa fa-book"></i> <span>Catálogo</span></a>
                                    <ul>
                                        <li <?php echo $this->uri->segment(1) == 'productos'?'class="active"':'' ?>><a href="<?php echo site_url('productos') ?>"><i class="fa fa-angle-right"></i> Productos</a></li>
                                        <li><a href=""><i class="fa fa-angle-right"></i> Categorias</a></li>
                                        <li <?php echo $this->uri->segment(1) == 'servicios'?'class="active"':'' ?>><a href="<?php echo site_url('servicios') ?>"><i class="fa fa-angle-right"></i> Servicios</a></li>
                                    </ul>
                                </li>

                                <li <?php echo $this->uri->segment(1) == 'venta'?'class="active open"':'' ?>><a href=""><i class="fa fa-credit-card"></i> <span>Punto de Venta</span></a></li>
                                <li <?php echo $this->uri->segment(1) == 'calendario'?'class="active open"':'' ?>><a href=""><i class="fa fa-calendar-o"></i> <span>Calendario</span></a></li>
                                <li <?php echo $this->uri->segment(1) == 'clientes'?'class="active open"':'' ?>><a href="<?php echo site_url('clientes') ?>"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
                                <li <?php echo $this->uri->segment(1) == 'ingresos'?'class="active open"':'' ?>>
                                    <a role="button" tabindex="0"><i class="fa fa-university"></i> <span>Ingresos</span></a>
                                    <ul>
                                        <li <?php echo $this->uri->segment(1) == 'ingresos'?$this->uri->segment(2) == NULL ?'class="active"':'':'' ?>><a href="<?php echo site_url('ingresos') ?>"><i class="fa fa-angle-right"></i> Ver Ingresos</a></li>
                                        <li <?php echo $this->uri->segment(1) == 'ingresos'?$this->uri->segment(2) == 'categorias'?'class="active"':'':'' ?>><a href="<?php echo site_url('ingresos/categorias') ?>"><i class="fa fa-angle-right"></i> Categorias</a></li>
                                    </ul>
                                </li>
                                <li <?php echo $this->uri->segment(1) == 'gastos'?'class="active open"':'' ?>>
                                    <a role="button" tabindex="0"><i class="fa fa-money"></i> <span>Gastos</span></a>
                                    <ul>
                                        <li <?php echo $this->uri->segment(1) == 'gastos'?$this->uri->segment(2) == NULL?'class="active"':'':'' ?>><a href="<?php echo site_url('gastos') ?>"><i class="fa fa-angle-right"></i> Ver Gastos</a></li>
                                        <li <?php echo $this->uri->segment(1) == 'gastos'?$this->uri->segment(2) == 'categorias'?'class="active"':'':'' ?>><a href="<?php echo site_url('gastos/categorias') ?>"><i class="fa fa-angle-right"></i> Categorias</a></li>
                                    </ul>
                                </li>
                                <li <?php echo $this->uri->segment(1) == 'usuarios'?'class="active open"':'' ?>><a href=""><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
                                <li <?php echo $this->uri->segment(1) == 'reportes'?'class="active open"':'' ?>>
                                    <a role="button" tabindex="0"><i class="fa fa-line-chart"></i> <span>Cortes</span></a>
                                    <ul>
                                        <li><a href=""><i class="fa fa-angle-right"></i> Por Día</a></li>
                                        <li><a href=""><i class="fa fa-angle-right"></i> Por Periodo</a></li>
                                        <li <?php echo $this->uri->segment(1) == 'reportes'?$this->uri->segment(2) == 'demo'?'class="active"':'':'' ?>><a href="<?php echo site_url('reportes/demo') ?>"><i class="fa fa-angle-right"></i> Por Servicio / Producto</a></li>
                                    </ul>
                                </li>
                                <li <?php echo $this->uri->segment(1) == 'configuracion'?'class="active open"':'' ?>><a href=""><i class="fa fa-cog"></i> <span>Configuracion</span></a></li>
                            </ul>
                            <!--/ NAVIGATION Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
