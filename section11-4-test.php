<?php

// ================================================
// SQLインジェクションによる攻撃に対する
// ================================================

// DB接続
$dsn = 'mysql:dbname=sampl;host=localhost;charset=utf8;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock';
$user = 'root';
$pass = 'root';

try{
    // DB接続
    $dbh = new PDO($dsn, $user, $pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // ここでプリペアードステートメントを使用
    $sql = 'INSERT INTO users (name, email) VALUES (:name, :email)';
    $stmt = $dbh->prepare($sql);

    // 悪意のある入力例
    $attackName = "'; DROP TABLE users; --";
    $attackMail = "attack@suruze.com";

    // プリペアードステートメントに値をバインド
    $stmt->bindValue(':name',$attackName);
    $stmt->bindValue(':email', $attackMail);

    // SQLクエリの実行
    //$result = $stmt->execute();

    echo $result;

}catch (PDOException $e){
    echo $e->getMessage();
}



