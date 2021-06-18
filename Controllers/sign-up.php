<?php
////////////////////////////////////////
//  サインアップコントローラー
////////////////////////////////////////

// 設定を読み込み
include_once('../config.php');

// ユーザーデータ操作モデル読み込み
include_once('../Models/users.php');

// エラー格納用
$error_messages = [];

// ユーザー作成
// 今回は$_POSTを使っていますが、filter_input()と言う便利な関数があります。
if (isset($_POST['nickname']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $data = [
        'nickname' => (string)$_POST['nickname'],
        'name' => (string)$_POST['name'],
        'email' => (string)$_POST['email'],
        'password' => (string)$_POST['password']
    ];

    // 文字数制限
    $length = mb_strlen($data['nickname']);
    if ($length < 1 || $length > 50) {
        $error_messages[] = 'ニックネームは1~50文字にしてください';
    }

    // メールアドレス
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $error_messages[] = 'メールアドレスが不正です';
    }

    // 既存チェック
    if (findUser($data['email'])) {
        $error_messages[] = 'このメールアドレスは使用されています';
    }

     // ユーザー名既存チェック
     if (findUser($data['name'])) {
        $error_messages[] = 'このユーザー名は使用されています';
    }

    // エラーがなければ登録
    if (!$error_messages) {
        if (createUser($data)){
            // ログイン画面に遷移
            header('Location:'. HOME_URL .'Controllers/sign-in.php');
        }
    }


}

// 画面表示

include_once('../Views/sign-up.php');
?>
