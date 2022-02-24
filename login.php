<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="reset.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <title>ログイン</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-default">遺言書作成フォーム  ログインページ</nav>
    </header>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" onclick="location.href='index.php'" class="link_button">データ登録画面</button>
                <button type="button" onclick="location.href='demo.php'" class="link_button">デモ画面（ログイン不要）</button>
                <button type="button" onclick="location.href='demo_trust.php'" class="link_button">遺言書作成フォーム見本（ログイン不要）</button>
                <button type="button" onclick="location.href='index.html'" class="link_button">トップページに戻る</button>
                    <!-- <a class="navbar-brand" href="index.php">データ登録</a> -->
                </div>
            </div>
        </nav>
    </header>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="lid" class="label" /><br/>
        PW:<input type="password" name="lpw" class="label" />
        <input type="submit" value="LOGIN" />
    </form>


</body>

</html>
