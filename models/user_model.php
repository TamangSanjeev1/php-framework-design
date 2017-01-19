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
		$sth = $this->db->prepare('SELECT users.user_id,products.product_name,products.product_id, products.product_price, product_category.product_cat_name, products.product_details ,product_images.image_name FROM products INNER JOIN users ON products.user_id=users.user_id JOIN product_category ON products.product_cat_id = product_category.product_cat_id JOIN product_images ON product_images.product_id = products.product_id WHERE products.user_id = :user_id');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(
			':user_id' => $_SESSION['user']
		));
		$data = $sth->fetchAll();
		// return json_encode($data);
		return $data;
	}

	function deleteUsers($id){
		$query = $this->db->prepare("DELETE FROM users WHERE user_id = :id");
		$query->execute(array(
				'id' => $id
			));
	}
}