<?php

// 問題 4: SQLインジェクション対策
//SQLインジェクション攻撃を防ぐための対策を説明し、プリペアドステートメントを使用した安全なデータベースクエリの例をPHPで示してください。

// ================================================
// どのような対策をするべきか。
// ================================================

echo 'プリペアードステートメント（プレースホルダー）を使用する（PDOの場合、プリペアードステートメントを使うことで自動的に安全な処理をしてくれる）';

// ================================================
// 実装例
// ================================================

// DB接続
$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8;';
$user = 'user';
$pass = 'pass';

try{
    // DB接続
    $dbh = new PDO($dsn, $user, $pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // ここでプリペアードステートメントを使用
    $sql = 'INSERT INTO sample (name, mail, password) VALUES (:name, :mail, :password)';
    $stmt = $dbh->prepare($sql);

    // プリペアードステートメントに値をバインド
    $stmt->bindValue(':name','テスト太郎');
    $stmt->bindValue(':mail', 'test@dayo-n.com');
    $stmt->bindValue(':password', 'password');

    // SQLクエリの実行
    $stmt->execute();

    // 後続の処理は割愛。

}catch (PDOException $e){
    echo $e->getMessage();
}



