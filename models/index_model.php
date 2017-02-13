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
		$query = $this->db->prepare("SELECT featured_products.product_id,products.product_details, products.product_price, products.product_name, product_images.image_name FROM featured_products INNER JOIN products ON products.product_id = featured_products.product_id JOIN product_images ON product_images.product_id = products.product_id");
		// SELECT featured_products.product_id,products.product_details, products.product_price, products.product_quantity, products.product_name, product_images.image_name FROM featured_products INNER JOIN products ON products.product_id = featured_products.product_id JOIN product_images ON product_images.product_id = products.product_id
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data = $query->fetchAll();
		
		return $data;
    }
}