<?php
    ini_set('mbstring.internal_encoding', 'UTF-8');
    
    $name = $_POST["username"];
    $imgname = "./img/" .$_POST["alfaname"]. ".png";
    rename("./save.png", $imgname);
    $department = $_POST["companyname"];
    $contents = $_POST["contents"];
    $hobby = $_POST["hobby"];

    require_once 'function.php'; // for user-defined function
    try {
        $db = dbConnect();
    
        $sql = "INSERT INTO person(name, img, department, contents, hobby)VALUES(:name, :img, :department, :contents, :hobby)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':img', $imgname, PDO::PARAM_STR);
        $stmt->bindParam(':department', $department, PDO::PARAM_STR);
        $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
        $stmt->bindParam(':hobby', $hobby, PDO::PARAM_STR);
        $stmt->execute();
    
    } catch (PDOException $e) {
        echo "接続失敗:" .$e->getMessage(). "\n";
    } finally {
        $db = null;
    }
?>

<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="inputside">
            <div class="title">
                <h1>
                    自己紹介記入覧
                </h1>
            </div>
            <div class="imgside">
                <div class="outputimg">
                    <img src="save.png" alt="">
                </div>
            </div>
            <div class="nameside">
                <div class="outputname">
                    名前：
                </div>
                <div class="outputtext">
                    <?php echo $_POST["username"];?>
                </div>
            </div>
            <div class="company">
                <div class="outputname">
                    会社名：
                </div>
                <div class="outputtext">
                <?php echo $_POST["companyname"];?>
                </div>
            </div>
            <div class="contentsside">
                <div class="outputname">
                    仕事内容：
                </div>
                <div class="outputtext">
                    <?php echo $_POST["contents"];?>
                </div>
            </div>
            <div class="hobbyside">
                <div class="outputname">
                    趣味：
                </div>
                <div class="outputtext">
                    <?php echo $_POST["hobby"];?>
                </div>
            </div>
        <div class="nextbutton">
            <a href="opencamera2.html">新規登録</a>
            <a href="list.php">登録者リストへ</a>
        </div>
    </body>
</html>