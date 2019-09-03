<?php 

function changeDateFormat(array $dates) : array
{
    $valid_dates = [];
    foreach($dates as $d) {
        //echo $d . ' ' . strlen($d) . ' ' . str_replace('/','', $d) . '<br/>';
        if (strlen($d)!=10) continue;
        if (strlen(str_replace('/','',$d))==8) {
            $parts  = explode('/', $d);
            if (strlen($parts[0])==4 && strlen($parts[1])==2 && strlen($parts[2])==2) {
                if (!checkdate(intval($parts[1]),intval($parts[2]),intval($parts[0]))) continue;
                $valid_dates[] = "$parts[0]$parts[1]$parts[2]";
            }
            if (strlen($parts[0])==2 && strlen($parts[1])==2 && strlen($parts[2])==4) {
                if (!checkdate(intval($parts[1]),intval($parts[0]),intval($parts[2]))) continue;
                $valid_dates[] = "$parts[2]$parts[1]$parts[0]";
            }
            continue;
        }
        if (strlen(str_replace('-','',$d))==8) {
            $parts  = explode('-', $d);
            if (strlen($parts[0])==2 && strlen($parts[1])==2 && strlen($parts[2])==4) {
                if (!checkdate(intval($parts[0]),intval($parts[1]),intval($parts[2]))) continue;
                $valid_dates[] = "$parts[2]$parts[0]$parts[1]";
            }
            continue;
        }        
    }
    return $valid_dates;
}

$dates = changeDateFormat( [ "2010/03/30", "15/12/2016", "11-15-2012", "20130720" ] );
foreach($dates as $date) {
    echo $date . "\n";
}

?>