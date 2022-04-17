<?php
    //Production DataBase
    class PDB extends SQLite3 {
        function __construct() {
           $this->open('../kazecotech.db');
        }
     }
    $pdb = new PDB();
    if(!$pdb) {
        exit("Failed to open DB");
    }
    $sqlrequest = "SELECT * FROM markers WHERE (lat < (" . $_GET["lat"] . "+" . $_GET["range"] . ") AND lat > (" . $_GET["lat"] . "-" . $_GET["range"] . ") AND lng < (" . $_GET["lng"] . "+" . $_GET["range"] . ") AND lng > (" . $_GET["lng"] . "-" . $_GET["range"] . ")";
    $query = $pdb->query($sqlrequest);
    // В цикле выведем все полученные данные
    if(!$query){
        echo ($_GET["addr"] . " " . $_GET["lat"] . " " . $_GET["lng"]);
    }
    while ($array = $query->fetchArray(SQLITE3_ASSOC))
    {
      echo($array['addr']." ".$array['lat']." ".$array['lng']);
    }
    $pdb->close();
?>