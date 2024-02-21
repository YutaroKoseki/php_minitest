<?php

//問題 2: データの挿入
//usersテーブルに新しいユーザーを追加するためのSQL文をPHPで実行するコードを書いてください。
//ユーザー名はJohn Doe、メールアドレスはjohn@example.comとします。

// DB接続関数
function dbConnect(){
    // PDOでDBに接続するための準備
    $dsn = 'mysql:dbname=sample;host=localhost;charset=utf8;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock';
    $user = 'root';
    $pass = 'root';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // エラーモードの設定
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // フェッチモードのデフォ
    ];

    $db = new PDO($dsn, $user, $pass, $options);
    return $db;
}

// 実際の処理
try{
    // ユーザーの追加
    //$name = "test7";
    //$email = "test@7.com";

    $dbh = dbConnect();
    $sql = 'INSERT INTO users (name, email) VALUES(:name, :email)';

    // DB接続とSQLクエリの準備
    $stmt = $dbh->prepare($sql);

    // プレースホルダーにセット
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);


    // クエリの実行
    if($stmt->execute()){
        echo '成功しました！';
        $sql2 = 'SELECT * FROM users';

        $results = $dbh->prepare($sql2);
        $results->execute();

        foreach ($results as $result) {
            print_r($result);
        }

    }else{
        return false;
    }
}catch(PDOException $e){
    echo $e->getMessage();
}