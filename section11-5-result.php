<?php
session_start();
// 生成したトークンとセッションのトークンを比較
if(!empty($_POST)){
    if(!empty($_SESSION['token']) && $_SESSION['token'] === $_POST['token']){
        echo 'トークンが一致しました！';
    }else{
        echo '不正な操作が行われました';
    }
}
