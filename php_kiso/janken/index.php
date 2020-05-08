<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>じゃんけん</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>演習問題 〜じゃんけん〜</h1>
        <h2>以下から出す手を選んでください。</h2>
        <div class="form-box">
            <form action="battle.php" method="post">
                <div class="cp_ipradio">
                    <input type="radio" id="gu" title="playerHand" name="playerHand" value="0" checked>
                    <label for="gu">ぐー</label>
                    
                    <input type="radio" id="choki" title="playerHand" name="playerHand" value="2">
                    <label for="choki">ちょき</label>
                    
                    <input type="radio" id="pa" title="playerHand" name="playerHand" value="5">
                    <label for="pa">ぱー</label>
                </div>
                <button type="submit" class="battle-button">勝負する！</button>
            </form>
        </div>
    </body>
</html>