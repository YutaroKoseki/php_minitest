<?php

// 問題 5: データ更新
//あなたは、あるウェブアプリケーションのデータベース管理者です。usersテーブルには、id, name, email の3つのカラムがあります。
//特定のユーザー（例: idが5のユーザー）のemailアドレスを更新する必要があります。新しいメールアドレスは newemail@example.com です。
//これ実行するためのPHPコードを記述してください。

function dbConnect(){
    $dsn = 'mysql:dbname=sample;host=localhost;charset=utf8;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock';
    $user = 'root';
    $pass = 'root';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // エラーモードの設定
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // フェッチモードのデフォ
    ];

    // PDOオブジェクト生成
    $db = new PDO($dsn, $user, $pass, $options);
    return $db;
}

try{
    // 準備
    $dbh = dbConnect();
    $sql1 = 'SELECT * FROM users';

    $stmt = $dbh->prepare($sql1);

    if($stmt->execute()){
        // 初期のテーブル状態を確認
        while ($row = $stmt->fetch()){
            print_r($row);
            echo '<br>';
        }
    }

    // ID = 5のユーザーのメールアドレスを更新
    $newMail = 'newemail@example.com'; // 今回は直置き

    $sql2 = 'UPDATE users SET email = :email WHERE id = 5';

    $stmt = $dbh->prepare($sql2);

    $stmt->bindValue(':email', $newMail);

    if($stmt->execute()){
        //　成功した場合
        echo '更新が成功しました<br>';
    }

    // 状態の再確認
    $stmt = $dbh->prepare($sql1);

    if($stmt->execute()){
        while ($row = $stmt->fetch()){
            print_r($row);
            echo '<br>';
        }
    }


}catch(PDOException $e){
    echo $e->getMessage();
}