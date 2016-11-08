<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Gastos extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->library('form_validation');
        $this->load->model('Gasto_model');
        $this->load->model('Gasto_categorias_model');
    }

    public function index()
    {
        $this->_data['view'] = 'gastos_view';
        $this->_data['title'] = 'Gastos';
        $this->_data['form'] = $this->_formfields();

        array_unshift($this->_data['estilos'],'jquery.dataTables.min','datatables.bootstrap.min');
        array_push($this->_data['js_footer'],'jquery.dataTables.min','dataTables.bootstrap','input');
        $this->_data['js_code'] = '
            $(document).ready(function(){
    $(\'#gastos\').DataTable();
});
        ';

        $this->form_validation->set_rules($this->Gasto_model->validate);

        if($this->form_validation->run())
        {
            $data = array(
                'descripcion'  =>  $this->input->post('descripcion'),
                'cantidad'  =>  $this->input->post('cantidad'),
                'fecha'  =>  $this->input->post('fecha'),
                'categoria_id'  =>  $this->input->post('categoria'),
                'created_by'=> $this->_ion_auth->id,
                'updated_by'=> $this->_ion_auth->id
            );

            $this->Gasto_model->insert($data);
        }

        $config_table = $this->_config_table();

        $this->table->set_template($config_table);
        $this->table->set_heading(array('ID','Descripción','Cantidad','Fecha', 'Categoria','Acciones'));

        $gastos = $this->Gasto_model->select('id,descripcion,cantidad,fecha,categoria_id')->get_all();

        foreach($gastos as $gasto)
        {
            $links = anchor(site_url('gastos/editar/' . $gasto->id),'<i class="fa fa-search"></i> Editar','class="btn btn-xs btn-default mr-5"');
            $links .= anchor(site_url('gastos/eliminar/' . $gasto->id),'<i class="fa fa-times"></i> Eliminar','class="btn btn-xs btn-lightred"');

            $this->table->add_row(
                $gasto->id,
                $gasto->descripcion,
                $gasto->cantidad,
                $gasto->fecha,
                $gasto->categoria_id,
                $links
            );
        }

        $this->_data['tabla'] = $this->table->generate();

        $this->_render_page();
    }

    public function editar()
    {
        $this->_data['view'] = 'gasto_editar_view';
        $this->_data['title'] = 'Edición de Gasto';
        $this->_data['form'] = $this->_formfields();

        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->Gasto_model->validate);

        if($this->form_validation->run())
        {
            $data = array(
                'descripcion'  =>  $this->input->post('descripcion'),
                'cantidad'  =>  $this->input->post('cantidad'),
                'fecha'  =>  $this->input->post('fecha'),
                'categoria_id'  =>  $this->input->post('categoria'),
                'created_by'=> $this->_ion_auth->id,
                'updated_by'=> $this->_ion_auth->id
            );

            $this->Gasto_model->insert($data);
        }

        $this->_render_page();
    }

    public function categorias()
    {
        $this->_data['view'] = 'gastos_categorias_view';
        $this->_data['title'] = 'Categorías - Gastos';
        $this->_data['form'] = $this->_formfields_categorias();

        array_unshift($this->_data['estilos'],'jquery.dataTables.min','datatables.bootstrap.min');
        array_push($this->_data['js_footer'],'jquery.dataTables.min','dataTables.bootstrap','input');
        $this->_data['js_code'] = '
            $(document).ready(function(){
    $(\'#categorias\').DataTable();
});
        ';

        $this->form_validation->set_rules($this->Gasto_categorias_model->validate);

        if($this->form_validation->run())
        {
            $data = array(
                'nombre'  =>  $this->input->post('nombre'),
                'descripcion'  =>  $this->input->post('descripcion'),
                'created_by'=> $this->_ion_auth->id,
                'updated_by'=> $this->_ion_auth->id
            );

            $this->Gasto_categorias_model->insert($data);
        }

        $config_table = $this->_config_table_categorias();

        $this->table->set_template($config_table);
        $this->table->set_heading(array('ID','Nombre','Descripción','Acciones'));

        $categorias = $this->Gasto_categorias_model->select('id,nombre,descripcion')->get_all();

        foreach($categorias as $categoria)
        {
            $links = anchor(site_url('gastos/categorias/editar/' . $categoria->id),'<i class="fa fa-search"></i> Editar','class="btn btn-xs btn-default mr-5"');
            $links .= anchor(site_url('gastos/categorias/eliminar/' . $categoria->id),'<i class="fa fa-times"></i> Eliminar','class="btn btn-xs btn-lightred"');

            $this->table->add_row(
                $categoria->id,
                $categoria->nombre,
                $categoria->descripcion,
                $links
            );
        }

        $this->_data['tabla'] = $this->table->generate();

        $this->_render_page();
    }

    private function _formfields()
    {
        $cat = $this->Gasto_categorias_model->select('id, nombre')->get_all();

        foreach($cat as $categoria)
        {
            $categorias[$categoria->id] = $categoria->nombre;
        }


        return array(
            'descripcion' => array(
                'name' => 'descripcion',
                'value' => set_value('descripcion'),
                'class' => 'form-control',
                'placeholder' => 'Descripción'
            ),
            'cantidad'   =>  array(
                'name'  =>  'cantidad',
                'value' =>  set_value('cantidad'),
                'class' =>  'form-control',
                'placeholder'   =>  'Cantidad'
            ),
            'fecha'   =>  array(
                'name'  =>  'fecha',
                'value' =>  set_value('fecha'),
                'class' =>  'form-control',
                'placeholder'   =>  'Fecha'
            ),
            'categoria'   =>  array(
                'name'  =>  'categoria',
                'value' =>  set_select('categoria'),
                'class' =>  'form-control',
                'placeholder'   =>  'Categoría',
                'options'   => $categorias
            ),
            'enviar'    =>  array(
                'value' =>  'Enviar',
                'class' =>  'btn btn-success'
            )
        );
    }

    private function _formfields_categorias()
    {
        return array(
            'descripcion' => array(
                'name' => 'descripcion',
                'value' => set_value('descripcion'),
                'class' => 'form-control',
                'placeholder' => 'Descripción'
            ),
            'nombre'   =>  array(
                'name'  =>  'nombre',
                'value' =>  set_value('nombre'),
                'class' =>  'form-control',
                'placeholder'   =>  'Nombre'
            ),
            'fecha'   =>  array(
                'name'  =>  'fecha',
                'value' =>  set_value('fecha'),
                'class' =>  'form-control',
                'placeholder'   =>  'Fecha'
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
            'table_open'            => '<table class="table table-striped table-hover table-custom" id="gastos">',

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

    private function _config_table_categorias()
    {
        return $config_table = array(
            'table_open'            => '<table class="table table-striped table-hover table-custom" id="categorias">',

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