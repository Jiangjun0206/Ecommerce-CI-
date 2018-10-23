<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Pages
 * @author Admin
 */
class Admin extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        redirect('user');
    }
}