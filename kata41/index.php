<?php

define('SECONDS_IN_A_DAY', 86400);

function getDaysDifference(string $date1, string $date2): int {
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime1->diff($datetime2);
    return abs($interval->days);
}

function isValidDate(string $date): bool {
    $regex = '/^\d{2}-\d{2}-\d{4}$/';
    if (!preg_match($regex, $date)) {
        return false;
    }

    $parts = explode('-', $date);
    return checkdate((int)$parts[1], (int)$parts[0], (int)$parts[2]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $date1 = str_replace("/", "-", $date1);
    $date2 = str_replace("/", "-", $date2);

    if (isValidDate($date1) && isValidDate($date2)) {
        echo "Entre " . $date1 . " i " . $date2 . " hi ha " . getDaysDifference($date1, $date2) . " dia(es) de diferència";
    } else {
        echo "Invalid date format!";
    }
} else {
?>
<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter 1 date (dd/mm/yyyy): <input type="text" name="date1"><br>
    Another one! (dd/mm/yyyy): <input type="text" name="date2"><br>
    <input type="submit">
</form>

</body>
</html>
<?php
}
?>

