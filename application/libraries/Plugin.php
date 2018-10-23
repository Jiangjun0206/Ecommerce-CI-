<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Plugin
{

    private $CI;


    public function __construct()
    {
        $this->CI =& get_instance();
        //$this->CI->load->library('aauth');

    }

    public function get_display($controller,$method){
        //$data = modules::run($controller.'/'.$method);
        //$data = modules::load($controller.'/'.$controller)->$method();

        return $data;
    }


}