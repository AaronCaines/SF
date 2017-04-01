<html>
<body>
<?php

echo $_POST['passArgs'];

$fulldata = $_POST['passArgs'];

$amts = explode("|", $fulldata)[0];
$names = explode("|", $fulldata)[1];

$amtsArr = explode(",", $amts);
$namesArr = explode(",", $names);

$dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=ahadz019 user=ahadz019
password=SecurePassword1234") or die('connection error');

for ($i = 0; $i < count($amtsArr); $i++) {
    $query = "UPDATE smart_fridge.ingredient SET count = count - " . $amtsArr[$i] . " WHERE name = " . "'" . $namesArr[$i] . "'";
    echo $query;
    pg_query($query);
}

if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    header("Location: GetFood.php");
}
echo $amts;

?>

</body>
</html>
