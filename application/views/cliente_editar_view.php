<section id="content">
    <div class="page page-shop-products">
        <div class="row">
            <div class="col-md-12">
                <div class="pageheader">
                    <h2>Clientes</h2>
                </div>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <section class="tile">
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font">Edición de <strong>Clientes</strong></h1>
                    <ul class="controls">

                        <li class="dropdown"><a role="button" tabindex="0" class="dropdown-toggle settings"
                                                data-toggle="dropdown"> <i class="fa fa-cog"></i> <i
                                    class="fa fa-spinner fa-spin"></i> </a>
                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                <li><a role="button" tabindex="0" class="tile-toggle"> <span class="minimize"><i
                                                class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimizar</span> <span
                                            class="expand"><i
                                                class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expandir</span> </a></li>
                                <li><a role="button" tabindex="0" class="tile-refresh"> <i class="fa fa-refresh"></i>
                                        Actualizar </a></li>
                                <li><a role="button" tabindex="0" class="tile-fullscreen"> <i class="fa fa-expand"></i>
                                        Pantalla Completa </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="tile-body">
                    <div class="row">
                        <?php echo form_open(site_url('cliente/editar')) ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label('Nombre', 'nombre') ?>
                                <?php echo form_input($form['nombre']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label('Apellidos', 'apellidos') ?>
                                <?php echo form_input($form['apellidos']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label('Telefono Fijo', 'telefono1') ?>
                                <?php echo form_input($form['telefono1']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label('Telefono Celular', 'telefono2') ?>
                                <?php echo form_input($form['telefono2']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label('Email', 'email') ?>
                                <?php echo form_input($form['email']) ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-10">
                        <div class="form-group">
                            <?php echo form_submit($form['enviar']) ?>
                        </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
        </div>
</section>
</div>
</div>
</section>
