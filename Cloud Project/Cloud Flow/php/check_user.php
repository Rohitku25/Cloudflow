<?php
    require("database.php");
    $username=base64_decode($_POST['username']);
    $check="SELECT username FROM users WHERE username='$username'";
    $response=$db->query($check);
    if($response->num_rows!=0){
        echo"0";
    }
    else{
        echo"1";
    }

?>