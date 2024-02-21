<?php

//問題 3: 複数行のデータ取得と表示
//usersテーブルからすべてのレコードを取得し、各ユーザーの名前とメールアドレスを表形式で表示するPHPコードを書いてください。

// DB接続関数
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

// サニタイズ
function sanitize($str){
    return htmlspecialchars($str, ENT_QUOTES|ENT_HTML5, 'UTF-8');
}

try{
    // SQLクエリ実行の準備
    $dbh = dbConnect();
    $sql = 'SELECT * FROM users';

    $stmt = $dbh->prepare($sql);

// SQLクエリ実行
    if($stmt->execute()){
        echo '成功';
        // 成功した場合は表形式で各ユーザーの名前とメールアドレスを表示（今回はこっちで出力しちゃう。。）
        echo '<table style="padding: 10px 15px;">';
        echo '<th style="border:1px solid #1e1e1e; border-right: none;">ユーザー名</th>';
        echo '<th style="border:1px solid #1e1e1e;">メールアドレス</th>';

        // fetchメソッドを用いて展開
        while($row = $stmt->fetch()){
            echo '<tr>';
            echo '<td style="border:1px solid #1e1e1e; padding: 10px 15px;">'. sanitize($row['name']).'</td>';
            echo '<td style="border:1px solid #1e1e1e; padding: 10px 15px;">'. sanitize($row['email']). '</td>';
            echo '</tr>';
        }
        echo '</table>';

    }else{
        return false;
    }

}catch (PDOException $e){
    echo $e->getMessage();
}
