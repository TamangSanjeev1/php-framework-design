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
	
}