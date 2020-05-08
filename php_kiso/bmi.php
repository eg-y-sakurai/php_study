<?php
    echo "身長を入力してください：　";
    $height = fgets(STDIN) / 100;
    echo "体重を入力してください：　";
    $weight = fgets(STDIN);
    $bmi = $weight / ($height * $height);
    echo $height." ".$weight ." ".$bmi;
    
    if ($bmi < 18.5) {
        echo "あなたは、低体重です。\n";
    }
    else if ($bmi >= 25) {
        echo "あなたは、肥満です。\n";
    }
    else {
        echo "あなたは、普通体重です。\n";
    }
?>