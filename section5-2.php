<?php

//問題2: 配列処理関数の使用
//与えられた整数の配列から、最大値と最小値を見つけて出力するPHPスクリプトを書いてください。
//組み込み関数maxとminを使用して、これらの値を計算してください。
//(配列例：$numbers = [1, 3, 5, 7, 9, 2, 4, 6, 8, 0];）


$numbers = [1, 3, 5, 7, 9, 2, 4, 6, 8, 0];

$max = max($numbers);
$min = min($numbers);

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト5-2</title>
</head>
<body>
<p>最大値：<?php echo $max;?></p>
<p>最小値：<?php echo $min;?></p>
</body>
</html>
