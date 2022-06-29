<?php
    header("Content-type: text/plain; charset=UTF-8");
    ini_set('mbstring.internal_encoding' , 'UTF-8');
 
    $data = str_replace('data:image/png;base64,', '', $_POST["img"]);  // 冒頭の部分を削除
    $data = str_replace(' ', '+', $data);  // 空白を'+'に変換
    $image = base64_decode($data);

    // ファイルへ保存
    $file = "save.png";    //ファイル名を作成
    $result = file_put_contents($file, $image, LOCK_EX);

    //-------------------------------------------------
    // 結果を返却
    //-------------------------------------------------
    if( $result !== false ){
        sendResult(true, $file);  // ブラウザにファイル名を返却する
    }
    else{
    // 書き込みエラー
        sendResult(false, 'Can not write image data');
    }


    /**
     * POSTで渡されたJSONを取得する
     *
     * @return object
     */
    function getParamJSON(){
        $buff = file_get_contents('php://input');
        $json = json_decode($buff, true);

        return($json);
    }

    /**
     * 結果をJSON形式で返却
     *
     * @param  boolean $status 成功:true, 失敗:false
     * @param  mixed   $data   ブラウザに返却するデータ
     * @return void
     */
    function sendResult($status, $data){
        // CORS (必要に応じて指定)
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');

        echo json_encode([
            "status" => $status,
            "result" => $data
        ]);
    }
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <script>
        alert("JavaScriptで文字列が文字化けする理由");
        </script>

    </head>
    <body>
    </body>
</html>
  