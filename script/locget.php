<?php
    //Production DataBase
    $pdb = new SQLite3("kazecotech.db");
    if(!$pdb) {
        exit("Failed to open DB");
    }
    $sqlrequest = "SELECT * FROM markers WHERE (lat < (" . $_GET["lat"] . "+" . $_GET["range"] . ") AND lat > (" . $_GET["lat"] . "-" . $_GET["range"] . ") AND lng < (" . $_GET["lng"] . "+" . $_GET["range"] . ") AND lng > (" . $_GET["lng"] . "-" . $_GET["range"] . ")";
    $query = sqlite_query($db, $sqlrequest);
    // В цикле выведем все полученные данные
    while ($array = sqlite_fetch_array($query))
    {
      echo($array['addr']." ".$array['lat']." ".$array['lng']);
    }
?>