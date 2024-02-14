<?php

//問題2: フォームデータの処理
//ユーザーからのPOSTリクエストを受け取り、フォームから送信されたemailアドレスが有効かどうかを検証するPHPスクリプトを書いてください。
//有効な場合は「有効なEメールアドレスです」と表示し、無効な場合は「無効なEメールアドレスです」と表示してください。


if(!empty($_POST['email'])){
    $mail = $_POST['email'];

    // メールアドレスとして有効かどうかチェック
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $msg = '有効なEメールアドレスです';
    }else{
        $msg = '無効なEメールアドレスです';
        $err = 'error';
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
    <title>小テスト8-2</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="email">
    <p class="<?php echo (!empty($err))? $err : '';?>"><?php echo (!empty($msg))?  $msg: ''?></p>
    <input type="submit" value="送信">
</form>


<style>
    .error{
        color: red;
    }
</style>
</body>
</html>
