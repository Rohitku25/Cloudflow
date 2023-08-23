<?php
require('database.php');
$fullname=base64_decode($_POST['fullname']);
$username=base64_decode($_POST['username']);
$password=md5(base64_decode($_POST['password']));
$pattern="GA0a!b1|cBdN@efg2hCiH3`jkD#lP4OmM%n^JVo\Q5pRE_<q=)SIK9rs6&tT*uUF,L-(vZ/7w~Wx+8yX>zY";
    $length=strlen($pattern)-1;
    $code=[];
    $i;
    for($i=0;$i<8;$i++){
        $indexing_num=rand(0,$length);
        $code[]=$pattern[$indexing_num];
    }
    $activation_code= implode($code);
    $strong_user="INSERT INTO users(fullname,username,password,	activation_code	)
    VALUES('$fullname','$username','$password','$activation_code')";
    if($db->query($strong_user)){
        $mail=mail($username,'picdrive activation code','Thank you for choosing our product your activation code is : '.$activation_code);
        if($mail){
            echo"success";
        }
        else{
            echo"Change your mail or try again later";
        }
    }
    else{
        echo"Sign up failed";
    }
?>