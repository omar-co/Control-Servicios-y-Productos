<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $title ?></title>
<link rel="icon" type="image/ico" href="assets/images/favicon.ico"/>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Stylesheets-->

<?php foreach ($estilos as $css) {
    echo css($css . '.css');
} ?>

<?php foreach ($js_head as $js) {
    echo js($js . '.js');
} ?>