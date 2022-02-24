<?php
// 0. SESSION開始！！
session_start();

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。

// if(セッションがなかったら＝エラー、不正アクセス疑惑){
// 処理を停めて終了

// }else{
// セッションIDがあったら＝正しいログインの場合


// 新しく鍵を発行しなおす=session_regenerate_id(true);
// 新しい鍵を、サーバー側の保存する箱に更新しなおす
// }

// if($_SESSION['chk_ssid'] != session_id() ){
//     exit('LOGIN ERROR ログインエラーです！不正アクセスです！'); 
// }else{
//     session_regenerate_id(true); //新しく鍵を発行しなおす
//     // login_act.phpで記載したセッションIDを記載
//     $_SESSION['chk_ssid'] = session_id();
// }


//１．関数群の読み込み
require_once('funcs.php');

// 1-1 ログインチェックのfunctionを使う ※require_once('funcs.php');のあとで書かないと動かないよ！！
// session_startのあとに記載する。
// loginCheck();


//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM testament_an_table');
$status = $stmt->execute();

// $flg = $_SESSION['kanri_flg'];



//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="detail.php?id=' . $r["id"] . '">';
        $view .= h($r['id']) . " " . h($r['testator_name']) . "様の遺言　　　作成日：" . h($r['indate']);
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r['id'] . '">';
        $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>遺言書作成</title>
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="style.css">
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <style>div{padding: 10px;font-size:16px;}</style> -->
</head>
<body id="main">
<!-- Head[Start] -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
    <button type="button" onclick="location.href='index.php'" class="link_button">データ登録</button><br>
    <button type="button" onclick="location.href='login.php'" class="link_button">別の利用者名でログイン</button><br>
    <button type="button" onclick="location.href='logout.php'" class="link_button">ログアウト</button>
    <button type="button" onclick="location.href='user_kanri.php'" class="link_button">

</div>



    <!-- <input type="button" a class="navbar-brand" href="index.php" value="データ登録" ></input><br> -->
      <!-- <a class="navbar-brand" href="login.php">別の利用者名でログイン</a><br> -->
      <!-- <a class="navbar-brand" href="logout.php">ログアウト</a> -->
<!-- <div class="container flex right">
<div>利用者名：</div>
     
<div>様</div>
</div> -->

      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<script>

</script>
<div class="demo">
    <div class="container"><?= $view ?></div>
</div>
<!-- Main[End] -->
<script>
$(".container").on(
    mouseenter , function(){
$(".container").fadeto(500, 0.2);


};

</script>


</body>
</html>
