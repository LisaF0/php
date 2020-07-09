<?php

$date = new DateTime("1999-08-31");
echo formaterDateFr($date);


function formaterDateFr($date){
    setlocale(LC_TIME, "fr_FR");

    return strftime("%l %d %F %Y", $date);
}




