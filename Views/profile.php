<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-twitterblue.svg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" defer></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script>
    <!-- いいね！JS -->
    <script src="js/like.js" defer></script>
    <title>プロフィール画面 / Twitterクローン</title>
    <meta name="description" content="プロフィール画面です">
</head>
<body class='home profile text-center'>
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column">
                <li class="nav-item"><a href="home.php" class="nav-link"><img src="img/logo-twitterblue.svg" alt="" class="icon"></a></li>
                <li class="nav-item"><a href="home.php" class="nav-link"><img src="img/icon-home.svg" alt=""></a></li>
                <li class="nav-item"><a href="search.php" class="nav-link"><img src="img/icon-search.svg" alt=""></a></li>
                <li class="nav-item"><a href="notification.php" class="nav-link"><img src="img/icon-notification.svg" alt=""></a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><img src="img/icon-profile.svg" alt=""></a></li>
                <li class="nav-item"><a href="post.php" class="nav-link"><img src="img/icon-post-tweet-twitterblue.svg" alt="" class="post-tweet"></a></li>
                <li class="nav-item my-icon"><img src="img_uploaded/user/sample-person.jpg" class="js-popover" alt="" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>" data-bs-html="true"></li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <h1>太郎</h1>
            </div>
            <div class="profile-area">
                <div class="top">
                    <div class="user"><img src="img_uploaded/user/sample-person.jpg" alt=""></div>

                    <?php if(isset($_GET['user_id'])): ?>
                        <!-- 他人のプロフィール -->
                        <?php if(isset($_GET['case'])): ?>
                            <button class="btn btn-sm">フォローを外す</button>
                        <?php else: ?>
                            <button class="btn btn-sm btn-reverse">フォローする</button>
                        <?php endif;?>
                    <?php else: ?>
                        <!-- 自分のプロフィール -->
                        <button class="btn btn-reverse btn-sm js-modal-button" type="submit" data-bs-toggle="modal" data-bs-target="#js-modal">プロフィール編集</button>

                        <div class="modal fade" id="js-modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="profile.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title">プロフィールを編集</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="user">
                                                <img src="img_uploaded/user/sample-person.jpg" alt="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1">プロフィール写真</label>
                                                <input type="file" class="form-control form-control-sm" name="image">
                                            </div>
                                            <input type="text" class="mb-4 form-control" name="nickname" maxlength="50" value="太郎" placeholder="ニックネーム" required>
                                            <input type="text" class="mb-4 form-control" name="name" maxlength="50" value="taro" placeholder="ユーザ名" required>
                                            <input type="email" class="mb-4 form-control" name="email" maxlength="254" value="taro@teckis.jp" placeholder="メールアドレス" required>
                                            <input type="password" class="mb-4 form-control" name="password" minlength="4" maxlength="128" value="" placeholder="パスワード変更する場合ご入力ください">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-reverse" data-bs-dismiss="modal">キャンセル</button>
                                            <button class="btn" type="submit">保存する</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <div class="name">太郎</div>
                <div class="text-muted">@taro</div>
                <div class="follow-follower">
                    <div class="follow-count">1</div>
                    <div class="follow-text">フォロー中</div>
                    <div class="follow-count">1</div>
                    <div class="follow-text">フォロワー</div>
                </div>
            </div>
            <div class="ditch"></div>
           <!-- TODO後日実装
                ツイート一覧
            -->
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('.js-popover').popover({
                container: 'body'
            })
        }, false);
    </script>
</body>
</html>