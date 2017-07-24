<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('model_product');
        $this->load->library('Ajax_pagination');
        $this->perPage = 9;
    }

    public function index()
    {
        $data['meta_title']      = "Online drinks outlet | Lager, Malt, Stout, Cider | 3m&d";
        $data['navigation']      = "homepage";
        $data['header']          = '_general/header';
        $data['slider']          = '_layout/frontend/slider_menu';
        $data['left_sidebar']    = '_layout/frontend/left_sidebar';
        $data['page_content']    = '_layout/frontend/home';
        $data['footer']          = '_general/footer';

        //total rows count
        $totalRec = count($this->model_product->getRows());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'main/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['featured_items'] = $this->model_product->getRows(array('limit'=>$this->perPage));

        //load the view
        $this->load->view('template', $data);
    }

    function ajaxPaginationData()
    {
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }

        //total rows count
        $totalRec = count($this->model_product->getRows());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'main/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['featured_items'] = $this->model_product->getRows(array('start'=>$offset,'limit'=>$this->perPage));

        //load the view
        $this->load->view('_general/ajax-pagination-data', $data, false);
    }

}
