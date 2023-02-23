<?php 

    include 'count.php';

    if ($status == "available") {
        $resultPenjumlahan = penjumlahan();
        $resultPengurangan = pengurangan();
        $resultPerkalian = perkalian();
        $resultPembagian = pembagian();
    }
    

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <link rel="stylesheet" href="https://grapedrop.com/css/gjs-base.css?id=d0383dd1e92b8b8ea83e">
    <link rel="stylesheet" href="css/style_2.css">

</head>

<body>
    <div id="inu2g" class="gpd-box">
        <div id="ikfm3" class="gpd-text">Kalkulator Result</div>
    </div>
    <section id="iyvff" class="gpd-section">
        <div id="ief27" class="gpd-container gpd-cnt">
            <div id="i7dkk" class="gdp-row gpd-grid">
                <div id="izc4g" class="cell gpd-clm">
                    <div id="i8p1v" class="gdp-row gpd-grid">
                        <div id="ihcmd" class="cell gpd-clm">
                            <div id="i4fnl" class="gpd-text">Bilangan 1</div>
                        </div>
                    </div>
                    <div id="ixvxy" class="gdp-row gpd-grid">
                        <div id="ik4dh" class="cell gpd-clm">
                            <div id="ihnn7" class="gpd-text"><?= $bilangan1; ?></div>
                        </div>
                    </div>
                </div>
                <div id="irc4h" class="cell gpd-clm">
                    <div id="iraur" class="gdp-row gpd-grid">
                        <div id="iggzr" class="cell gpd-clm">
                            <div id="itdws" class="gpd-text">Bilangan 2</div>
                        </div>
                    </div>
                    <div id="ij2xd" class="gdp-row gpd-grid">
                        <div id="i39c6" class="cell gpd-clm">
                            <div id="iimki" class="gpd-text"><?= $bilangan2; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="irmuh" class="gdp-row gpd-grid">
                <div id="ixh8s" class="cell gpd-clm">
                    <div id="iy11e" class="gdp-row gpd-grid">
                        <div id="iswf1" class="cell gpd-clm">
                            <div id="ihnwg" class="gpd-text">Hasil Pehitungan</div>
                        </div>
                    </div>
                    <div id="i9kgs" class="gdp-row gpd-grid">
                        <div id="i9csm" class="cell gpd-clm">
                            <div id="i43tg" class="gpd-text">Penjumlahan</div>
                        </div>
                        <div id="ijz4c" class="cell gpd-clm">
                            <div id="iz5k5" class="gpd-text"><?= $resultPenjumlahan; ?></div>
                        </div>
                    </div>
                    <div id="ijk18" class="gdp-row gpd-grid">
                        <div id="imx3y" class="cell gpd-clm">
                            <div id="iz0f5" class="gpd-text">Pengurangan</div>
                        </div>
                        <div id="itj74" class="cell gpd-clm">
                            <div id="iz18i" class="gpd-text"><?= $resultPengurangan; ?></div>
                        </div>
                    </div>
                    <div id="ia9uk" class="gdp-row gpd-grid">
                        <div id="ivq4k" class="cell gpd-clm">
                            <div id="in7s5" class="gpd-text">Perkalian</div>
                        </div>
                        <div id="iw7od" class="cell gpd-clm">
                            <div id="i4dbb" class="gpd-text"><?= $resultPerkalian; ?></div>
                        </div>
                    </div>
                    <div id="ihhka" class="gdp-row gpd-grid">
                        <div id="i34ep" class="cell gpd-clm">
                            <div id="iprnz" class="gpd-text">Pembagian</div>
                        </div>
                        <div id="i6rz2" class="cell gpd-clm">
                            <div id="i6go2" class="gpd-text"><?= $resultPembagian; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>