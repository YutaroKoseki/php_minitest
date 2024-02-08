<?php

//問題1: 文字列処理関数の使用
//ユーザーから入力されたメールアドレスが正しい形式であるかを検証するPHPスクリプトを書いてください。
//正しい形式とは、@記号を含むことを意味します。
//組み込み関数strposを使用して、@の存在を確認してください。

$msg = '';
$error = '';
$input = $_POST['email'];

//　処理

if(mb_strpos($input, '@')){
    // @が含まれる場合
    $msg = '正しいメール形式です';
}else{
    $msg = '形式が正しくありません';
    $error = 'error';
}

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト5-1</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!--  ↓ type="email"でクライアント側でバリデーションしてくれるが、それだと小テストにならないのでtext  -->
    <input type="text" placeholder="メールアドレスを入力してください" name="email" require>
    <p class="<?php echo $error; ?>"><?php echo $msg; ?></p>
    <input type="submit" value="送信">
</form>

<style>
    .error{
        color: red;
    }
</style>
</body>
</html>
