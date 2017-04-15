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
			':customer_name' => $_POST['user_name'],
			':email' => $_POST['email'],
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
		// For transaction success
		$connect = mysqli_connect('localhost', 'root', '', 'paymentgateway');
		$user_id = $_SESSION['user'];
		$date = date('Y-m-d');
		$t_id = uniqid();
		$_SESSION['t_id'] = $t_id;
		$total = $_SESSION['total'];
		$query = "INSERT INTO fund_transfer(user_id, transferred_to, amount, fund_date, transaction_id) VALUES ($user_id,'Flip Shop',$total,'$date','$t_id')";
		mysqli_query($connect,$query);
		$currentamt = ($_SESSION['amount'] - $_SESSION['total']);
		$query = "UPDATE users SET balance = $currentamt WHERE user_id = $user_id";
		mysqli_query($connect,$query);

		$query = $this->db->prepare("SELECT customer_id FROM customer WHERE email = :email");
		$query->execute(array(
				'email' => $_POST['email']
			));

		// if ($_POST) {
		// 	# code...
		// 	$msg = 'confirmation key:'.$_SESSION['t_id'];
		// 	mail('sanjeevtamang1@gmail.com', 'Confirmation Key', $msg);
		// }

		//Check if user exists here if not create one and insert all the data
		$data = $query->fetchAll();

		if (empty($data)) {
			# code...
			$query = $this->db->prepare("INSERT INTO customer(customer_name, email, address, password, bank_acc, balance) VALUES (:name,:email,:address,md5(:password),:bank_acc)");

			$getUser = "SELECT * FROM users WHERE user_id = $user_id";
			$fetch = mysqli_query($connect,$getUser);
			while ($row = mysqli_fetch_assoc($fetch)) {
				# code...
				$query->execute(array(
						':name' => $row['user_name'],
						':email' => $row['user_email'],
						':password' => $row['user_password'],
						':address' => $row['user_address'],
						':bank_acc' => $row['bank_accno']
					));
			}
			// print_r($query);
		}

		$query = $this->db->prepare("SELECT customer_id FROM customer WHERE email = :email");
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

		 foreach($_SESSION["shopping_cart"] as $values)  
           {	
           		$date = date('Y-m-d'); 
            	$query = $this->db->prepare("INSERT INTO customer_product(product_id, customer_id,product_quantity,req_date,delivery_time_limit,order_type) VALUES (:product_id,:customer_id,:product_quantity, :req_date,:delivery_time,:order_type)");
				$query->execute(array(
						'product_id' => $values['item_id'],
						'customer_id' => $id,
						'product_quantity' =>  $values['item_quantity'],
						'req_date' => $date,
						'delivery_time' => date('Y-m-d', strtotime("+7 days")),
						'order_type' => 'cashdelivery'
					));
			}
	}
}