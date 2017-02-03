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

	public function storeItem(){	
		$query = $this->db->prepare("INSERT INTO products(product_name, product_quantity, product_price, product_details, product_brand, user_id, product_cat_id) VALUES (:product_name,:product_quantity,:product_price,:product_details,:product_brand,:user_id,:product_cat)");
		$pr_name = $_POST['product_name'];
		$pr_qntity = $_POST['quantity'];

		$query->execute(array(':product_name' => $pr_name, ':product_quantity' => $pr_qntity, ':product_price' => $_POST['price'],':product_details' => $_POST['detail'], ':product_brand' => $_POST['brand'], ':user_id' => $_SESSION['user'], ':product_cat' => '1'));	

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
		$query = $this->db->prepare("UPDATE products SET product_name = :p_name,product_quantity= :p_quantity, product_price = :p_price, product_details = :p_details, product_brand = :p_brand WHERE product_id = :id");
			$query->execute(array(
				':p_name' => $_POST['product_name'],
				':p_quantity' => $_POST['quantity'],
				':p_price' => $_POST['price'],
				':p_details' => $_POST['detail'],
				':p_brand' => $_POST['brand'],
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
}