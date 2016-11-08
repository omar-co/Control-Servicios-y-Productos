<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Usuarios extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));

        $this->load->helper(array('form'));
    }

    public function index()
    {
        array_unshift($this->_data['estilos'],'jquery.dataTables.min','datatables.bootstrap.min');
        array_push($this->_data['js_footer'],'jquery.dataTables.min','dataTables.bootstrap','input');
        $this->_data['js_code'] = '
            $(document).ready(function(){
    $(\'#usuarios\').DataTable();
});
 ';
      if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('Debes de ser un Administrador para ver esta sección.');
        }
        else
        {
            // set the flash data error message if there is one
            $this->_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $this->_data['users'] = $this->ion_auth->users()->result();
            foreach ($this->_data['users'] as $k => $user)
            {
                $this->_data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }

            $this->_data['title'] = 'Usuarios';
            $this->_data['view'] = 'usuarios_view';
            $this->_render_page();
        }

    }

}