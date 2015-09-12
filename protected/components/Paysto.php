<?php

class Paysto extends CApplicationComponent
{
	
	public $shop_id;
	public $secret_key;
	
	public function init()
	{
	
		
	}
	
	
	
	public function genere_form($data){
	
		
	
	
		echo "<form id='pay-form-pay' accept-charset='UTF-8' method='POST' action='https://paysto.com/ru/pay'>
		<input type='hidden' name='PAYSTO_SHOP_ID' value='{$this->shop_id}'>
		<input type='hidden' name='PAYSTO_SUM' value='{$data['summ']}'>
		<input type='hidden' name='PAYSTO_INVOICE_ID' value='{$data['order_id']}'>
		<input type='hidden' name='PAYSTO_DESC' value='{$data['description']}'>
		<input type='hidden' name='PayerEMail' value='your@email.com'>
		</form><script type='text/javascript'>document.getElementById('pay-form-pay').submit()</script>";
	
	}
	
	
	private function check_hash() {
	
	
		$params = $_POST;
	
		$hash = $_POST['PAYSTO_MD5'];
	
		unset($params['PAYSTO_MD5']);
		uksort($params, 'strcasecmp');
		$temp = array();
		foreach ($params as $param => $val)
			$temp[] = "$param=$val";
		$temp[] = $this->secret_key;
		$my_hash = strtoupper(md5(implode('&', $temp)));
		
		//file_put_contents('test_my_hash', $my_hash);
		//file_put_contents('test_callback_hash', $hash);
		
	
	
		if ($my_hash !== $hash) {
			return false;
		}else{
	
			return $_POST['PAYSTO_INVOICE_ID'];
		}
	}
	
	public function check_paid(){
		
		return $this->check_hash();
	}
}