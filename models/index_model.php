<?php
/**
* 
*/
class Index_Model extends Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function getItems(){
		$query = $this->db->prepare("SELECT featured_products.product_id,products.product_details, products.product_price, products.product_name, product_images.image_name FROM featured_products INNER JOIN products ON products.product_id = featured_products.product_id JOIN product_images ON product_images.product_id = products.product_id ORDER BY featured_products.featured_id DESC LIMIT 6");
	
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data = $query->fetchAll();
		
		return $data;
    }

   	function productTypeList(){
		$query = $this->db->prepare("SELECT * FROM product_category");
		$query->execute();

		$product_type = $query->fetchAll();

		return $product_type;	
	}

	function companyNameList(){
		$query = $this->db->prepare("SELECT company_name FROM company");
		$query->execute();

		$companyList = $query->fetchAll();

		return $companyList;	
	}

	function viewProduct($id){
		$query = $this->db->prepare("SELECT products.product_brand,products.product_quantity,products.product_id,products.product_details, products.product_price, products.product_name, product_images.image_name, company.company_name, company.company_address FROM product_images INNER JOIN products ON products.product_id = product_images.product_id JOIN company ON company.user_id = products.user_id WHERE products.product_id = :p_id");
		$query->execute(array(
				':p_id' => $id
			));

		$product = $query->fetchAll();

		return $product;
	}

	function getItemsByType($id){
		$query = $this->db->prepare("SELECT product_category.product_cat_name,products.product_id,products.product_details, products.product_price, products.product_name, product_images.image_name FROM products INNER JOIN product_images ON product_images.product_id = products.product_id JOIN product_category ON products.product_cat_id = product_category.product_cat_id WHERE products.product_cat_id = :p_id");
		$query->execute(array(
				':p_id' => $id
			));

		$product = $query->fetchAll();

		return $product;
	}
	
}