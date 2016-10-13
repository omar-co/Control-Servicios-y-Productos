<section id="content">
    <div class="page page-shop-products">
        <div class="row">
            <div class="col-md-12">
                <div class="pageheader">
                    <h2>Productos</h2>
                </div>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <section class="tile">
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font">Edición de <strong>Producto</strong></h1>
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
                        <?php echo form_open(site_url('productos/nuevo')) ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo form_label('Nombre', 'nombre') ?>
                                <?php echo form_input($form['nombre']) ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Cantidad', 'cantidad') ?>
                                <?php echo form_input($form['cantidad']) ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Precio de Venta', 'precio') ?>
                                <?php echo form_input($form['precio']) ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Costo', 'costo') ?>
                                <?php echo form_input($form['costo']) ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Descripción', 'descripcion') ?>
                                <?php echo form_textarea($form['descripcion']) ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_submit($form['enviar']) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo img('producto.png', array('class' => 'img-thumbnail center-block', 'height' => '250', 'width')) ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Fotografía', 'fotografia') ?>
                                <?php echo form_upload($form['fotografia']) ?>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
