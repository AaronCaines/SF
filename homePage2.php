
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SmartRefrigerator</title>
    <link rel="stylesheet" href="homePage2.css">
</head>
<body>


<p id = "fooHolder">fgdfgj gfgj </p>




<form style="margin-top: 10%">
    <div class="picture_container">
        <img  id = "nameThing" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label id="fooHolder"> </label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <button type="submit">Login</button>
    </div>
</form>




<script type="text/javascript">
    
    var userId = '<?php echo $_POST['data'] ?>';


    document.getElementById("fooHolder").innerHTML = userId.toString();

    

    document.getElementById("nameThing").src = "Resources/" + userId.toString() + ".jpg";

</script>





</body>






</html>