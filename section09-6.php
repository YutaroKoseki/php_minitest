<?php

//問題 6: トランザクション処理
//あなたは、あるオンラインストアのウェブアプリケーションを開発しています。顧客の注文処理をデータベースで管理する必要があります。
//ordersテーブルには、id（注文ID）、customer_name（顧客名）、amount（注文金額）の3つのカラムが存在します。
//新しい注文を追加する際に、トランザクションを使用して注文データの挿入を行います。
//この処理では、新しい注文をordersテーブルに挿入し、挿入が成功した場合はトランザクションをコミットします。
//挿入に失敗した場合は、トランザクションをロールバックして、注文がデータベースに反映されないようにします。
//このシナリオに基づいた簡単なPHPコードを記述してください。

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


// 処理
if(!empty($_POST['confirm'])){
    try{
        // 準備
        $dbh = dbConnect();
        // 今回はバリデーションは省略
        $customer_name = $_POST['name'];
        $amount = $_POST['count'] * 1000; // テキトーに1000かけた数値が注文金額とする
        $sql1 = 'INSERT INTO order (customer_name, amount) VALUES(:customer_name, :amount)';

        // トランザクションの有効化（例えば「在庫数の変化」だったり、「ユーザーの所持金の減少」とかもあるだろうけど、省略・・・。）
        $dbh->beginTransaction();

        $stmt = $dbh->prepare($sql1);
        // プレースホルダーに値をセット
        $stmt->bindValue(':customer_name', $customer_name);
        $stmt->bindValue(':amount', $amount);

        if($stmt->execute()) {
            echo '処理成功。<br>';
            // 成功した場合トランザクションをコミット
            $dbh->commit();

            // 状態の確認
            $sql2 = 'SELECT * FROM orders';

            $stmt = $dbh->prepare($sql2);
            if ($stmt->execute()) {
                while ($row = $stmt->fetch()) {
                    print_r($row);
                    echo '<br><br>';
                }
            }
        }

    }catch(PDOException $e){
        // ロールバック
        if(isset($dbh)){
            $dbh->rollBack();
        }
        echo $e->getMessage();
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
    <title>小テスト9-6</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="name">ユーザー名：</label>
    <input id="name" type="text" name="name" placeholder="ユーザー名を入力してください" required>

    <label for="amount">注文個数：</label>
    <input id="amount" type="number" name="count" placeholder="個数を入れてください" required>

    <input type="submit" value="注文を確定する" name="confirm">
</form>

<style>
    label{
        display: block;
    }
    input{
        display: block;
        margin-bottom: 30px;
        width: 180px;
    }
</style>
</body>
</html>
