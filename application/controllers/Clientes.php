<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Clientes extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->library('form_validation');
        $this->load->model('Cliente_model');
    }

    public function index()
    {
        $this->_data['view'] = 'clientes_view';
        $this->_data['title'] = 'Clientes';
        $this->_data['form'] = $this->_formfields();

        array_unshift($this->_data['estilos'],'jquery.dataTables.min','datatables.bootstrap.min');
        array_push($this->_data['js_footer'],'jquery.dataTables.min','dataTables.bootstrap','input');
        $this->_data['js_code'] = '
            $(document).ready(function(){
    $(\'#clientes\').DataTable();
});
        ';

        $this->form_validation->set_rules($this->Cliente_model->validate);

        if($this->form_validation->run())
        {
            $data = array(
                'nombre'  =>  $this->input->post('nombre'),
                'apellidos'  =>  $this->input->post('apellidos'),
                'telefono1'  =>  $this->input->post('telefono1'),
                'telefono2'  =>  $this->input->post('telefono2'),
                'email'  =>  $this->input->post('email'),
                'created_by'=> $this->_ion_auth->id,
                'updated_by'=> $this->_ion_auth->id,
                //'categoria_id'=> 1
            );

            $this->Cliente_model->insert($data);
        }

        $config_table = $this->_config_table();

        $this->table->set_template($config_table);
        $this->table->set_heading(array('ID','Nombre','Apellidos','Tel Fijo','Tel Cel','Email','Estatus','Acciones'));

        $clientes = $this->Cliente_model->select('id,nombre,apellidos,telefono1,telefono2,email','activo')->get_all();

        foreach($clientes as $cliente)
        {
            $links = anchor(site_url('clientes/editar/' . $cliente->id),'<i class="fa fa-search"></i> Editar','class="btn btn-xs btn-default mr-5"');
            $links .= anchor(site_url('clientes/eliminar/' . $cliente->id),'<i class="fa fa-times"></i> Eliminar','class="btn btn-xs btn-lightred"');

            $status = '<span class="label bg-success">Activo</span>';

            $this->table->add_row(
                $cliente->id,
                $cliente->nombre,
                $cliente->apellidos,
                $cliente->telefono1,
                $cliente->telefono2,
                $cliente->email,
                $status,
                $links
            );
        }

        $this->_data['tabla'] = $this->table->generate();

        $this->_render_page();
    }

    public function editar()
    {
        $this->_data['view'] = 'cliente_editar_view';
        $this->_data['title'] = 'Edición de Cliente';
        $this->_data['form'] = $this->_formfields();

        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->Cliente_model->validate);

        if($this->form_validation->run())
        {
            $data = array(
                'nombre'  =>  $this->input->post('nombre'),
                'apellidos'  =>  $this->input->post('apellidos'),
                'telefono1'  =>  $this->input->post('telefono1'),
                'telefono2'  =>  $this->input->post('telefono2'),
                'email'  =>  $this->input->post('email'),
                'created_by'=> $this->_ion_auth->id,
                'updated_by'=> $this->_ion_auth->id
            );

            $this->Cliente_model->insert($data);
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
            'apellidos'   =>  array(
                'name'  =>  'apellidos',
                'value' =>  set_value('apellidos'),
                'class' =>  'form-control',
                'placeholder'   =>  'Apellidos'
            ),
            'telefono1'   =>  array(
                'name'  =>  'telefono1',
                'value' =>  set_value('telefono1'),
                'class' =>  'form-control',
                'placeholder'   =>  'Telefono Fijo'
            ),
            'telefono2'   =>  array(
                'name'  =>  'telefono2',
                'value' =>  set_value('telefono2'),
                'class' =>  'form-control',
                'placeholder'   =>  'Telefono Celuar'
            ),
            'email'   =>  array(
                'name'  =>  'email',
                'value' =>  set_value('email'),
                'class' =>  'form-control',
                'placeholder'   =>  'Email'
            ),
            'activo'   =>  array(
                '1'  =>  'activo',
                '2' =>  'desactivo'
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
            'table_open'            => '<table class="table table-striped table-hover table-custom" id="clientes">',

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