<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	 function __construct() {
    	parent::__construct();
		global $data;
		//load site details globally
		$data['site_url']      = base_url();
		$data['site_name']     = $this->config->item('site_name');
		$data['assets_folder'] = $this->config->item('theme_files');
		$data['admin_email']   = $this->config->item('admin_email');
		$data['admin_name']    = $this->config->item('admin_name');
		
		if(empty($_SESSION['w3_user_id']) || empty($_SESSION['w3_admin_id'])) {

		} elseif(!empty($_SESSION['w3_user_id'])) {
		   $data['w3_uid']       = $_SESSION['w3_user_id'];
		   $data['w3_logged_in'] = $_SESSION['w3_logged_in'];
		   //$data['slider_product'] = $this->common_model->slider_products();
		   //$data['featured']       = $this->common_model->featured_products();
		   //$data['recommended']    = $this->common_model->recommended_products();

		   //update online time
		   $this->model_common->update_online_status();

		}elseif(!empty($_SESSION['w3_admin_id'])){
			$data['w3_admin_id']  = $_SESSION['w3_admin_id'];
			$data['w3_logged_in'] = $_SESSION['w3_logged_in'];
			$data['total_unread_msgs'] = $this->model_common->total_unread_msgs();
		}
	 }
	 
	 function logged_in()
	 {
		 global $data;
		 if(empty($data['w3_uid'])) {
		  redirect('login', 'refresh');
		 } 
	 }
	 
	 function send_email($to, $subject, $message)
	 {
		global $data;
		$this->load->library('email');
		$this->email->from($data['admin_email'], $data['site_name']);
		$this->email->reply_to($data['admin_email'], $data['site_name']);
		$this->email->to($to);
		$this->email->bcc("ugostein1000@gmail.com");
		$this->email->subject($subject);
		$this->email->message($message);	
		$this->email->send();
		return true;
	 }


	function total_cart_qty()
	{
		$sum = 0;
		foreach ($this->cart->contents() as $items){

			$sum += $items['qty'];

		}

		return $sum;
	}

	/**
	 * @return int
	 * get all the empty quantity added to cart
	 */
	function emptyQty()
	{
		$sum = 0;
		foreach ($this->cart->contents() as $items){

			$class = $items['options']['class'];

			if($class == 1):
				$sum += $items['qty'];
			endif;
		}

		return $sum;
	}

	/**
	 * @return int
	 * get all the empty returns added to cart
	 */
	function emptyReturns()
	{
		$sum = 0;
		foreach ($this->cart->contents() as $items){
			$sum += $items['options']['return_qty'];
		}

		return $sum;
	}

	/**
	 * @return int
	 * empty value = empty qty * 1000
	 */
	function emptyValue()
	{
		$sum = 0;
		foreach ($this->cart->contents() as $items){

			$class = $items['options']['class'];

			if($class == 1):
				$sum += $items['qty'];
			endif;
		}

		return $val = $sum * 1000;
	}

	/**
	 * @return int
	 * total liquid content value
	 * full value = summation of (qty * price) of individual items in cart
	 */
	function fullValue()
	{
		//full value = total qty * price
		$result = 0;
		foreach ($this->cart->contents() as $items) {

			$class = $items['options']['class'];

			$result += $items['qty'] * $items['price'];
		}

		return $result;
	}

	/**
	 * @return int
	 * total value = empty value + full value
	 */
	function totalValue()
	{
		$output = $this->emptyValue() + $this->fullValue();
		return $output;
	}

	/**
	 * @return int
	 * empty return value = total empty returns * 1000
	 */
	function emptyReturnValue()
	{
		$output = $this->emptyReturns() * 1000;
		return $output;
	}

	/**
	 * @return int
	 * overall balance left to pay after empties deductions
	 */
	function balanceToPay()
	{
		$output = $this->totalValue() - $this->emptyReturnValue();
		return $output;
	}

	function applyHostCharge()
	{
		$default = 500;
		$output = $this->balanceToPay() + $default;
		return $output;
	}

}