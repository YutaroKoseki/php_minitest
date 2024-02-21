<?php

//問題 4: データの削除
//特定の条件を満たすレコード（例えば、idが5未満のユーザー）を
//usersテーブルから削除するPHPコードを書いてください。

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
    // SQLクエリ実行の準備
    $dbh = dbConnect();
    // 現状の状態をチェックするSQL
    $sql1 = 'SELECT * FROM users';
    $stmt = $dbh->prepare($sql1);

    if($stmt->execute()) {
        echo 'DELETE実行前：<br>';
        while ($row = $stmt->fetch()) {
            print_r($row);
            echo '<br><br>';
        }
    }

    // id = 2のユーザー情報を削除
    $sql2 = 'DELETE FROM users WHERE id = 2';

    $stmt = $dbh->prepare($sql2);

    if($stmt->execute()) {
        // DELETE成功
        echo '削除しました。<br><br>';
    }

    // 再度テーブルを確認
    $stmt = $dbh->prepare($sql1);

    if($stmt->execute()){
        echo 'DELETE処理実行後:<br>';
        while ($row = $stmt->fetch()){
            print_r($row);
            echo '<br><br>';
        }
    }


}catch(PDOException $e){
    echo $e->getMessage();
}