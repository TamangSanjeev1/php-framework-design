<?php


class MassUpload{
    public static $target_dir;
    public static $target_file = array(array());
    public static $imageFileType = array();
    public static $uploadOk;
    public static $files;
    public static $post;
    public static $temp;
    public static $image = array();

    function __construct($directory, $files_info, $post)
    {
        MassUpload::$target_dir = $directory;
        MassUpload::$files = $files_info;

        for ($i=0; $i < sizeof($files_info["fileToUpload"]["name"]) ; $i++) { 
             # code...
            MassUpload::$target_file[$i] = MassUpload::$target_dir . str_replace(' ','',basename($files_info["fileToUpload"]["name"][$i]));
        }

        MassUpload::$uploadOk = 1;
        MassUpload::$post = $post;
        
        $j = 0;
        foreach (MassUpload::$target_file as $temp) {
            # code...
            
            MassUpload::$imageFileType[$j] = pathinfo($temp,PATHINFO_EXTENSION);
            $j++;
        }
    }
    
    public static function checkImg(){
        // Check if image file is a actual image or fake image
        $check = array();
        if(isset(MassUpload::$post["submit"])) {
            for ($i=0; $i < sizeof(MassUpload::$files["fileToUpload"]["tmp_name"]) ; $i++) { 
                # code...
                $check[$i] = getimagesize(MassUpload::$files["fileToUpload"]["tmp_name"][$i]);    
                if($check[$i] !== false) {
                    MassUpload::$uploadOk = 1;
                    return "File is an image - " . $check[$i]["mime"] . ".";
                } else {
                    MassUpload::$uploadOk = 0;
                    return false;
                }
            }
        }
    }

    public static function fileExist(){
        // Check if file already exists
        foreach (MassUpload::$target_file as $value) {
            # code...
            if (file_exists($value)) {
                MassUpload::$uploadOk = 0;
                return false;
            }else{
                return true;
            }
        }
    }

    public static function fileSize(){
        // Check file size
        foreach (MassUpload::$files["fileToUpload"]["size"] as $temp) {
            # code...
            if ($temp > 5000000) {
                MassUpload::$uploadOk = 0;
                return false;
            } 
        }       
    }

    public static function fileFormats(){
        // Allow certain file formats
        foreach (MassUpload::$imageFileType as $temp) {
            # code...
            if($temp != "jpg" && $temp != "JPG" && $temp != "png" && $temp != "PNG" && $temp != "jpeg" && $temp != "gif" ) {
                MassUpload::$uploadOk = 0;
                return false;
            }
        }
    }
}

?>
