<?php
    ini_set('mbstring.internal_encoding', 'UTF-8');
    require_once 'function.php'; // for user-defined function

    $db = dbConnect();
    $sql = "SELECT * FROM person";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    #選手データを格納している部分
    for ($i = 0; $i < count($result); $i++) {
        $id[] = $result[$i]["id"];
        $name[] = $result[$i]["name"];
        $img[] = $result[$i]["img"];
        $department[] = $result[$i]["department"];
        $contents[] = $result[$i]["contents"];
        $hobby[] = $result[$i]["hobby"];
        $start_time[] = $result[$i]["start_time"];
    }
?>

<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="inputside">
            <div class="title">
                <h1>
                    自己紹介記入覧
                </h1>
            </div>
            <div class="allchara">
            <?php
                for ($i = 0; $i < count($id); $i++) {
            ?>
                <div class="charaside">
                    <div class="imgside">
                        <div class="outputimg">
                            <?php echo '<img src="' .$img[$i]. '" alt="">'; ?>
                        </div>
                    </div>
                    <div class="nameside">
                        <div class="outputname">
                            名前：
                        </div>
                        <div class="outputtext">
                            <?php echo $name[$i];?>
                        </div>
                    </div>
                    <div class="company">
                        <div class="outputname">
                            会社名：
                        </div>
                        <div class="outputtext">
                        <?php echo $department[$i];?>
                        </div>
                    </div>
                    <div class="contentsside">
                        <div class="outputname">
                            仕事内容：
                        </div>
                        <div class="outputtext">
                            <?php echo $contents[$i];?>
                        </div>
                    </div>
                    <div class="hobbyside">
                        <div class="outputname">
                            趣味：
                        </div>
                        <div class="outputtext">
                            <?php echo $hobby[$i];?>
                        </div>
                    </div>
                    <div class="timeside">
                        <div class="outputname">
                            会う時間：
                        </div>
                        <div class="outputtext">
                            <?php echo $start_time[$i];?>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
        <div class="nextbutton">
            <a href="opencamera2.html">新規登録</a>
            <a href="make_schdule.php">日程調整へ</a>
        </div>
    </body>
</html>