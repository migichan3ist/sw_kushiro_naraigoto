<?php
    ini_set('mbstring.internal_encoding', 'UTF-8');

    require_once 'function.php';
    $db = dbConnect();

    $sql = "SELECT * FROM person";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    
    $id = $_POST["selectusername"];
    $time = $_POST["selecttime"] .":00:00";
    $time = date_create($time);
    $timestamp = date_format($time, 'H:i:s');

    try {
        $db = dbConnect();

        $sql = "UPDATE person SET start_time = :start_time WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':start_time' ,$timestamp, PDO::PARAM_STR);
        $stmt->execute();
    
    } catch (PDOException $e) {
        echo "接続失敗:" .$e->getMessage(). "\n";
    } finally {
        $db = null;
    }
        /*
    * 共通の記述
    */
    // composerでインストールしたライブラリを読み込む
    require_once __DIR__.'/vendor/autoload.php';

    // サービスアカウント作成時にダウンロードしたjsonファイル
    $aimJsonPath = __DIR__ . '';

    // サービスオブジェクトを作成
    $client = new Google_Client();

    // このアプリケーション名
    $client->setApplicationName('カレンダー操作テスト イベントの取得');

    // ※ 注意ポイント: 権限の指定
    // 予定を取得する時は Google_Service_Calendar::CALENDAR_READONLY
    // 予定を追加する時は Google_Service_Calendar::CALENDAR_EVENTS
    // $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);

    // ユーザーアカウントのjsonを指定
    $client->setAuthConfig($aimJsonPath);

    // サービスオブジェクトの用意
    $service = new Google_Service_Calendar($client);

        /*
    * 予定の追加
    */
    // カレンダーID
    // $calendarId = 'sw-kushiro@sw-kushiro.iam.gserviceaccount.com';
    $calendarId = 'sw-kushiro@sw-kushiro.iam.gserviceaccount.com';

    $event = new Google_Service_Calendar_Event(array(
        'summary' => 'テスト予定登録', //予定のタイトル
        'start' => array(
            'date' => '2022-06-27',// 開始日時
        ),
        'end' => array(
            'date' => '2022-06-28', // 終了日時
        ),
    ));

    $events = $service->events->insert($calendarId, $event);
?>

<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="nextbutton">
            <p>『<a href="https://calendar.google.com/calendar/u/0/r/month/2022/6/1" target="_blank">みぎー様の<?php echo $_POST["selecttime"]. "時から"?></a>』の予定を追加しました。</p>
            <a href="opencamera2.html">新規登録</a>
            <a href="list.php">登録者リストへ</a>
        </div>
    </body>
</html>