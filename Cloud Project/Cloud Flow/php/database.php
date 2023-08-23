<?php
    $db=new mysqli("localhost","root","","pic");
    if($db->connect_error){
        die("Database  is not connected");
    }

?>