<?php
session_start();
// 1.GETでid値を取得
$id = $_GET["id"];
// echo $id;
// exit;

// ２．DB接続など
require_once('funcs.php');
// ↑これを最初に呼び出す
loginCheck();
$pdo = db_conn();
// ↑その上で関数にする

// try {
//     $pdo = new PDO('mysql:dbname=testament;charset=utf8;host=localhost', 'root', 'root');
// } catch (PDOException $e) {
//     exit('DBConnectError:' . $e->getMessage());
// }

//  ３．SELECT
$sql = "SELECT * FROM testament_an_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();



// ４．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    //１データのみ抽出の場合はwhileループで取り出さない
    $result = $stmt->fetch();
}
?>




<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>遺言書変更フォーム</title>
    <link href="style.css" rel="stylesheet">
    <link href="reset.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend class="form">遺言書変更フォーム</legend>

                <!-- 遺言者氏名 -->
                <p style="display: inline;">遺言作成者のお名前<input type="text" name="testator_name" value="<?= $result["testator_name"] ?>"  class="label" placeholder="例）山田太郎"></p><br>

                <!-- 遺言者住所 -->
                <!-- 本当は郵便番号から住所表示させて、name属性つけたかったけど、各住所項目にそれぞれname付けないといけないのか？？ -->
                <p style="display: inline;">遺言作成者の住所<br><textArea name="testator_address" rows="6" cols="40"   class="fugen" placeholder="例）〒060-0002 北海道札幌市中央区北２条西７丁目 かでる2.7 ４階"><?= $result["testator_address"] ?></textArea></p><br>
                <!-- <div class="err_text" id="err_textbox"></div>
                <div id="app">
                    <p class="cp_iptxt">遺言作成者の郵便番号：
                        <input id="input" class="zipcode" type="text" class="address" value="" placeholder="郵便番号">
                    <div class="address_button">
                        <button id="search" type="button" class="address_search_button">住所検索</button>
                        <p id="error"></p>
                        </p>
                        <p>※住所検索ボタンを押すと住所が自動表示されます</p>
                    </div>
                    <div name="testator_address">
                        <div class="cp_iptxt">
                            <input id="address1" type="text" class="cp_iptxt" value="" placeholder="都道府県">
                        </div>
                        <div class="cp_iptxt">
                            <input id="address2" type="text" class="address" class="cp_iptxt" value="" placeholder="住所１">
                        </div>

                        <div class="cp_iptxt">
                            <input id="address3" type="text" class="address" class="cp_iptxt" value="" placeholder="住所２">
                        </div>
                        <div class="cp_iptxt">
                            <input id="address4" type="text" class="address" value="" placeholder="マンション名等">
                        </div>
                    </div>
                </div> -->
                <!-- 遺言者の誕生日 -->
                <div>遺言の実行をお願いする人の生年月日
                    <input type="date" name="testator_birth" id="" value="<?= $result["testator_birth"] ?>"  class="birth">
                </div>


                <!-- １段目 -->
                <select name="number1" class="number" value="<?= $result["number1"] ?>">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>番
                <select name="property1" class="property" value="<?= $result["property1"] ?>">
                    <option value="">-</option>
                    <option value="不動産">不動産</option>
                    <option value="預貯金">預貯金</option>
                    <option value="株式">株式</option>
                    <option value="自動車">自動車</option>
                </select>
                <select name="relation1" class="relation" value="<?= $result["relation1"] ?>">
                    <option value="">-</option>
                    <option value="子">子</option>
                    <option value="親">親</option>
                    <option value="甥">甥</option>
                    <option value="姪">姪</option>
                    <option value="相続人以外">相続人以外の方</option>
                </select><br>
                <label>渡す相手先の名前<input type="text" name="name1" value="<?= $result["name1"] ?>"   placeholder="例）山田花子" class="trust_name"></label><br>
                <div style="display: inline-block;">
                            <ul class="box">
                                <li><label for="souzoku"><input type="radio" name="method1" id="souzoku" value="相続させる" class="uname" checked>相続人の方に渡す</label></li>
                                <li><label for="izou"><input type="radio" name="method1" id="izou" value="遺贈する" class="uname">相続人以外に渡す</label></li>
                            </ul>
                        </div>  
     </div>

                <!-- ２段目 -->
                <select name="number2" class="number" value="<?= $result["number2"] ?>">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>番
                <select name="property2" class="property" value="<?= $result["property2"] ?>">
                    <option value="">-</option>
                    <option value="不動産">不動産</option>
                    <option value="預貯金">預貯金</option>
                    <option value="株式">株式</option>
                    <option value="自動車">自動車</option>
                </select>
                <select name="relation2" class="relation" value="<?= $result["relation2"] ?>">
                    <option value="">-</option>
                    <option value="子">子</option>
                    <option value="親">親</option>
                    <option value="甥">甥</option>
                    <option value="姪">姪</option>
                    <option value="相続人以外">相続人以外の方</option>
                </select><br>
                <p style="display: inline;">渡す相手先の名前<input type="text" name="name2" value="<?= $result["name2"] ?>" class="trust_name" placeholder="例）佐藤一郎"></p><br>
                <div style="display: inline-block;">
                            <ul class="box">
               
                
                    <li><label for="souzoku"><input type="radio" name="method2" id="souzoku" value="相続させる" class="uname" checked>相続人の方に渡す</label></li>
                    <li><label for="izou"><input type="radio" name="method2" id="izou" value="遺贈する" class="uname">相続人以外に渡す</label></li>
                </ul>
                </div><br>
                <!-- ３段目 -->
                <select name="number3" class="number" value="<?= $result["number3"] ?>">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>番
                <select name="property3" class="property" value="<?= $result["property3"] ?>">
                    <option value="">-</option>
                    <option value="不動産">不動産</option>
                    <option value="預貯金">預貯金</option>
                    <option value="株式">株式</option>
                    <option value="自動車">自動車</option>
                </select>
                <select name="relation3" class="relation" value="<?= $result["relation3"] ?>">
                    <option value="">-</option>
                    <option value="子">子</option>
                    <option value="親">親</option>
                    <option value="甥">甥</option>
                    <option value="姪">姪</option>
                    <option value="相続人以外">相続人以外の方</option>
                </select><br>
                <label>渡す相手先の名前<input type="text" name="name3" value="<?= $result["name3"] ?>" class="trust_name" placeholder="例）鈴木和子"></label><br>
                <div style="display: inline-block;">
                <ul class="box">
                    <li><label for="souzoku"><input type="radio" name="method3" id="souzoku" value="相続させる" class="uname" checked>相続人の方に渡す</label></li>
                    <li><label for="izou"><input type="radio" name="method3" id="izou" value="遺贈する" class="uname">相続人以外に渡す</label></li>
                </ul>
                </div>
                <div class="all">
                    <h3 class="trust_main">遺言により寄付をする場合に入力してください</h3><br>



                <p style="display: inline;">寄付する金額<input type="text" name="amount" value="<?= $result["amount"] ?>" class="amount" placeholder="例）１００万円"></p><br>
                <p style="display: inline;">寄付先の正式名称<input type="text" name="group_name" value="<?= $result["group_name"] ?>"  class="group_name" placeholder="例）公益社団法人北海道社会福祉士会"></p><br>
                <p style="display: inline;">寄付先の住所<br><textArea name="group_address" rows="6" cols="40"  class="fugen" placeholder="例）〒060-0002 北海道札幌市中央区北２条西７丁目 かでる2.7 ４階"><?= $result["group_address"] ?></textArea></p><br>

                <p style="display: inline;">遺言に基づく業務をお願いする方（遺言執行者）の名前<br>
                <input type="text" name="lawyer_name" value="<?= $result["lawyer_name"] ?>"  class="label" placeholder="例）山崎育夫"></p><br>
                <!-- 遺言執行者住所 -->
                <p style="display: inline;">遺言執行者の住所<br><textArea name="lawyer_address" rows="6" cols="40"  class="fugen" placeholder="例）〒060-0001 札幌市中央区北1条西10丁目 札幌弁護士会館7F"><?= $result["lawyer_address"] ?></textArea></p><br>
                <!-- <p class="cp_iptxt">遺言執行者の郵便番号：
                    <input id="input" class="zipcode" type="text" class="address" value="" placeholder="郵便番号">
                <div class="address_button">
                    <button id="search" type="button" class="address_search_button">住所検索</button>
                    <p id="error"></p>
                    </p>
                    <p>※住所検索ボタンを押すと住所が自動表示されます</p> -->
                <!-- </div> -->
                <!-- うまくいくか不明な点 -->
                <!-- <div name="lawyer_address">
                    <div class="cp_iptxt">
                        <input id="address1" type="text" name="address1" class="cp_iptxt" value="" placeholder="都道府県">
                    </div>
                    <div class="cp_iptxt">
                        <input id="address2" type="text" name="address2" class="address" class="cp_iptxt" value="" placeholder="住所１">
                    </div>

                    <div class="cp_iptxt">
                        <input id="address3" type="text" name="address3" class="address" class="cp_iptxt" value="" placeholder="住所２">
                    </div>
                    <div class="cp_iptxt">
                        <input id="address4" type="text" name="address4" class="address" value="" placeholder="マンション名等">
                    </div>
                </div> -->
                <!-- 遺言執行者の生年月日 -->
                <div>遺言執行者の生年月日
                    <input type="date" name="lawyer_birth" id="" value="<?= $result["lawyer_birth"] ?>"  class="birth">
                </div>
                <!-- 付言事項 -->
                <p>家族に特に伝えたいこと</p>
                <div><textArea name="ps" rows="6" cols="80"  class="fugen" placeholder="例）家族仲良くこれからも過ごしてほしい。"><?= $result["ps"] ?></textArea></div><br>

                <!-- ここに１つ追加します -->
        <input type='hidden' name="id" value="<?=$result["id"]?>">
        <!-- ここに１つ追加します -->


                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
    <script>
        $(function() {
            $("#textbox").bind("blur", function() {
                var _textbox = $(this).val();
                check_textbox(_textbox);
            });
        });

        function check_textbox(str) {
            $("#err_textbox p").remove();
            let _result = true;
            let _textbox = $.trim(str);

            if (_textbox.match(/^[\r\n\t]*$/)) {
                $("#err_textbox").append("<p><i class=\"fa fa-exclamation-triangle\"></i>テキストボックスを入力してください。</p>");
                _result = false;
            } else if (_textbox.length > 50) {
                $("#err_textbox").append("<p><i class=\"fa fa-exclamation-triangle\"></i>テキストボックスは50文字以内で入力してください。</p>");
                _result = false;
            }
            return _result;
        }
    </script>
    <script>
        let search = document.getElementById('search');
        search.addEventListener('click', () => {

            let api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
            let error = document.getElementById('error');
            let input = document.getElementById('input');
            let address1 = document.getElementById('address1');
            let address2 = document.getElementById('address2');
            let address3 = document.getElementById('address3');
            let param = input.value.replace("-", ""); //入力された郵便番号から「-」を削除
            let url = api + param;

            fetchJsonp(url, {
                    timeout: 10000, //タイムアウト時間
                })
                .then((response) => {
                    error.textContent = ''; //HTML側のエラーメッセージ初期化
                    return response.json();
                })
                .then((data) => {
                    if (data.status === 400) { //エラー時
                        error.textContent = data.message;
                    } else if (data.results === null) {
                        error.textContent = '郵便番号から住所が見つかりませんでした。';
                    } else {
                        address1.value = data.results[0].address1;
                        address2.value = data.results[0].address2;
                        address3.value = data.results[0].address3;
                    }
                })
                .catch((ex) => { //例外処理
                    console.log(ex);
                });
        }, false);
    </script>
</body>

</html>