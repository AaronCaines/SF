<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Food</title>
    <link rel="stylesheet" href="GetFood.css">
</head>
<body>
<?php
    $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=ahadz019 user=ahadz019
    password=SecurePassword1234") or die('kill yourself');
    $query = "SELECT * FROM smart_fridge.ingredient ORDER BY category";
    $result = pg_query($query);
?>
<form >
  <input id = "search_box" class = "search" type="text" onkeydown="if (event.keyCode == 13) { search(); }" placeholder="Search..." required>
  <input id = "search_button" class = "button" type="button" onclick="search()" value="Search">
</form>

<div>
  <table class="center" border="2" id="table1" >
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
                <td><input type='text' value=0 id='textfield'.strval($num) /></td>
              </tr>\n";
              $num++;
            }
          ?>
        </tbody>
  </table>
</div>

<button id="take" onclick="trigger()">Take</button>

<script>

function trigger() {

    var table1 = document.getElementById("table1");
    var text1 = document.getElementById("textfield1");

    alert(text1.value);
    for (var i = 0, row; row = table1.rows[i]; i++) {
        row.cells[3].innerHTML;
    }

}

function search() {
  var query = document.getElementById("search_box").value;

  if (query != "") {
    var ingredients = <?php require_once('Util.php'); echo getAllIngredients();?>

    for (var i = 0; i < ingredients.length; i++) {
      alert(ingredients[i][0]);
    }
  }
}

</script>



</body>
</html>
