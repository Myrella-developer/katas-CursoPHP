<?php

define('SECONDS_IN_A_DAY', 86400);

function getDaysDifference($date1, $date2){
    $datetime1 = DateTime::createFromFormat('d-m-Y', $date1);
    $datetime2 = DateTime::createFromFormat('d-m-Y', $date2);
    $interval = date_diff($datetime1, $datetime2);
    return $interval->format('%a');
}


function isValidDate(string $date): bool {
    $regex = '/^\d{2}-\d{2}-\d{4}$/';
    if (!preg_match($regex, $date)) {
        return false;
    }

    $parts = explode('-', $date);
    return checkdate((int)$parts[1], (int)$parts[0], (int)$parts[2]);
}

$date1 = readline("Enter 1 date (dd/mm/yyyy)");
$date2 = readline("Enter 2 date (dd/mm/yyyy)");
  
$date1 = str_replace("/", "-", $date1);
$date2 = str_replace("/", "-", $date2);

if (isValidDate($date1) && isValidDate($date2)) {
     echo "Entre " . $date1 . " y " . $date2 . " hay " . getDaysDifference($date1, $date2) . " días ";
} else {
        echo "Invalid date format!";
    }


