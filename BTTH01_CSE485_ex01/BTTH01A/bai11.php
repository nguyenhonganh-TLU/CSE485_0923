<?php

$array = array(1, 2, 3, 4, 5);

array_splice($array, 3, 1);  //xóa phần tử đã được chỉ định

foreach($array as $arr){
    echo $arr . "<br>";
}
