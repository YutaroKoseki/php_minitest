<?php

//問題5：クッキー情報の設定と取得
//ユーザーの訪問回数を追跡するためにクッキーを使用するPHPスクリプトを書いてください。
//訪問ごとにカウントを1増やし、現在の訪問回数を画面に表示してください。
//初めての訪問の場合は、「これがあなたの最初の訪問です！」と表示し、それ以降は「これはあなたの [訪問回数] 回目の訪問です！」と表示してください。

// クッキーから訪問回数を取得
if (isset($_COOKIE['count'])) {
    $count = $_COOKIE['count'] + 1;
} else {
    $count = 1; // 初めての訪問
}

// クッキーに訪問回数を設定:有効期限30日
setcookie('count', $count, time() + (60 * 60 * 24 * 30));


// 訪問回数に応じたメッセージを表示
if ($count == 1) {
    $msg =  "これがあなたの最初の訪問です！";
} else {
    $msg = "これはあなたの {$count} 回目の訪問です！";
}

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト8-5</title>
</head>
<body>
<h1><?php echo $msg;?></h1>
</body>
</html>
