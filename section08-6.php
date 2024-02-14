<?php

//サーバーの環境変数PATHの値を取得し、画面に表示するPHPスクリプトを書いてください。
//さらに、$_ENVスーパーグローバル変数を使用して任意の環境変数（例えばMY_CUSTOM_VAR）の値を取得し、
//存在する場合はその値を、存在しない場合は「環境変数は設定されていません」と表示してください。


// =========================環境変数PATHを取得→$_ENVだとエラー============================
//print $_ENV['PATH'];
//echo '<br />';
//====================================================================================

// 環境変数PATHを取得
echo '【getenv()で取得した環境変数PATH: 】<br /><br />';
print getenv('PATH');
echo '<br /><br />';


if(!empty($_POST['custom'])){
    $customVar = $_POST['custom'];

    // $_ENVを使用して任意の環境変数MY_CUSTOM_VARの値を取得
    if (isset($_ENV[$customVar])) {
        $myCustomVar = $_ENV[$customVar];
        //$myCustomVar = getenv($customVar);
        echo $customVar. ': '.  htmlspecialchars($myCustomVar);
    } else {
        echo "環境変数「{$customVar}」は設定されていません";
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
    <title>小テスト8-6</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="custom">
    <input type="submit" value="探す">
</form>
</body>
</html>
