<?php
////////////////////////////////////////
//  ライクコントローラー
////////////////////////////////////////

// 設定を読み込み
include_once('../config.php');

// 便利な関数を読み込み
include_once('../util.php');

// いいね！データ操作モデルを読み込み
include_once('../Models/likes.php');

// ツイートデータ操作モデルを読み込み
include_once('../Models/tweets.php');

// 通知データ操作モデルを読み込み
include_once('../Models/notifications.php');

// ログインしているか
$user = getUserSession();
if (!$user) {
    // ログインしていない
    header('HTTP/1.0 404 Not Found');
    exit;
}

// いいね！する
$like_id = null;
if (isset($_POST['tweet_id'])) {
    $data = [
        'tweet_id' => $_POST['tweet_id'],
        'user_id' => $user['id'],
    ];
    // いいね！登録
    $like_id = createLike($data);

    // ツイートを取得
    $tweet = findTweet($_POST['tweet_id']);

    // 通知を送信
    if ($tweet) {
        $data_notification = [
            'recieved_user_id' => $tweet['user_id'],
            'sent_user_id' => $user['id'],
            'message' => 'いいね！されました。'
        ];
        createNotification($data_notification);
    }
}

// いいね!IDが指定されている場合は、いいね！を削除
if (isset($_POST['like_id'])) {
    $data = [
        'like_id' => $_POST['like_id'],
        'user_id' => $user['id'],
    ];
    // いいね！削除
    // TODO:後で作成
    deleteLike($data);
}

// JSON形式で結果を返却
$response = [
    'message' => 'successful',
    // いいね！した時、値が入る
    'like_id' => $like_id,
];
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);

?>