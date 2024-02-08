<?php
//問題3: 数字のみを含む文字列の検出
//ユーザーから入力された文字列が数字のみを含んでいるかどうかを検証するPHPスクリプトを書いてください。
//文字列が1つ以上の数字のみで構成されている場合に「True」、そうでない場合に「False」を出力してください。
//正規表現を使用して、この検証を行ってください。



$msg = '';

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    // 正規表現で数字のみを検証

    if (preg_match('/^[0-9]+$/', $input)) {
        $msg = 'True';
    } else {
        $msg = 'False';
    }
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト5-3</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" placeholder="文字列を入力してください" name="input" required>
    <input type="submit" value="検証">
</form>

<p>検証結果: <?php echo $msg; ?></p>

</body>
</html>


