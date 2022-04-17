<?php
    //Production DataBase
    $sqlacc = file("database.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $host = $sqlacc[0];
    $uname = $sqlacc[1];
    $password = $sqlacc[2];
    $dbname = $sqlacc[3];
    $sqlconn = mysqli_connect($host, $uname, $password, $dbname);
    $newscount = 0;
    if(!$sqlconn){
        echo ("ERROR");
    }

    $request = "SELECT * FROM markers WHERE (lat < (" . $_GET["lat"] . "+" . $_GET["range"] . ") AND lat > (" . $_GET["lat"] . "-" . $_GET["range"] . ") AND lng < (" . $_GET["lng"] . "+" . $_GET["range"] . ") AND lng > (" . $_GET["lng"] . "-" . $_GET["range"] . ")";
    $result = mysqli_query($sqlconn, $request);
    // В цикле выведем все полученные данные
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo($row['addr']." ".$row['lat']." ".$row['lng']);
            // echo "YEP";
        }
    }
    mysqli_close($sqlconn);
?>