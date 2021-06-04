<?php
////////////////////////////////////////
//  サインアップコントローラー
////////////////////////////////////////

// 設定を読み込み
include_once('../config.php');

// ユーザーデータ操作モデル読み込み
include_once('../Models/users.php');

// ユーザー作成
// 今回は$_POSTを使っていますが、filter_input()と言う便利な関数があります。
if (isset($_POST['nickname']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $data = [
        'nickname' => $_POST['nickname'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    if (createUser($data)){
        // ログイン画面に遷移
        header('Location:'. HOME_URL .'Controllers/sign-in.php');
    }
}

// 画面表示

include_once('../Views/sign-up.php');
?>
