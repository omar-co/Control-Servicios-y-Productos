<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Producto_model extends MY_Model {

    public $_table = 'productos';
    protected $soft_delete = TRUE;
    public $validate = array(
        array('field'=>'nombre',
            'label'=>'Nombre',
            'rules'=>'required|trim'),
        array('field'=>'cantidad',
            'label'=>'Cantidad',
            'rules'=>'required|trim'),
        array('field'=>'precio',
            'label'=>'Precio de Venta',
            'rules'=>'required|trim')
    );
    public $belongs_to = array(
        'categoria' => array(
            'model' => 'Categoria_model',
            'primary_key' => 'categoria_id' )
    );
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

    public function __construct()
	    {
		    parent::__construct();
	    }
	


}