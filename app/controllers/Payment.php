<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->model(array('auth_model', 'model_product', 'model_common', 'model_customer', 'model_order', 'model_payment'));
    }

    public function index()
    {
        global $data;

        $post = $this->input->post();
        if ($post) {

            $offset     = 1 * 60 * 60; //converting 5 hours to seconds.
            $dateFormat = "d-m-Y H:i";
            $datetime   = gmdate($dateFormat, time() + $offset);
            $date       = date("F j, Y", strtotime($datetime));

            $order_no = $this->reference_no();

            $insert_pay = $this->model_payment->save($this->input->post(), $date);
            $insert_ord = $this->model_order->save($this->input->post(), $order_no);

            $data = array(
                'public_key'        => 'pk_test_4d7ef1fab447ea0fcc1e09ec9362aca37085fafc',
                'email'             => $_SESSION['w3_email'],
                'first_name'        => $_SESSION['w3_fname'],
                'last_name'         => $_SESSION['w3_lname'],
                'phone'             => $_SESSION['usr_phone'],
                'amount'            => $this->input->post('balance_to_pay'),
                'merch_txnref'      => $this->input->post('merch_txnref'),
                'order_no'          => $order_no,
                'datetime'          => $date
            );

            $payment_option = $this->input->post('payment_option');

            //add send mail function to customers and cc:sales@3mandd.com

            switch ($payment_option) {
                case "bank_transfer":
                    redirect('transactions/BankPayment/'.$data['merch_txnref'].'/'.$data['order_no'].'/'.$data['amount'], 'refresh');
                    break;
                case "paystack":
                    $this->load->view('_general/pay_stack', $data);
                    break;
                case "pay_later":
                    $this->load->view('_general/pay_later', $data);
                    break;
                default:
                    redirect(current_url());
            }
        }
    }

    function parse_number($number, $dec_point=null) {
        if (empty($dec_point)) {
            $locale = localeconv();
            $dec_point = $locale['decimal_point'];
        }
        return floatval(str_replace($dec_point, '.', preg_replace('/[^\d'.preg_quote($dec_point).']/', '', $number)));
    }

    function successful($pay_id)
    {
        global $data;

        $data['meta_title']      = "Payment Successful";
        $data['header']          = '_layout/frontend/pay_header';
        $data['footer']          = '_general/footer';

        $status = 'successful';

        $data = array(
            'status' => $status
        );

        $this->model_payment->update($pay_id, $data);

        $this->load->view('_general/pay_successful', $data);

    }

    function failed($pay_id)
    {
        global $data;

        $data['meta_title']      = "Payment Failed";
        $data['header']          = '_layout/frontend/pay_header';
        $data['footer']          = '_general/footer';

        $status = 'failed';

        $data = array(
                'status' => $status
        );

        $this->model_payment->update($pay_id, $data);

        $this->load->view('_general/pay_failed', $data);
    }

    function reference_no()
    {
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 10; $i++)
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }

        return implode($pass);
    }

}
