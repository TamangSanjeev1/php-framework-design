<?php
/**
* 
*/
class Order_Model extends Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function savePaymentOnDelivery(){	
		$query = $this->db->prepare("INSERT INTO customer(customer_name, email, phone, address, city, postal_code) VALUES(:customer_name,:email,:phone,:address,:city,:postal_code)");
		$query->execute(array(
			':customer_name' => $_POST['email'],
			':email' => $_POST['user_name'],
			':phone' => $_POST['phone'],
			':address' => $_POST['address'],
			':city' => $_POST['city'],
			':postal_code' => $_POST['postal_code']
		));	

		$sth = $this->db->prepare('SELECT customer_id FROM customer ORDER BY customer_id DESC LIMIT 1;');
		$sth->execute();
		$customer_id = $sth->fetchAll();

		 foreach($_SESSION["shopping_cart"] as $values)  
           {	
           		$date = date('Y-m-d'); 
            	$query = $this->db->prepare("INSERT INTO customer_product(product_id, customer_id,product_quantity,req_date,delivery_time_limit) VALUES (:product_id,:customer_id,:product_quantity, :req_date,:delivery_time)");
				$query->execute(array(
						'product_id' => $values['item_id'],
						'customer_id' => $customer_id[0]['customer_id'] ,
						'product_quantity' =>  $values['item_quantity'],
						'req_date' => $date,
						'delivery_time' => date('Y-m-d', strtotime("+7 days"))
					));        
			}
	}

	public function transactionConfirmation(){
		$query = $this->db->prepare("SELECT user_id FROM users WHERE email = :email");
		$query->execute(array(
				'email' => $_POST['email']
			));

		$data = $query->fetchAll();
		$id = $data[0][0];
		$query = $this->db->prepare("INSERT INTO payment(transaction_id, payed_amt, user_id) VALUES (:transaction_id,:payment_amt,:user_id)");
		$query->execute(array(
				'transaction_id' => $_POST['transaction_id'],
				'payment_amt' => $_POST['amount'],
				'user_id' => $id
			));
	}
}