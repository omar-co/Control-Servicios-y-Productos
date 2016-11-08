<section id="content">
    <div class="page page-shop-products">
        <div class="row">
            <div class="col-md-12">
                <div class="pageheader">
                    <h2>Gastos</h2>
                </div>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <section class="tile">
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font">Listado de <strong>Gastos</strong></h1>
                    <ul class="controls">
                        <li><a class="btn-link" href="#myModal" data-toggle="modal"><i class="fa fa-plus mr-5"></i>
                                Nuevo Gasto</a></li>

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
                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="tile-body">
                    <div class="table-responsive">
                        <?php echo $tabla ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open(site_url('gastos')) ?>
            <div class="modal-header">
                <h3 class="modal-title custom-font">Nuevo Gasto</h3>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-7 col-md-offset-2">
                        <div class="form-group">
                            <?php echo form_label('Descripción', 'descripcion') ?>
                            <?php echo form_input($form['descripcion']) ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Cantidad', 'cantidad') ?>
                            <?php echo form_input($form['cantidad']) ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Fecha', 'fecha') ?>
                            <?php echo form_input($form['fecha']) ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Categoría', 'categoria') ?>
                            <?php echo form_dropdown($form['categoria']) ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit($form['enviar']) ?>
                <button class="btn btn-lightred" data-dismiss="modal"> Cancelar</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>