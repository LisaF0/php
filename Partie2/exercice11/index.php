<?php





function formaterDateFr($date = "now"){
    setlocale(LC_TIME, "fr_FR.utf-8");

    return strftime("%A %d %B %Y", strtotime($date));
}




echo formaterDateFr("31-08-1997");