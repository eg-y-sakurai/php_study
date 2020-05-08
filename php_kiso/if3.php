<?php
    $temperature = 37.5;
    if($temperature < 37.0) { //未満？以下？
        echo "平熱です。\n";
    }
    else if($temperature >= 37.5) {
        echo "コロナの可能性あり\n";
    }
    else {
        echo "微熱です\n";
    }
?>