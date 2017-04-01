<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SmartRefrigerator</title>
    <link rel="stylesheet" href="OrderPage.css">
</head>



<body>


<?php
    
    $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=ahadz019 user=ahadz019 password=SecurePassword1234") or die('kill yourself');

    $result = pg_query("SELECT smart_fridge.ingredient.name,smart_fridge.ingredient.count FROM smart_fridge.ingredient;"); 

?>

<table id = "hiv" border="2" style = "width = 100%"> 

<thead>
<tr>
    <th>Ingredient</th>
    <th>Quantity</th>
    <th>Add Quantity</th>
</tr>
</thead>

<tbody>
        <?php

          $num = 0;
          while( $row = pg_fetch_assoc( $result ) ){
            echo
            "<tr>
              <td>{$row['name']}</td>
              <td>{$row['count']}</td>
              <td><input id = $num type='text' value='0'></td>
            </tr>\n";
            $num = $num + 1;
          }
        ?>
</tbody>
</table>
<?php pg_close($dbconn); ?>    
</tbody>
</table>


<div id="specific">
    <button id = "button1" type="submit" onclick="updateDB()">Add</button>
</div>

<form name="data" method="POST" action="aOrderPage2.php">
    <input type="hidden" name="data">
</form>

<script type="text/javascript">
    function updateDB(){

        var hiv = document.getElementById("hiv");
        var info = new Array(hiv.rows.length);
        var realInfo = new Array(hiv.rows.length-1);
        var qty = 0;
        var addQty = 0;
        var newQty = 0;
        var count = 0;
        var sendStr = "";
        

        for (var i = 1, row; i < hiv.rows.length; i++) {

            row = hiv.rows[i];

            info[i-1] = new Array(3);

            for (var j = 0, col; j < 3; j++) {

                col = row.cells[j].innerHTML;
                info[i-1][j] = col;
            }  


            count = document.getElementById(i-1).value;

            if (count < 0){
                count = 0;
                alert('Not Allowed to add values less than zero');
            }

            info[i-1][2] = count

            
            //alert(info[i-1][0]);
        }

        for (z = 0; z < hiv.rows.length-1; z++){

            realInfo[z] = new Array(2);
            realInfo[z][0] = info[z][0];

            qty = parseInt(info[z][1]);
            addQty = parseInt(info[z][2]);
            newQty = qty + addQty;

            realInfo[z][1] = newQty;

            //alert(realInfo[z][1]);   
        }

        //alert(0);

        for (k = 0; k < realInfo.length;k++){
            
            sendStr += realInfo[k][0] + ",";

            if (k < realInfo.length - 1){
                sendStr += realInfo[k][1] + ",";
            }
            else{
                sendStr += realInfo[k][1];
            }
        }

        console.log(sendStr);

        
        document.data.data.value = sendStr;
        document.data.submit();

    }
</script>




</body>
</html>
