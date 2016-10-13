
<?php foreach($js_footer as $js){
    echo js($js.'.js');
}
foreach($js_footer_final as $js){
    echo js($js.'.js');
}

if ( ! $js_code == NULL)
{
    echo '<script type="text/javascript">';
    echo $js_code;
    echo  '</script>';
}

?>