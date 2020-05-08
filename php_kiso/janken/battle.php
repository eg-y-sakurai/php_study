<?php
/**
(1) 勝敗（勝ち・負け・あいこ）は$resultに代入してください
(2) プレイヤーの手は$player_handに代入してください
(3) コンピューターの手は$pc_handに代入してください
**/
    $hand_list = ["ぐー", "ちょき", "ぱー"];
    $result_list = ["あいこ！", "負け！", "勝ち！"];
    
    $pc_hand = rand(0, 2);
    if ($_POST[playerHand] == 0) $player_hand = 0;
    if ($_POST[playerHand] == 2) $player_hand = 1;
    if ($_POST[playerHand] == 5) $player_hand = 2;
    $result = ($player_hand - $pc_hand + 3) % 3; //勝ち2, 負け1, あいこ0
    
    $pc_hand = $hand_list[$pc_hand];
    $player_hand = $hand_list[$player_hand];
    $result = $result_list[$result];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>じゃんけん</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>結果は・・・</h1>
        <div class="result-box">
            <!-- じゃんけんの結果を表示しましょう -->
            <p class="result-word"><?php echo $result; ?></p>
            <!-- プレイヤーの手を表示しましょう -->
            あなた：<?php echo $player_hand; ?><br>
            <!-- コンピュータの手を表示しましょう -->
            コンピューター：<?php echo $pc_hand; ?><br>

            <p><a class="red" href="index.php">>>もう一回勝負する</a></p>
        </div>
    </body>
</html>