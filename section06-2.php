<?php
if (isset($_POST)) {
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    if (!empty($search)) {
        $result = countCharacter($text, $search);

        if($result != 0){
            $msg = "結果：{$result}個存在します！";
        }elseif($result == 0) {
            $msg = "検索された文字は存在しませんでした";
        }
    }else{
        $msg = "検索する文字が入力されていません。";
    }
}

function countCharacter($text, $search) {
    $result = substr_count($text, $search);
    return $result;
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小テスト6-2</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="text">検索対象の文章：</label>
    <textarea name="text" id="text" cols="30" rows="10" placeholder="ここにテキストを入力してください" required></textarea>

    <label for="search">検索したい文字：</label>
    <input type="text" name="search" placeholder="ここに数えたい文字を入力してください" required>

    <input type="submit" value="検索する" class="c-submit">
</form>

<?php if(isset($_POST)): ?>

    <?php if(isset($msg)):?>
        <p class="p-result"><?php echo $msg; ?></p>
    <?php endif;?>

<?php endif;?>


<style>
    input,textarea{
        display: block;
        margin: 0 0 30px;
        width: 250px;
    }
    .c-submit{
        margin: 30px 0;
        width: 150px;
    }
    .p-result{
        background: beige;
    }
</style>
</body>
</html>
