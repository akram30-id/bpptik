<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1366, initial-scale=1.0">
    <title>Tugas 4 - BPPTIK JWD</title>
</head>

<body>

    <form method="get">
        <label for="bintang">Jumlah Bintang</label><br>
        <input type="number" name="bintang" id="bintang" <?php if (isset($_GET["bintang"])) {
                                                                echo "value=" . $_GET["bintang"];
                                                            } else {
                                                                echo "value=0";
                                                            } ?> value="0">
        <button style="margin-top: 8px;" type="submit">Kirim</button>
    </form>

</body>

</html>

<?php

if (isset($_GET["bintang"])) {
    $bintang = intval($_GET["bintang"]);

    for ($i = $bintang; $i > 0; $i--) {
        for ($j = $bintang; $j >= $i; $j--) {
            echo "*";
        }
        echo "<br>";
    }
    
    echo "<br> <br>";

    for ($i = $bintang; $i > 0; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "&nbsp";
        }
        for ($k = $bintang; $k >= $i; $k--) {
            echo "*";
        }
        echo "<br>";
    }

    echo "<br> <br>";

    for ($i=1; $i <= $bintang; $i++) {
        for ($j=$bintang; $j >= $i; $j--) {
            echo "*";
        }
        echo "<br>";
    }
} else {
    echo "";
}
?>