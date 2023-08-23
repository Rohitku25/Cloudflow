<?php
    $pattern="GA0a!b1|cBdN@efg2hCiH3`jkD#lP4OmM%n^JVo\Q5pRE_<q=)SIK9rs6&tT*uUF,L-(vZ/7w~Wx+8yX>zY";
    $length=strlen($pattern)-1;
    $pass=[];
    $i;
    for($i=0;$i<8;$i++){
        $indexing_num=rand(0,$length);
        $pass[]=$pattern[$indexing_num];
    }
    echo implode($pass)
?>