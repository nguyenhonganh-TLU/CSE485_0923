<?php

$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100, -125, 0];
echo "Các số chia hết cho 5: ";


foreach ($array as $number) {
    if ($number >= 100 && $number <= 200 && $number % 5 == 0) {
        echo $number . " ";
    }
}

