<?php

//問題1: 簡単な計算関数の定義
//与えられた2つの数値に対して、その和、差、積、商を計算し、結果を配列として返すユーザー定義関数calculateOperationsを作成してください。

// 変数定義
$results = array();

if(isset($_POST['num1']) && isset($_POST['num2']) ){

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    // $num2が0の場合、割り算はエラーになるのでバリデーション
    if($num2 == 0){
        $msg = '0は入力できません';
        $error = 'error';
    }else{
        calculateOperations($num1, $num2);
    }

}

function calculateOperations($num1, $num2){
    // 足し算
    $sum = $num1 + $num2;
    // 引き算
    $diff = $num1 - $num2;
    // 掛け算
    $prod = $num1 * $num2;
    // 割り算
    $quot = $num1 / $num2;
    
    global $results;
    array_push($results, $sum, $diff, $prod, $quot);

    print_r($results);
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="num1">数値1:</label>
    <input id="num1" type="number" name="num1" placeholder="数値を入力してください" required>

    <label for="num2">数値2:</label>
    <input id="num2" type="number" name="num2" placeholder="数値を入力してください" required>
    <p class="<?php echo (!empty($error))? $error: '';?>">
        <?php echo (!empty($msg))? $msg: ''; ?>
    </p>

    <input type="submit" value="計算する！" class="c-submit">

</form>

<h3>結果：(和・差・積・商の順に表示されます)</h3>
<?php foreach($results as $result): ?>
<p><?php echo $result; ?></p>
<?php endforeach;?>

<style>
    input{
        width: 180px;
        display: block;
    }
    .error{
        color: red;
    }
    .c-submit{
        background: #9999e8;
        width: 120px;
    }
</style>
</body>
</html>
