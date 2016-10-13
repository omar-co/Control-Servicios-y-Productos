<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Servicios extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->library('form_validation');
        $this->load->model('Servicio_model');
    }

    public function index()
    {
        $this->_data['view'] = 'servicios_view';
        $this->_data['title'] = 'Servicios';
        $this->_data['form'] = $this->_formfields();

        array_unshift($this->_data['estilos'],'jquery.dataTables.min','datatables.bootstrap.min');
        array_push($this->_data['js_footer'],'jquery.dataTables.min','dataTables.bootstrap','input');
        $this->_data['js_code'] = '
            $(document).ready(function(){
    $(\'#servicios\').DataTable();
});
        ';

        $this->form_validation->set_rules($this->Servicio_model->validate);

        if($this->form_validation->run())
        {
            $data = array(
                'nombre'  =>  $this->input->post('nombre'),
                'descripcion'  =>  $this->input->post('descripcion'),
                'precio_venta'  =>  $this->input->post('precio'),
                'costo'  =>  $this->input->post('costo'),
                //'fotografia'  =>  $this->input->post('fotografia'),
                'created_by'=> $this->_ion_auth->id,
                'updated_by'=> $this->_ion_auth->id,
                //'categoria_id'=> 1
            );

            $this->Servicio_model->insert($data);
        }

        $config_table = $this->_config_table();

        $this->table->set_template($config_table);
        $this->table->set_heading(array('ID','Nombre','Precio','Costo','Status','Acciones'));

        $servicios = $this->Servicio_model->select('id,nombre,precio_venta,costo','activo')->get_all();

        foreach($servicios as $servicio)
        {
            $links = anchor(site_url('servicios/editar/' . $servicio->id),'<i class="fa fa-search"></i> Editar','class="btn btn-xs btn-default mr-5"');
            $links .= anchor(site_url('servicios/eliminar/' . $servicio->id),'<i class="fa fa-times"></i> Eliminar','class="btn btn-xs btn-lightred"');

            $status = '<span class="label bg-success">Activo</span>';

            $this->table->add_row(
                $servicio->id,
                $servicio->nombre,
                //number_format($servicio->cantidad,0),
                '$ '.$servicio->precio_venta,
                '$ '. $servicio->costo,
                $status,
                $links
            );
        }

        $this->_data['tabla'] = $this->table->generate();

        $this->_render_page();
    }

    public function editar()
    {
        $this->_data['view'] = 'servicio_editar_view';
        $this->_data['title'] = 'Edición de Servicio';
        $this->_data['form'] = $this->_formfields();

        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->Servicio_model->validate);

        if($this->form_validation->run())
        {
            $data = array(
                'nombre'  =>  $this->input->post('nombre'),
                'descripcion'  =>  $this->input->post('descripcion'),
                'precio_venta'  =>  $this->input->post('precio'),
                'costo'  =>  $this->input->post('costo'),
                'fotografia'  =>  $this->input->post('fotografia'),
                'created_by'=> $this->_ion_auth->id,
                'updated_by'=> $this->_ion_auth->id,
                'categoria_id'=> 1
            );

            $this->Servicio_model->insert($data);
        }

        $this->_render_page();
    }

    private function _formfields()
    {
        return array(
            'nombre' => array(
                'name' => 'nombre',
                'value' => set_value('nombre'),
                'class' => 'form-control',
                'placeholder' => 'Nombre'
            ),
            'descripcion'   =>  array(
                'name'  =>  'descripción',
                'value' =>  set_value('descripcion'),
                'class' =>  'form-control',
                'placeholder'   =>  'Descripcion',
                'rows'  =>  3
            ),
            'precio'   =>  array(
                'name'  =>  'precio',
                'value' =>  set_value('precio'),
                'class' =>  'form-control',
                'placeholder'   =>  'Precio de Venta'
            ),
            'costo'   =>  array(
                'name'  =>  'costo',
                'value' =>  set_value('costo'),
                'class' =>  'form-control',
                'placeholder'   =>  'Costo'
            ),
            'activo'   =>  array(
                '1'  =>  'activo',
                '2' =>  'desactivo'
            ),
            'fotografia'   =>  array(
                'name'  =>  'fotografia',
                'class' =>  'form-control',
            ),
            'enviar'    =>  array(
                'value' =>  'Enviar',
                'class' =>  'btn btn-success'
            )
        );
    }

    private function _config_table()
    {
        return $config_table = array(
            'table_open'            => '<table class="table table-striped table-hover table-custom" id="servicios">',

            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr >',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',

            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',

            'table_close'           => '</table>'
        );
    }

}