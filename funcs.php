<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = 'php04';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck() ※ひとつに「共通化」
function loginCheck(){
    if($_SESSION['chk_ssid'] != session_id() ){
        exit('LOGIN ERROR ログインエラーです！不正アクセスです！'); 
    }else{
        session_regenerate_id(true); //新しく鍵を発行しなおす
        // login_act.phpで記載したセッションIDを記載
        $_SESSION['chk_ssid'] = session_id();
    }
}

// 管理者チェック
function kanriCheck(){
    if($_SESSION['kanri_flg'] !=1){
        exit('LOGIN ERROR 管理者権限がありません');
}}


