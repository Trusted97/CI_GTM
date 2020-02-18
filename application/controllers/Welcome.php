<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->ci_gtm->set('test', 1);
        $this->load->view('welcome_message');
    }
}
