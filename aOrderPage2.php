<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SmartRefrigerator</title>
    <link rel="stylesheet" href="OrderPage.css">



<?php 

    $packed = $_POST['data'];
    $data = explode(",", $packed);

    echo $packed;

    $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=ahadz019 user=ahadz019 password=SecurePassword1234") or die('kill yourself');

    for ($i = 0; ($i < count($data)-1); $i+=2) {
        $query = "UPDATE smart_fridge.ingredient SET count = ".$data[$i+1]." WHERE name = '".$data[$i]."';";

        echo $query;

        pg_query($query);
     }

     pg_close($dbconn);

    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
     } else {
        header("Location: aOrderPage.php");
     }
?>



</body>
</html>
