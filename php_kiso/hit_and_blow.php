<?php

    function makeAnswer() {
        $ans = [];
        while(empty($ans)) {
            $ans = makeArray(rand(12, 987)); //重複の場合,[]が返ってくる
        }
        return $ans;
    }


    function makeArray($num) {
        $ary = [];                  //重複の場合,[]を返す
        $hun = (int)($num / 100);
        $ten = (int)(($num - $hun*100) / 10);
        $one = $num - $hun*100 - $ten*10;
        
        if (isDuplication($hun, $ten, $one))
            array_push($ary, $hun, $ten, $one);
        return $ary;
    }
    
    
    function isDuplication($x, $y, $z) {
        if ($x !== $y && $x !== $z && $y !== $z)
            return true;
        else
            return false;
    }
    
    
    function check($res, $ans) {
        
        $hit = 0;
        $blow = 0;
        
        for ($i = 0; $i < 3; $i++) {
            $idx = array_search($ans[$i], $res, true);
            if ($idx !== false) {
                if ($idx === $i) $hit++;
                else $blow++;
            }
        }
        
        if ($hit === 3) return true;
        else echo "Hit:".$hit.", Blow:".$blow."です。\n";
        
        return false;
    }
    
    
    $ans = makeAnswer();

    $i = 1;
    
    while (1) {
        echo "□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□■□\n";
        echo $i . "回目のチャレンジ！\n";
        echo "3桁の半角数字を重複なしで入力してください:";
        $res = trim(fgets(STDIN));
        $res_ary = makeArray($res);
        
        if (strlen($res) !== 3 || empty($res_ary)) {
            echo "エラー：3桁の半角数字を重複なしで入力してください！\n";
        }
        else {
            if(check($res_ary, $ans) === true) {
                break;
            }
        }
        $i++;
    }
    
    echo "正解です！".$i."回目でクリアです！！\n";
    
?>