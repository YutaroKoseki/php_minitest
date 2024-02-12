<?php

// 7章　小テスト　
// 問題1: DateTimeクラス
//あなたは、ウェブアプリケーションを開発しており、ユーザーが特定のイベントに登録した日時を管理する必要があります。

//DateTimeクラスを使用して以下のタスクを実行するコードを書いてください。
//
//・現在日時を基にDateTimeオブジェクトを生成します。
//・生成した日時から2週間後の日時を計算します。
//・計算結果の日時を「年-月-日 時:分:秒」の形式で出力します。

$now = new DateTime('now', new DateTimeZone('Asia/Tokyo')); // 日本のタイムゾーンに

if(!empty($_POST['submit'])){
    $limitTime = getLimit();
}

function getLimit(){
    global $now;
    $limit = $now->add(new DateInterval('P2W'));

    return $limit->format('Y-m-d H:i:s');
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト7-1</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input name="submit" type="submit" value="登録する!">
</form>

<?php if(empty($limitTime)): ?>
    <p>現在時刻は<?php echo $now->format('Y-m-d H:i:s'); ?></p>
<?php else: ?>
    <p>有効期限は2週間（<?php echo $limitTime; ?>まで）です。</p>
<?php endif; ?>

</body>
</html>
