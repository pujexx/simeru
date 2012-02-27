<?php
$url_api = "http://query.yahooapis.com/v1/public/yql?q=";
$query = "select * from html where url='http://ksweb.student.uad.ac.id/demo/simeru/simeru.php'";
$url = $url_api . urlencode($query) . "&format=json";
$result = file_get_contents($url);
$result_decode = json_decode($result);
$table = $result_decode->query->results->body->div[2]->div[0]->div->div->div[2]->table;
$tr = $table->tr;
$count_tr = count($table->tr);
$hari = array();
//penanda hari
for ($i = 1; $i < $count_tr; $i++):
    $penanda_hari = $tr[$i]->td[0]->p;
    if (isset($penanda_hari)) {
        $hari[] = $i;
    }
endfor;
//
$get_day = date('l');
$set_day = 0;
$tr_max = 0;
$day_name = "";
if ($get_day == "Monday") :
    $set_day = $hari[0];
    $tr_max = $hari[1];
    $day_name = "Senin";
elseif ($get_day == "Tuesday") :
    $set_day = $hari[1];
    $tr_max = $hari[2];
    $day_name = "Selasa";
elseif ($get_day == "Wednesday") :
    $set_day = $hari[2];
    $tr_max = $hari[3];
    $day_name = "Rabu";
elseif ($get_day == "Thursday") :
    $set_day = $hari[3];
    $tr_max = $hari[4];
    $day_name = "Kamis";
elseif ($get_day == "Friday") :
    $set_day = $hari[4];
    $tr_max = $hari[5];
    $day_name = "Jumat";
elseif ($get_day == "Saturday") :
    $set_day = $hari[5];
    $tr_max = $count_tr;
    $day_name = "Minggu";
else :
    $set_day = 0;
    $tr_max = 0;
endif;
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css">



    </head>
    <body>

        <div id="home" data-url="home" data-role="page">
            <div data-role="header" data-theme="e" data-position="fixed">
                <h1>Jadwal Hari Ini : <?php echo $day_name; ?></h1>
                <a href="#" data-icon="home" data-iconpos="notext" data-direction="reverse" class="ui-btn-left jqm-home">Home</a>
                <a href="#jam" data-icon="info" data-iconpos="notext" data-direction="reverse" class="ui-btn-right jqm-home">info</a>


            </div>

            <div data-role="content">
                <?php
                if ($set_day == 0 && $tr_max == 0) :
                    echo "Ini hari minggu";
                else :
                ?>
                    <ul data-role="listview" data-filter="true">
                    <?php for ($j = $set_day; $j < $tr_max; $j++): ?>
                        <li>
                            <h3><?php echo $tr[$j]->td[2]->p; ?></h3>
                            <p>Kelas : <?php echo $tr[$j]->td[3]->p; ?> , <span>Jam : </span><?php echo $tr[$j]->td[5]->p; ?> ,<span>Ruang </span> :<?php echo $tr[$j]->td[8]->p; ?> </p>
               
                            <p>Semester :<?php echo $tr[$j]->td[6]->p; ?></p>
                             <p> SKS : <?php echo $tr[$j]->td[4]->p; ?></p>
                            <p>Dosen :<?php echo $tr[$j]->td[7]->p; ?></p>
                   

                        </li>

                    <?php endfor; ?>

                    </ul>
                <?php endif; ?>





            </div>

            <div data-role="footer" data-theme="e" data-position="fixed">
                <h1>Simeru</h1>
            </div>
        </div>

        <div id="jam" data-url="jam" data-role="page" data-theme="e">
            <div data-role="header" data-position="fixed">
                <h1>Keterangan Jam</h1>
                <a href="#home" data-icon="home" data-iconpos="notext" data-direction="reverse" class="ui-btn-left jqm-home">Home</a>
            </div>

            <div data-role="content">
                <ol style="margin-top: 5px; margin-right: 15px; margin-bottom: 5px; margin-left: 15px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 5px; color: #282828; font-family: Tahoma, Arial, sans-serif; font-size: 12px; line-height: 14px; background-color: #fcfcfa; "><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">07.00-07.50</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">07.50-08.40</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">08.45-09.35</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">09.35-10.25</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">10.30-11.20</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">11.20-12.10</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">12.30-13.20</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">13.20-14.10</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">14.15-15.05</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">15.15-16.05</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">16.10-17.00</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">17.00-17.50</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">18.30-19.20</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">19.20-20.10</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">20.10-21.00</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">16.00-16.50</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">16.50-17.40</li><li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; ">17.40-18.30</li></ol></li>

            </div>

            <div data-role="footer" data-theme="e" data-position="fixed">
                <h1>Simeru</h1>
            </div>
        </div>

    </body>
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
</html>
