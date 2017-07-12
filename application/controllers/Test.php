<?php
class Test extends CI_Controller {
    public function __construct() {
        parent::__construct();
        ini_set('max_execution_time', 300);
    }

    public function index() {
        $this->load->view('tesy');
//        $this->load->view('tesy');
    }
    public function b() {
        $this->load->view('tesy');
    }
    
}

