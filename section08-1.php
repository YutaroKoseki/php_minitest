<?php

//問題1: クエリパラメータの取得
//ユーザーがウェブフォームから送信したクエリパラメータnameを取得し、それを画面に表示するPHPスクリプトを書いてください。
//
function sanitize($text){
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5);
}


if(!empty($_GET['name'])){
    $name = sanitize($_GET['name']);
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト8-1</title>
</head>
<body>
<form action="<?php echo sanitize($_SERVER['PHP_SELF'])?>" method="get">
    <input type="text" name="name">
    <input type="submit" value="送信">
</form>

<p>あなたの名前は <?php echo (!empty($name))? $name: '名無し';?> さんですね。</p>
</body>
</html>
