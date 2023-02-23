<?php 

    $bintang = intval($_GET["bintang"]);

    for ($i=$bintang; $i > 0; $i--) { 
        for ($j=$bintang; $j >= $i; $j--) { 
            echo "*";
        }
        echo "<br>";
    }