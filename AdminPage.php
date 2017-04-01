<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="UserPage.css">
</head>
<body>




<div id="center">
    <img src="Resources/admin.jpg" alt="Avatar" id="avatar">
    <h3 id="aids"></h3>
    <div id="buttons">
        <button id="placeOrders" onclick = "toOrderPage()"><b>Place Orders</b></button>
        <button id="approveOrders" onclick = "toApprovePage()"><b>Approve Orders</b></button>
        <button id="reports" onclick = "toReportsPage()"><b>Reports</b></button>
    </div>

</div>



<script type="text/javascript">
    
    var superAids = '<?php echo getTingz() ?>'; 

    document.getElementById("aids").innerHTML = superAids.toString();

</script>


<script type="text/javascript">
    
    function toOrderPage(){
        window.location = "aOrderPage.php"
    }

    function toApprovePage(){
        window.location = "aApprovePage.php"
    }

    function toReportsPage(){
        window.location = "aReportsPage.php"
    }   

</script>


<?php

    function getTingz(){
        $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=ahadz019 user=ahadz019 password=SecurePassword1234") or die('kill yourself');
    
        $result = pg_query("SELECT smart_fridge.admin.name FROM smart_fridge.admin;"); 

        $name34 = pg_fetch_all($result);

        pg_close($dbconn);

        return $name34[0]['name'];

    }
?>

</body>
</html>