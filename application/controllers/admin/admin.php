<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: nagaraj.k
 * Date: 9/1/15
 * Time: 5:24 PM
 * To change this template use File | Settings | File Templates.
 */

class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('page_adders/header');
        $this->load->view('page_adders/sidebar_menu');
        $this->load->view('admin/index');
        $this->load->view('page_adders/footer');

    }
}
?>