<?php
/**
* 
*/
class User_Model extends Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function salesReport($value = null){
		$date = date('Y-m-1');
		$query = $this->db->prepare("SELECT products.product_name,customer.customer_name,customer_product.product_quantity, customer_product.delivered_date FROM customer_product JOIN products ON products.product_id = customer_product.product_id JOIN customer ON customer.customer_id = customer_product.customer_id JOIN users ON products.user_id = users.user_id WHERE customer_product.status = 'delivered' AND customer_product.delivered_date BETWEEN :start_date AND :end_date AND users.user_id = :user_id"); 

		if ($value) {
			# code..
			$query->execute(array(
				'start_date' => $value,
				'end_date' => date('Y-m-d'),
				'user_id' => $_SESSION['user']
			));
		}else{
			$query->execute(array(
				'start_date' => $date,
				'end_date' => date('Y-m-d'),
				'user_id' => $_SESSION['user']
			));
		}
		
		$report = $query->fetchAll();
		return $report;
	}	

	function deliveryCheckout($id){
		$query = $this->db->prepare("UPDATE customer_product SET status = 'delivered', delivered_date = :delivered_date WHERE cust_product_id = :id");
		$query->execute(array(
			'delivered_date' => date('Y-m-d'),
			'id' => $id 
		));
	}

	function deliveredProductList(){
		$query = $this->db->prepare("SELECT customer_product.cust_product_id, products.product_name, customer.customer_name, customer_product.product_quantity, customer_product.req_date, customer_product.delivery_time_limit d_limit, customer_product.delivered_date FROM customer_product JOIN products ON products.product_id = customer_product.product_id JOIN customer ON customer.customer_id = customer_product.customer_id JOIN users ON users.user_id = products.user_id WHERE users.user_id = :id AND status = 'Delivered' AND order_type is null");
		$query->execute(array(
				'id' => $_SESSION['user']
			));
		$list = $query->fetchAll();
		return $list;
	}

	function onlinePaymentDeliveredProductList(){
		$query = $this->db->prepare("SELECT customer_product.cust_product_id, products.product_name, customer.customer_name, customer_product.product_quantity, customer_product.req_date, customer_product.delivery_time_limit d_limit, customer_product.delivered_date FROM customer_product JOIN products ON products.product_id = customer_product.product_id JOIN customer ON customer.customer_id = customer_product.customer_id JOIN users ON users.user_id = products.user_id WHERE users.user_id = :id AND status = 'Delivered' AND order_type = 'cashdelivery'");
		$query->execute(array(
				'id' => $_SESSION['user']
			));
		$list = $query->fetchAll();
		return $list;
	}

	function getOrderRequest(){
		$query = $this->db->prepare("SELECT DISTINCT customer.customer_id,customer.customer_name FROM customer INNER JOIN customer_product ON customer_product.customer_id = customer.customer_id INNER JOIN products ON products.product_id = customer_product.product_id INNER JOIN users ON users.user_id = products.user_id WHERE users.user_id = :id AND status is null AND order_type is null");
        $query->execute(array(
                ':id' => $_SESSION['user'] 
            ));
        $orders = $query->fetchAll();
        return $orders;
	}

	function getOnlinePaymentRequest(){
		$query = $this->db->prepare("SELECT DISTINCT customer.customer_id,customer.customer_name FROM customer INNER JOIN customer_product ON customer_product.customer_id = customer.customer_id INNER JOIN products ON products.product_id = customer_product.product_id INNER JOIN users ON users.user_id = products.user_id WHERE users.user_id = :id AND status is null AND order_type = 'cashdelivery'");
        $query->execute(array(
                ':id' => $_SESSION['user'] 
            ));
        $orders = $query->fetchAll();
        return $orders;
	}

	function getCustomerOrder($id){
		$query = $this->db->prepare("SELECT customer_product.cust_product_id, products.product_name, customer.customer_name, customer_product.product_quantity, customer_product.req_date, customer_product.delivery_time_limit d_limit, IFNULL(status,'Not Delivered') status FROM customer_product JOIN products ON products.product_id = customer_product.product_id JOIN customer ON customer.customer_id = customer_product.customer_id JOIN users ON users.user_id = products.user_id WHERE customer.customer_id = :id");
		 $query->execute(array(
                ':id' => $id 
            ));
        $custOrder = $query->fetchAll();
        return $custOrder;
	}

	function getStockNotification(){
        $query = $this->db->prepare("SELECT product_id, product_name, product_quantity FROM products WHERE product_quantity = 0 AND user_id = :id");
        $query->execute(array(
                ':id' => $_SESSION['user'] 
            ));
        $notice = $query->fetchAll();
        return $notice;
    }
    
    function getChartValues(){
    	$date = date('Y-m-d'); 
    	$query = $this->db->prepare("SELECT product_quantity, req_date FROM customer_product WHERE req_date BETWEEN :start_date AND :end_date");
    	$query->execute(array(
    		'start_date' => date('Y-m-1'),
    		'end_date' => $date 
    		));
    	$data = array(); 
    	$data = $query->fetchAll();
    	return $data;
    }

	public function storeItem(){	
		$listno = $this->db->prepare("SELECT product_cat_id FROM product_category WHERE product_cat_name = :cat_name");
		$listno->execute(array(':cat_name' => $_POST['category']));	
		$cat_no = $listno->fetchAll();	

		$query = $this->db->prepare("INSERT INTO products(product_name, product_quantity, product_price, product_details, product_brand, user_id, product_cat_id) VALUES (:product_name,:product_quantity,:product_price,:product_details,:product_brand,:user_id,:product_cat)");
		$pr_name = $_POST['product_name'];
		$pr_qntity = $_POST['quantity'];

		$query->execute(array(':product_name' => $pr_name, ':product_quantity' => $pr_qntity, ':product_price' => $_POST['price'],':product_details' => $_POST['detail'], ':product_brand' => $_POST['brand'], ':user_id' => $_SESSION['user'], ':product_cat' => $cat_no[0][0]));	

		$sth = $this->db->prepare("SELECT `product_id` FROM products ORDER BY `product_id` DESC LIMIT 1");
		$sth->execute(); 
		$product_info = $sth->fetchAll();
		$pr_id = $product_info[0]['product_id'];

		$query = $this->db->prepare("INSERT INTO product_images(image_name, product_id) VALUES (:img_name,:product_id)");

		if (MassUpload::$uploadOk == 0) {
            $_SESSION['error'] = "Sorry, your file was not uploaded.";
            exit;
        // if everything is ok, try to Massupload file
        } else {
            // print_r(MassUpload::$files["fileToUpload"]["name"]);
            $size = sizeof(MassUpload::$files["fileToUpload"]["name"]);
            for ($i=0; $i < sizeof(MassUpload::$files["fileToUpload"]["name"]) ; $i++) { 
                # code...
                MassUpload::$image[$i] = str_replace(' ','',basename(MassUpload::$files["fileToUpload"]["name"][$i]));
            }

            $count = 0;
            foreach (MassUpload::$image as $value) {
                # code...
                // print_r($value);

                if($query->execute(array(':img_name' => $value,':product_id' => $pr_id))){        
                    if (move_uploaded_file(MassUpload::$files["fileToUpload"]["tmp_name"][$count], MassUpload::$target_file[$count])) {
                        // echo "The files ". basename( MassUpload::$files["fileToUpload"]["name"][$count]). " has been Massuploaded.";

                        if ($count === $size) {
                            # code...
                            return true;
                        }

                        $count++;
                        
                    } else {
                    	$_SESSION['error'] = "Sorry, there was an error uploading your file.";
                    }    
                }else{
                    $_SESSION['error'] =  "Failed to Massupload";
                }
            }            
        }
	}

	function listItems(){
		$sth = $this->db->prepare('SELECT users.user_id,products.product_name,products.product_id,products.product_quantity, products.product_price, product_category.product_cat_name, products.product_details ,product_images.image_name FROM products INNER JOIN users ON products.user_id=users.user_id JOIN product_category ON products.product_cat_id = product_category.product_cat_id JOIN product_images ON product_images.product_id = products.product_id WHERE products.user_id = :user_id');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(
			':user_id' => $_SESSION['user']
		));
		$data = $sth->fetchAll();
		// return json_encode($data);
		return $data;
	}


	function listItem($id){
		$sth = $this->db->prepare('SELECT * FROM products WHERE product_id = :product_id');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(
			':product_id' => $id
		));
		$data = $sth->fetchAll();
		// return json_encode($data);
		return $data;
	}

	function updateProduct($id){
		$listno = $this->db->prepare("SELECT product_cat_id FROM product_category WHERE product_cat_name = :cat_name");
		$listno->execute(array(':cat_name' => $_POST['category']));	
		$cat_no = $listno->fetchAll();	

		$query = $this->db->prepare("UPDATE products SET product_name = :p_name,product_quantity= :p_quantity, product_price = :p_price, product_details = :p_details, product_brand = :p_brand, product_cat_id = :product_cat WHERE product_id = :id");
			$query->execute(array(
				':p_name' => $_POST['product_name'],
				':p_quantity' => $_POST['quantity'],
				':p_price' => $_POST['price'],
				':p_details' => $_POST['detail'],
				':p_brand' => $_POST['brand'],
				':product_cat' => $cat_no[0][0],
				'id' => $id
			));
		
	}

	function itemType(){
		$sth = $this->db->prepare('SELECT * FROM product_category');
		$sth->execute();
		$category = $sth->fetchAll();

		return $category;
	}

	// function deleteUsers($id){ 
	// 	$query = $this->db->prepare("DELETE FROM users WHERE user_id = :id");
	// 	$query->execute(array(
	// 			'id' => $id
	// 		));
	// }

	function userProfile(){
		$sth = $this->db->prepare('SELECT users.user_name, users.email, users.phone_number, users.address, users.date_added, company.company_name, company.company_address, company.company_phone,company.company_image FROM company JOIN users ON company.user_id = users.user_id WHERE users.user_id = :id');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(
			':id' => $_SESSION['user']
		));
		$data = $sth->fetchAll();
		// return json_encode($data);
		return $data;	
	}

	function updateProfile($id, $psswrd = null){
		$query = $this->db->prepare("UPDATE company SET company_name = :c_name,company_address= :c_address, company_phone = :c_phone WHERE user_id = :id");
			$query->execute(array(
				':c_name' => $_POST['company_name'],
				':c_address' => $_POST['company_address'],
				':c_phone' => $_POST['company_phone'],
				'id' => $id
			));

		if($psswrd == null){
			
			$query = $this->db->prepare("UPDATE users SET user_name = :u_name,email= :u_email, phone_number = :u_phone, address = :u_address WHERE user_id = :id");
			$query->execute(array(
				':u_name' => $_POST['fname'],
				':u_email' => $_POST['email'],
				':u_phone' => $_POST['number'],
				':u_address' => $_POST['address'],
				'id' => $id
			));

		}else{
			$query = $this->db->prepare("UPDATE users SET user_name = :u_name,user_password = md5(:password),email= :u_email, phone_number = :u_phone, address = :u_address WHERE user_id = :id");
			$query->execute(array(
				':u_name' => $_POST['fname'],
				':password' => $_POST['password'],
				':u_email' => $_POST['email'],
				':u_phone' => $_POST['number'],
				':u_address' => $_POST['address'],
				'id' => $id
			));
		}
	}

	function updateCompImage($id){
		$query = $this->db->prepare("SELECT company_image FROM company WHERE user_id = :id");
        $query->execute(array(
                ':id' => $id
            ));
        $cmp_img = $query->fetchAll(); 

        $query = $this->db->prepare("UPDATE company SET company_image = :c_img WHERE user_id = :id");
       

        if (MassUpload::$uploadOk == 0) {
            $_SESSION['error'] = "Sorry, your file was not uploaded.";
            exit;
        // if everything is ok, try to Massupload file
        } else {
            // print_r(MassUpload::$files["fileToUpload"]["name"]);
            $size = sizeof(MassUpload::$files["fileToUpload"]["name"]);
            for ($i=0; $i < sizeof(MassUpload::$files["fileToUpload"]["name"]) ; $i++) { 
                # code...
                MassUpload::$image[$i] = str_replace(' ','',basename(MassUpload::$files["fileToUpload"]["name"][$i]));
            }

            $count = 0;
            foreach (MassUpload::$image as $value) {
                # code...
                // print_r($value);

                if( $query->execute(array(
        		':c_img' => $_FILES["fileToUpload"]["name"][0],
                'id' => $id
            ))){        
                    if (move_uploaded_file(MassUpload::$files["fileToUpload"]["tmp_name"][$count], MassUpload::$target_file[$count])) {
                        // echo "The files ". basename( MassUpload::$files["fileToUpload"]["name"][$count]). " has been Massuploaded.";

                        if ($count === $size) {
                            # code...
                            return true;
                        }

                        $count++;
                        
                    } else {
                    	$_SESSION['error'] = "Sorry, there was an error uploading your file.";
                    }    
                }else{
                    $_SESSION['error'] =  "Failed to Massupload";
                }
            }            
        }
        
        return $cmp_img;
	}

	function featuredItems($id){
		$query = $this->db->prepare("SELECT * FROM featured_products WHERE user_id = :user_id");

		$query->execute(array(
			':user_id' => $_SESSION['user']
		));
		// $data = $query->fetchAll();
		$count = $query->rowCount();
		if ($count >= 6) {
			# code...
			return $count;
		}else{
			$query = $this->db->prepare("SELECT product_id FROM featured_products WHERE product_id = :product_id");
			$query->execute(array(
				':product_id' => $id 
			));

			$store = $query->fetchAll();
			// $this->temp = $store[0][1];
			$count = $query->rowCount();

			if($count > 0){
				return 0;
			}else{
				$query = $this->db->prepare("INSERT INTO featured_products(product_id,user_id) VALUES (:id,:user_id)");
				$query->execute(array(
					':id' => $id,
					':user_id' => $_SESSION['user']
				));
			}
		}
	}

	function getFeaturedItems(){
		$query = $this->db->prepare("SELECT featured_products.product_id,products.product_details, products.product_price, products.product_quantity, products.product_name, product_images.image_name FROM featured_products INNER JOIN products ON products.product_id = featured_products.product_id JOIN product_images ON product_images.product_id = products.product_id  WHERE featured_products.user_id = :user_id");
		$query->execute(array(
			':user_id' => $_SESSION['user']
		));
		$data = $query->fetchAll();
		return $data;
	}

	function deleteFeaturedItem($id){
		$query = $this->db->prepare("DELETE FROM featured_products WHERE product_id = :id");
		$query->execute(array(
				'id' => $id
			));
	}

	function deleteItem($id){
		$query = $this->db->prepare("SELECT image_name FROM product_images WHERE product_id = :id");
        $query->execute(array(
                'id' => $id
            ));
        $cmp_img = $query->fetchAll(); 

		$query = $this->db->prepare("DELETE FROM products WHERE product_id = :id");
		$query->execute(array(
				'id' => $id
			));

		return $cmp_img;
	}

	function deleteProductType($id){
		$query = $this->db->prepare("DELETE FROM product_category WHERE product_cat_id = :id");
		$query->execute(array(
			':id' => $id));	
	}

	function addproducttype(){
		$query = $this->db->prepare("INSERT INTO product_category(product_cat_name) VALUES (:product_cat_name)");
		$query->execute(array(':product_cat_name' => $_POST['product_cat']));	
	}
	
	function productTypeList(){
		$query = $this->db->prepare("SELECT * FROM product_category");
		$query->execute();

		$product_type = $query->fetchAll();

		return $product_type;	
	}
}