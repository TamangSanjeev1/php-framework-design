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
            	$query = $this->db->prepare("INSERT INTO customer_product(product_id, customer_id,product_quantity,req_date) VALUES (:product_id,:customer_id,:product_quantity, :req_date)");
				$query->execute(array(
						'product_id' => $values['item_id'],
						'customer_id' => $customer_id[0]['customer_id'] ,
						'product_quantity' =>  $values['item_quantity'],
						'req_date' => $date
					));        
			}
	}
}