<?php
    if($_GET["check"] == "get"){
        if(!isset($_SESSION["uname"]))
            {echo("NULL");exit();}
    }
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
    $uname = $_GET["uname"];
    $pwd_hash = $_GET["password"];
    $email = $_GET["access"];
    $req = "SELECT COUNT(*) FROM users WHERE username=\"$uname\"";
    $result = mysqli_query($sqlconn, $req);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $c = $row["COUNT(*)"];
        }
    } else {
        echo "0 results (count)";
    }
    if($c == 0){
        $req = "INSERT INTO `users`(`uname`, `password`, `access`) VALUES (\"$uname\",\"$password\",\'$access\')";
        mysqli_query($sqlconn, $req);
        echo "You are regitrated successfully!";
    }else{
        echo "User with this name is already registrated";
    }
    mysqli_close($sqlconn);
?>