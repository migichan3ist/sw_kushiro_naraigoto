<?php
ini_set('mbstring.internal_encoding', 'UTF-8');

//var_dump($_SESSION["team_key"]);
require_once 'function.php'; // for user-defined function

// try {

$db = dbConnect();

$sql = "SELECT * FROM person";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

// var_dump($result);

#選手データを格納している部分
for ($i = 0; $i < count($result); $i++) {
    $id[] = $result[$i]["id"];
    $name[] = $result[$i]["name"];
}
// var_dump($kasi);
?>

<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="inputside">
            <form action="./make_schdule_complete.php" method="post">
                <div class="title">
                    <h1>
                        スケジュール設定
                    </h1>
                </div>
                <div class="selectnameside">
                    <div class="inputname">
                        予定を入力する人の名前を選択してください
                    </div>
                    <div class="inputtext">
                        <?php
                            echo '<select id="selectside" name="selectusername">';
                            for ($i = 0; $i < count($id); $i++) {
                                echo '<option value=' .$id[$i]. '>' .$name[$i]. '</option>';
                                // echo '<input type="hidden" value='. $name[$i] .' name=' .$id. '">"';echo "</select>";
                            }
                            echo "</select>";
                        ?>
                    </div>
                </div>
                <div class="alfanameside">
                    <div class="inputname">
                        開始時刻
                    </div>
                    <div class="inputtext">
                        <?php
                            echo '<select id="selectside" name="selecttime">';
                            for ($i = 1; $i < 25; $i++) {
                                echo '<option value=' .$i. '>' .$i. '時</option>';
                            }
                            echo "</select>";
                        ?>
                    </div>
                </div>
                <div class="nextbutton">
                    <input type="submit" value="登録">
                </div>
            </form>
    </body>
</html>