<?php
// トークンを設定
session_start();
// uniqid()＋random_bytes()＋trueで現在時刻をもとにした一意な文字列をトークンとして生成
$token = uniqid(bin2hex(random_bytes(13)), true);
$_SESSION['token'] = $token;

?>

...

<input type="hidden" name="token" value="<?php print $token?>" />

...
</form>

→

<?php
// 判定側

    session_start();
    if(!iseet($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
        die('不正なアクセスが行われました');
    }
