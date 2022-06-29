<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="inputside">
            <form action="./output.php" method="post">
                <div class="title">
                    <h1>
                        自己紹介記入覧
                    </h1>
                </div>

                <div class="inputmainside">
                    <div class="nameside">
                        <div class="inputname">
                            名前：
                        </div>
                        <div class="inputtext">
                            <input type="text" id="textbox" name="username" value="みぎー">
                        </div>
                    </div>
                    <div class="alfanameside">
                        <div class="inputname">
                            名前(ローマ字)：
                        </div>
                        <div class="inputtext">
                            <input type="text" id="textbox" name="alfaname" value="migie">
                        </div>
                    </div>
                    <div class="company">
                        <div class="inputname">
                            会社名：
                        </div>
                        <div class="inputtext">
                            <input type="text" id="textbox" name="companyname" value="和商市場">
                        </div>
                    </div>
                    <div class="contentsside">
                        <div class="inputname">
                            仕事内容：
                        </div>
                        <div class="inputtext">
                            <input type="text" id="textbox" name="contents" value="漁師">
                        </div>
                    </div>
                    <div class="hobbyside">
                        <div class="inputname">
                            趣味：
                        </div>
                        <div class="inputtext">
                            <input type="text" id="textbox" name="hobby" value="サウナ">
                        </div>
                    </div>
                </div>
                <div class="nextbutton">
                    <input type="submit" value="登録">
                </div>
            </form>
    </body>
</html>