<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <title>El Camerino Beaty Lab - Inicio de Sesión</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css"/>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.css"/>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/theme_styles.css"/>


  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

  <link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
  <!--[if lt IE 9]>
  <script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
  <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
  <![endif]-->

</head>
<body id="login-page">
<div id="login-fuldl-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div id="login-box">
          <div id="login-box-holder">
            <div class="row">
              <div class="col-xs-12">
                <header id="login-header">
                  <div id="login-logo">
                    <img src="<?php echo base_url() ?>assets/img/logo-login.png" alt=""/>
                  </div>
                </header>
                <div id="login-box-inner">
                    <?php if($message) { ?>
                    <div class="alert alert-danger">

                        <p class="text-center"><?php echo $message ?>.</p>
                    </div>
                    <?php } ?>
                    <?php echo form_open("auth/login");?>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <?php echo form_input($identity, '','class="form-control" placeholder="Email"');?>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <?php echo form_input($password, '','class="form-control" placeholder="Contraseña"');?>
                    </div>
                    <div id="remember-me-wrapper">
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="checkbox-nice">
                              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember-me"');?>
                            <label for="remember-me">
                              Recordarme
                            </label>
                          </div>
                        </div>
                        <a href="#" id="login-forget-link" class="col-xs-6">
                          ¿Olvidaste tu Contraseña?
                        </a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <button type="submit" class="btn btn-success col-xs-12">Iniciar Sesión</button>
                      </div>
                    </div>
                    <?php echo form_close();?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
</body>
</html>
<?php  form_submit('submit', lang('login_submit_btn'));?>
