<?php
// ===============================================================

//問題2: シンプルなログインシステムのシミュレーション
//ユーザー名とパスワードのペアがあらかじめ定義されている配列（連想配列）があります。
//ユーザーから入力されたユーザー名とパスワードを検証し、
//正しい組み合わせであれば「ログイン成功」、そうでなければ「ログイン失敗」と表示するPHPスクリプトを書いてください。

$user = [
    'name'     => 'テスト太郎',
    'password' => 'pass',
];


function checkAuth($name, $pass){
    global $user;

    // 名前とパスワードが一致する場合
    if($user['name'] === $name && $user['password'] === $pass){
        echo 'ログイン成功';

    }else{
        echo 'ログイン失敗';
    }
}

//　実際の処理

if(isset($_POST)){
    //　ミニテストなのでセキュリティ面は無視
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    checkAuth($name, $pass);
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>問題2</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="name" placeholder="名前を入力してください">
    <!--  パスワードのinput typeは　passwordが基本だが今回はtextにしてる  -->
    <input type="text" name="pass" placeholder="パスワードを入力してください">

    <input type="submit" value="送信">
</form>

</body>
</html>
