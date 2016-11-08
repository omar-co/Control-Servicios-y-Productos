<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Ingreso_categorias_model extends MY_Model {

    public $_table = 'ingresos_categorias';
    protected $soft_delete = TRUE;
    public $validate = array(
        array('field'=>'nombre',
            'label'=>'Nombre',
            'rules'=>'required|trim'),
    );

    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

    public function __construct()
    {
        parent::__construct();
    }



}