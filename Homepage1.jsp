<%@ page import="Utilities.Util" %>
<%--
  Created by IntelliJ IDEA.
  User: AshishK
  Date: 2017-03-27
  Time: 3:10 AM
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartRefrigerator</title>
    <link rel="stylesheet" href="homepage1.css">
</head>
<body>

<div class='fullscreenDiv'>
    <div class="center">
        Smart Refrigerator System
        <div>
            <button id="admin" style="float: left;" ><b>Admin</b></button>
            <button id = "chef" style="float: left;"><b>Chef</b></button>
            <button id = "user" style="float: left;"><b>User</b></button>
        </div>

    </div>
</div>



<script type="text/javascript">

    document.getElementById("admin").addEventListener("click", function() {
        getUserID('admin');
    }, false);

    document.getElementById("user").addEventListener("click", function() {
        getUserID('user');
    }, false);

    document.getElementById("chef").addEventListener("click", function() {
        getUserID('chef');
    }, false);


    function xyz() {
        window.location.href = 'Homepage2.jsp?userID=admin';
    }

    function getUserID(clicked_id)
    {
        window.location.href = 'Homepage2.jsp?userID='+clicked_id;
    }


</script>

</body>
</html>