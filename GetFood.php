<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Food</title>
    <link rel="stylesheet" href="GetFood.css">
</head>
<body>
    <?php
      $query_string = "";
      if(isset($_POST["data"])) {
          $query_string = $_POST["data"];
      }
      $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=ahadz019 user=ahadz019 password=SecurePassword1234") or die('connection failed');

      if ($query_string != "") {
        $query = "SELECT * FROM smart_fridge.ingredient WHERE name LIKE '%".$query_string."%'";
        $result = pg_query($query);
      }
      else {
        $query = "SELECT * FROM smart_fridge.ingredient ORDER BY category";
        $result = pg_query($query);
      }
    ?>
    <form name="searchForm" method="POST" action="GetFood.php">
      <input id = "search_box" class = "search" type="text" onkeydown="if (event.keyCode == 13) { search(); }" placeholder="Search..." required>
      <input id = "search_button" class = "button" type="button" onclick="search()" value="Search">
      <input type="hidden" name="data">
    </form>

<table border="2"  id="table1" style= "background-color: #ffffe6; color: #000000; margin: 0 auto;" >
      <thead>
        <tr>
          <th>Ingredient Name</th>
          <th>Quantity Available</th>
          <th>Category</th>
          <th>Take Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $num = 1;
          while( $row = pg_fetch_assoc( $result ) ){
            echo
            "<tr>
              <td>{$row['name']}</td>
              <td>{$row['count']}</td>
              <td>{$row['category']}</td>
              <td><input type='text' value=0 id=$num /></td>
            </tr>\n";
            $num++;
          }
        ?>
      </tbody>
    </table>

    <button id="take" onclick="trigger()">Take</button>

    <form name="data" action="update.php" method="post">
        <input type="hidden" name="passArgs" value="">

    </form>

<script>

function trigger() {
    alert("TEST1")
    var table1 = document.getElementById("table1");

    var cur = 0;

    var amts ="";
    var ingrs="";


    for (var i = 1, row; i < table1.rows.length; i++) {
        row = table1.rows[i];
        amount = document.getElementById(i).value;
        cur = row.cells[1].innerHTML;
        alert(table1.rows.length + " " + amount + " " + cur);
        if (cur >= amount) {
             if (i > 1) {
                 amts += ",";
                 ingrs += ",";
             }
             amts += amount;
             ingrs += (row.cells[0].innerHTML);

        } else {
            alert(row.elems[0].innerHTML + "has insufficient quantity.");
        }


    }
    alert("TEST");
    amts += "|";
    amts += ingrs;
    document.data.passArgs.value = amts;
    document.data.submit();

}

function search() {
  var query = document.getElementById("search_box").value;

  if (query != "") {
    document.searchForm.data.value = query;
    document.forms["searchForm"].submit();
  }
}

</script>

</body>
</html>
