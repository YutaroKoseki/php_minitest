<?php

//問題 1: データベースへの接続
//PHPでMySQLデータベースに接続するためのコードを書いてください。
//データベースのホスト名はlocalhost、ユーザー名はuser、パスワードはpassword、データベース名はmy_databaseです。

// PDOでDBに接続するための準備
// ホスト名:localhost、ユーザー名:root、パスワード:root、データベース名:sample　で実際のサンプルDBに接続
$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock';
$user = 'root';
$pass = 'root';

try{
    $db = new PDO($dsn, $user, $pass);
    echo '接続成功！';
}catch(PDOException $e){
    echo $e->getMessage();
}


