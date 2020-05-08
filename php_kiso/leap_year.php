<?php
    echo "西暦を入力してください\n";
    $year = fgets(STDIN);
    
    if($year % 400 === 0) {
        echo "入力された年は、うるう年です。\n";
    }
    else if ($year % 4 === 0) {
        if($year % 100 === 0) {
            echo "入力された年は、平年です。\n";
        }
        else {
            echo "入力された年は、うるう年です。\n";
        }
    }
    else {
        echo "入力された年は、平年です。\n";
    }
?>