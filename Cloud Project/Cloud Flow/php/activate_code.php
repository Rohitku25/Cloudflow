<?php
    require('database.php');
    $code=base64_decode($_POST['code']);
    $email=base64_decode($_POST['email']);
    $check="SELECT activation_code FROM users WHERE username='$email' AND activation_code='$code'";
    $response=$db->query($check);
    if($response->num_rows!=0){
        $update="UPDATE users SET status='active' WHERE username='$email' AND activation_code='$code'";
        if($db->query($update)){
            $user_id="SELECT id FROM users WHERE username='$email'";
            $get_id_response=$db->query($user_id);
            $id_data=$get_id_response->fetch_assoc();
            $table_name="user_".$id_data['id'];
            $create_table="CREATE TABLE $table_name(
                id INT(11) NOT NULL AUTO_INCREMENT,
                image_name VARCHAR(50),
                image_path VARCHAR(50),
                image_size FLOAT(10),
                image_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY(id)
            )";
            echo"User verified";
            if($db->query($create_table)){
                mkdir("../profile/gallery/".$table_name);
                session_start();
                $_SESSION['username']=$email;
                
            }
        }
        else{
            echo"Activation failed try again later";
        }
    }
    else{
        echo"Wrong Activation code";
    }
?>