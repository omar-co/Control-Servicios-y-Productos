<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Dashboard extends MY_Controller {

public function __construct()
	{
		parent::__construct();
	}
	
public function index()
    {
        $this->_data['view'] = 'dashboard';
        $this->_data['title'] = 'Dashobard';
		$this->_render_page();
    }

}