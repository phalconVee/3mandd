<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->model(array('auth_model', 'model_product', 'model_common', 'model_customer', 'model_order', 'model_payment'));
    }

    public function BankPayment($txnref, $order_no, $amount)
    {
        $this->cart->destroy();

        $data['meta_title']      = "Online drinks outlet | Lager, Malt, Stout, Cider | 3m&d";
        $data['navigation']      = "banktransfer";
        $data['header']          = '_general/header';
        $data['footer']          = '_general/footer';

        $data['transaction_ref'] = $txnref;
        $data['order_no']        = $order_no;
        $data['amount']          = $amount;

        $this->load->view('_general/bank_transfer', $data);
    }
}
