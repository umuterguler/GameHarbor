<?php

if (isset($_POST['submit']) && isset($_FILES['gameImage']) && isset($_POST['name']) && isset($_POST['message'])){
    include "uploadDB.php";

    $img_name = $_FILES['gameImage']['name'];
	$tmp_name = $_FILES['gameImage']['tmp_name'];
	$error = $_FILES['gameImage']['error'];
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $game_name = validate($_POST['name']);
	$game_description = validate($_POST['message']);

    if($error === 0){
        
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg" , "jpeg" , "png");
            
        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name ;
            move_uploaded_file( $tmp_name , $img_upload_path );
            //inserting to db
            $sql = "INSERT INTO upload(game_name,game_description,image_url_1) 
                    VALUES('$game_name','$game_description','$new_img_name')";
                
            mysqli_query($conn,$sql);
            header("Location: /GamePage/actionGames.html");


        }else{
            $em = "You can't upload file type";
            header("Location: /contact.html?error=$em");
        }
    }else{
        $em = "unknown error occured!";
        header("Location: /contact.html?error=$em");
    }


}else{
    header("Location: /contact.html");
    echo "son else'e girdin salak";
}