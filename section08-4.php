<?php

//問題4：セッション情報の使用
//ユーザーがログインフォームからユーザー名を送信した場合、そのユーザー名をセッションに保存し、
//次のページアクセス時に「こんにちは、[ユーザー名]さん！」と表示するPHPスクリプトを書いてください。
//ユーザー名がセッションに存在しない場合は、「ゲストさん、こんにちは！」と表示してください。

session_start();

if(!empty($_POST['name'])){
    // セッションに保存
    $_SESSION['name'] = $_POST['name'];
}

if(!empty($_POST['destroy'])){
    // セッション変数を全て削除
    $_SESSION = array();
    // セッションクッキーも削除
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    // セッションを破壊して新しいセッションを開始
    session_destroy();
    session_start();
}

//var_dump($_SESSION);


?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト8-4</title>
</head>
<body>

<?php if(isset($_SESSION['name'])): ?>
<h2>こんにちは<?php echo $_SESSION['name']?>さん！</h2>
<?php else:?>
<h2>ゲストさん、こんにちは！</h2>
<?php endif; ?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="name" placeholder="名前を入力してください">
    <input type="submit" value="送信">
</form>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="submit" name="destroy" value="セッションを削除" style="margin-top:50px;">
</form>
</body>
</html>
