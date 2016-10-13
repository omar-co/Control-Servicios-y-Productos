<?php

/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 27/09/2016
 * Time: 0:37
 */
class MY_Controller extends CI_Controller
{
    public $_data = array();

    public $_ion_auth;


    /**
     * MY_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->_data['estilos'] = array(
            'bootstrap.min',
            'animate',
            'font-awesome',
            'animsition.min',
            'main'
        );
        $this->_data['js_head'] = array('modernizr-2.8.3-respond-1.4.2.min');
        $this->_data['js_footer'] = array(
            'jquery-1.11.2.min',
            'bootstrap.min',
            'toastr.min',
            'jRespond.min',
            'jquery.sparkline.min',
            'jquery.slimscroll.min',
            'jquery.animsition.min'
        );
        $this->_data['js_footer_final'] = array(
            'main'
        );
        $this->_data['js_code'] = NULL;

        if(!$this->ion_auth->logged_in())
        {
            $this->session->set_flashdata('mensaje','No tienes permisos.<p>Por favor Inicia Sesión.');
            redirect('login');
        }

        $this->_ion_auth = $this->ion_auth->user()->row();
        $this->output->enable_profiler(FALSE);
    }

    protected function _render_page($data = null, $returnhtml = false)//I think this makes more sense
    {
        if (!empty($data))
        {
            $this->viewdata = $data;
        }else{
            $this->viewdata =  $this->_data;
        }

        $view_html = $this->load->view('base/general_view', $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
    }


    public function _mensaje()
    {
        if($this->session->flashdata())
        {
            if ($this->session->flashdata('error'))
            {
                return 'toastr.error("' . $this->session->flashdata('error') . '");';
            }
            if ($this->session->flashdata('notificacion'))
            {
                return 'toastr.warning("' . $this->session->flashdata('notificacion') . '");';
            }
            if ($this->session->flashdata('exito'))
            {
                return 'toastr.success("' . $this->session->flashdata('exito') . '");';
            }
            if ($this->session->flashdata('info'))
            {
                return 'toastr.info("' . $this->session->flashdata('info') . '");';
            }

        }

        return FALSE;
    }
}