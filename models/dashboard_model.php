<?php
/**
* 
*/
class Dashboard_Model extends Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function createUser(){
		$type = 2;
		$time = date('Y-M-d');
	
		$query = $this->db->prepare("INSERT INTO users(user_name, user_password, email, phone_number, address, date_added, type_id) VALUES (:name,md5(:password),:email,:ph_number,:address,:date_added,:type)");
		$query->execute(array(':name' => $_POST['fname'], ':password' => $_POST['password'], ':email' => $_POST['email'], ':ph_number' => $_POST['number'], ':address' => $_POST['address'], ':date_added' => $time, ':type' => $type));
        
        $query = $this->db->prepare("SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1"); 
        $query->execute();
        $store = $query->fetchAll();
        $this->temp = $store[0];
        $count = $query->rowCount();

        if($count > 0){
            $query = $this->db->prepare("INSERT INTO company(company_name, company_address, company_phone, company_image, user_id) VALUES (:c_name,:c_address,:c_phone,:c_image,:user_id)");
    

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


                    if($query->execute(array(':c_name' => $_POST['company_name'], ':c_address' => $_POST['company_address'], ':c_phone' => $_POST['company_phone'], ':c_image' => MassUpload::$image[0], ':user_id' => $this->temp[0]))){        
                        if (move_uploaded_file(MassUpload::$files["fileToUpload"]["tmp_name"][0], MassUpload::$target_file[0])) {
                            // echo "The files ". basename( MassUpload::$files["fileToUpload"]["name"][$count]). " has been Massuploaded.";

                            if ($count === $size) {
                                # code...
                                return true;
                            }

                  
                            
                        } else {
                            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                        }    
                    }else{
                        $_SESSION['error'] =  "Failed to Massupload";
                    }
                //}            
            }    
        }

		
	}

	function listUsers(){
		$sth = $this->db->prepare('SELECT * FROM users');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		// return json_encode($data);
		return $data;
	}

    /*
    * The deleting of image of the products with remained of the company_image
    */
	function deleteUsers($id){
        $query = $this->db->prepare("SELECT company_image FROM company WHERE user_id = :id");
        $query->execute(array(
                'id' => $id
            ));
        $cmp_img = $query->fetchAll();  
        $query = $this->db->prepare("DELETE FROM users WHERE user_id = :id");
        $query->execute(array(
                'id' => $id
            )); 
        return $cmp_img;
	}
}