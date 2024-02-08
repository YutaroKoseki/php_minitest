<?php


// 第5章　理解度チェック

//[1]
// ① 最後に登場する「PHP」の位置を検出
$text1 = "PHPはPHP:Hypertext Preprocessor の略です";
echo strrpos($text1, 'PHP'). '番目。<br />';

// ② 文字列に埋め込む（数値は小数点一位まで）
printf('%sの気温は%.1f℃です。', '弘前', 15.156);
echo '<br />';

// ③ 先頭だけ大文字に
$text2 = 'wings knowledge';
echo mb_convert_case($text2, MB_CASE_TITLE). '<br />';

// ④ 文字列の置換
$text3 = 'ボクの名前はリオです。';
// 補足： str_replaceには配列で渡すことも可能
echo str_replace(['ボク','リオ'],['私', '凛生'], $text3). '<br />';

// ⑤ http://で始まるか判定
$text4 = 'https://wings.msn.to/';
$result1 = str_starts_with($text4, 'http://');
var_dump($result1);
echo '<br />';


// [2]
$data = ['高江', '青木', '片渕'];

// ① 「山田」「日尾」を追加
array_push($data, '山田', '日尾');
print_r($data);
echo '<br />';

// ② 先頭に「掛谷」「土井」を追加
array_unshift($data, '掛谷', '土井');
print_r($data);
echo '<br />';

// ③ ３〜５番目の要素を取得する
print_r(array_slice($data, '3','3'));
$data = ['高江', '青木', '片渕'];
echo '<br />';


// [3]

echo <<<EOD
1: fopen
2: r
3: LOCK_SH
4: while
5: 
6: preg_match
7: i
8: ＄line
9: ＄data[0]
10: LOCK_UN
11: ＄file
EOD;

echo '<br />';


// [4]

// ①　小数点切り上げ、整数に
echo ceil(12.2). '<br />';

// ② 絶対値を求める
echo abs(-12) . '<br />';

// ③　変数を破棄
$x = '捨てないで！';
echo $x;
unset($x);
echo $x; // unset()されているのでエラーになる