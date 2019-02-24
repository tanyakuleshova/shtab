<?php

//autoloader doesn't work here

$shtab_db = new mysqli('80.240.19.192', 'shtab', 'jmb7EekxAVByTRpxZ6', 'shtab');
mysqli_query($shtab_db, 'set names utf8');

if(isset($_REQUEST["term"])){

    $param_term = mysqli_real_escape_string($shtab_db, $_REQUEST["term"]);
    
    $sql = "SELECT * FROM news WHERE h1 LIKE '%$param_term%'";
    $rows = mysqli_query($shtab_db, $sql);
    if($rows){
        foreach($rows as $row){
            echo "<p>" . $row['h1'] . "</p>";
        } 
    }else {
            echo "<p>No matches found</p>";
        }
}

// Close connection
mysqli_close($shtab_db);
