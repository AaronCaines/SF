<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Food</title>
    <link rel="stylesheet" href="GetFood.css">
</head>
<body>

<div id="search">
    <form action= method="post">
        <input type="text" name="textIn">
        <input type="submit" value="Search">
    </form>
</div>

<script>

    var input = document.getElementById("textIn").value;
    document.getElementById("test").textContent = input;

</script>
</body>
</html>
