<?php

/**
* 
*/
class Order extends Controller
{
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function viewCart(){
		$this->view->render("cart/cart");	 
	}

	function addtocart($id){
		if ($_POST && !empty($_POST['order_quantity'])) {
			# code...		
			 	Session::init();
			      if(isset($_SESSION["shopping_cart"]))  
			      {  
			           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
			           if(!in_array($id, $item_array_id))  
			           {  
			                $count = count($_SESSION["shopping_cart"]);  
			                $item_array = array(  
			                     'item_id'               =>     $id,  
			                     'item_name'               =>     $_POST["hidden_name"],  
			                     'item_price'          =>     $_POST["hidden_price"], 
			                     'item_img'				=>     $_POST["hidden_image"], 
			                     'item_quantity'          =>     $_POST["order_quantity"]  
			                );  
			                $_SESSION["shopping_cart"][$count] = $item_array;  
			           }  
			           else  
			           {  
			                echo '<script>alert("Item Already Added")</script>';  
			           } 

			      // print_r($_SESSION);
			      }  
			      else  
			      {  
			           $item_array = array(  
			                'item_id'               =>     $id,
			                'item_name'               =>     $_POST["hidden_name"],  
		                     'item_price'          =>     $_POST["hidden_price"], 
		                     'item_img'				=>     $_POST["hidden_image"], 
			                'item_quantity'          =>     $_POST["order_quantity"]  
			           );  
			           $_SESSION["shopping_cart"][0] = $item_array;  		
			     }  

		}

		$this->view->render("cart/cart");	
	}


	function deleteFromCart($id){
		if(isset($id))  
		{  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $id)  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>'; 
                }  
           }  
        
		}
		$this->view->render("cart/cart");	 
	}
}




	