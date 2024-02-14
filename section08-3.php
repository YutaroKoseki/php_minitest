<?php

//問題3: アップロードされたファイルの情報表示
//ユーザーがアップロードしたファイルの情報（ファイル名、ファイルタイプ、ファイルサイズ）を表示するPHPスクリプトを書いてください。

//var_dump($_FILES['upload']);

if(!empty($_POST)){

    // try-catchじゃなく『独習PHP』P397のサンプルコードほぼ丸写し

    // アップロード処理の成否をチェック
    if($_FILES['upload']['error'] !== UPLOAD_ERR_OK){
        $msg = [
            UPLOAD_ERR_INI_SIZE   => 'ファイルサイズが上限を超えています',
            UPLOAD_ERR_FORM_SIZE  => 'ファイルサイズがオーバーしています',
            UPLOAD_ERR_PARTIAL    => 'ファイルが一部しかアップロードされてません',
            UPLOAD_ERR_NO_FILE    => 'アップロードに失敗しました',
            UPLOAD_ERR_NO_TMP_DIR => '保存先が見つかりません',
            UPLOAD_ERR_CANT_WRITE => '保存に失敗しました',
            UPLOAD_ERR_EXTENSION  => 'エラーが発生しました'
        ];
        // エラーメッセージを格納
        $err_msg = $msg[$_FILES['upload']['error']];

    // アップロードされたものが画像かをチェック
    }elseif(!in_array(
        finfo_file(finfo_open( FILEINFO_MIME_TYPE),
            $_FILES['upload']['tmp_name'] ), ['image/gif', 'image/jpg', 'image/jpeg', 'image/png', 'image/heif']) ){
        $err_msg = '画像以外はアップロードできません';

    // エラーがない場合はアップロードファイルの情報を出力
    }else{
        echo 'ファイル名： '. $_FILES['upload']['name'] . '<br />';
        echo 'ファイルタイプ：'. $_FILES['upload']['type']. '<br />';
        echo 'ファイルサイズ：'. $_FILES['upload']['size'];

        // 画像のフルパス
        $src = $_FILES['upload']['full_path'];
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
    <title>小テスト8-3</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <div class="file__box">
        <input type="hidden" name="max_file_size" value="1000000">

        <label for="upload" class="file-label">クリックして画像を選択：</label>
        <input id="upload" type="file" name="upload" size="40" class="file__input">

    </div>
    <input type="submit" value="アップロード">

</form>

<style>
    .file__box{
        height: 250px;
        padding: 50px 0;
        position: relative;
        width: 300px;
    }
    .file__input{
        width: 100%;
        height: 100%;
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
    }
    .file-label{
        background: #fff;
        border:2px dotted #c8c2bc;
        color: #c8c2bc;
        display: block;
        height: 250px;
        line-height: 250px;
        margin: 0 auto;
        padding-left: 50px;
        width: 100%%;
    }
</style>
</body>
</html>
