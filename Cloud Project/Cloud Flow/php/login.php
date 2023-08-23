<?php
    require('database.php');
    $email=base64_decode($_POST['email']);
    $password=md5(base64_decode($_POST['password']));
    $check_email="SELECT username from users WHERE username='$email'";
    $email_response=$db->query($check_email);
    if($email_response->num_rows!=0){
        $check_pass="SELECT username,password from users WHERE username='$email' AND password='$password'";
        $pass_response=$db->query($check_pass);
        if($pass_response->num_rows!=0){
            $check_status="SELECT status FROM users WHERE username='$email' AND password='$password' AND status='active'";
            $response_status=$db->query($check_status);
            if($response_status->num_rows!=0){
                $user_id_query="SELECT id FROM users WHERE username='$email'";
                $response=$db->query($user_id_query);
                $user_ids=$response->fetch_assoc();
                $table_name="user_".$user_ids['id'];
                session_start();
                $_SESSION['username']=$email;
                $_SESSION['table_name']=$table_name;
                echo"Login success";
            }
            else{
                $get_code="SELECT activation_code FROM users WHERE username='$email' AND password='$password'";
                $response_get_code=$db->query($get_code);
                $data=$response_get_code->fetch_assoc();
                $final_code=$data['activation_code'];
                $check_code_mail=mail($email,'picdrive activation code','Thank you for choosing our product your activation code is : '.$final_code);
                if($check_code_mail){
                    echo"login pending";
                }
            }
        }
        else{
            echo"wrong password";
        }
    }
    else{
        echo"User not found";
    }
?>